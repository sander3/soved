<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use App\Repositories\Contracts\PushoverRepository as PushoverRepositoryContract;

class PushoverRepository implements PushoverRepositoryContract
{
    protected $appToken;

    protected $userKey;

    public function __construct(string $appToken, string $userKey)
    {
        $this->appToken = $appToken;

        $this->userKey = $userKey;
    }

    public function sendMessage(string $message, string $userKey = null, array $optionalParameters = []): bool
    {
        $parameters = [
            'token'   => $this->appToken,
            'user'    => $userKey ?? $this->userKey,
            'message' => $message,
        ];

        $response = Http::post(self::ENDPOINT, $parameters + $optionalParameters);

        // Throw an exception if a client or server error occurred...
        $response->throw();

        return 1 === $response['status'];
    }
}
