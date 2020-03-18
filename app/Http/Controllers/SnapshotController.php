<?php

namespace App\Http\Controllers;

use App\Snapshot;

class SnapshotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snapshots = Snapshot::with('media')->get();

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
        return view('snapshots.show', [
            'snapshot' => $snapshot->load('media'),
        ]);
    }
}
