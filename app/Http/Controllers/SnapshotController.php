<?php

namespace App\Http\Controllers;

use App\Snapshot;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SnapshotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snapshots = Snapshot::has('media')->with('media')->get();

        return view('snapshots.index', [
            'snapshots' => $snapshots,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Snapshot $snapshot)
    {
        // To-do: caching
        $snapshot->load(['media' => function (MorphMany $query) {
            $query->ordered();
        }]);

        return view('snapshots.show', [
            'snapshot' => $snapshot,
        ]);
    }
}
