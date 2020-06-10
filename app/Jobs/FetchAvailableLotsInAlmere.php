<?php

namespace App\Jobs;

use Illuminate\Support\Arr;
use Illuminate\Bus\Queueable;
use App\Channels\PushoverChannel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\SerializesModels;
use App\Notifications\LotStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;

class FetchAvailableLotsInAlmere implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public const ENDPOINT = 'https://kaart.almere.nl:8443/geoserver/wfs?service=WFS&version=1.1.0&request=GetFeature&typename=KAVK_KAVELS&outputFormat=application/json';

    public const DEFAULT_STATUS = 'binnenkort te koop';

    public $lotId = 'NH4367';

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $options = [
            'verify' => false,
        ];

        $response = Http::withOptions($options)->get(self::ENDPOINT);

        // Throw an exception if a client or server error occurred...
        $response->throw();

        $lots = $response['features'];

        $lot = Arr::first($lots, [$this, 'searchByLotId']);

        if ($this->shouldNotify($lot)) {
            $status = Arr::get($lot, 'properties.STATUS');

            Notification::route(PushoverChannel::class, null)
                ->notify(new LotStatusChanged($this->lotId, $status));
        }
    }

    public function searchByLotId(array $lot): bool
    {
        return Arr::get($lot, 'properties.KAVELNUMME') === $this->lotId;
    }

    private function shouldNotify(array $lot): bool
    {
        $cacheKey = "lots:{$this->lotId}";

        $previousStatus = Cache::get($cacheKey, self::DEFAULT_STATUS);

        $status = Arr::get($lot, 'properties.STATUS');

        Cache::put($cacheKey, $status, now()->addDay());

        return $status !== $previousStatus;
    }
}
