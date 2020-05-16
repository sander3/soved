@extends('layouts.app')

@section('title')
{{ config('app.name', 'Laravel') }} — Snapshots
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            @foreach ($snapshots as $snapshot)
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{ route('snapshots.show', $snapshot) }}">
                            <img src="{{ $snapshot->thumbnail_url }}" class="card-img-top" alt="{{ $snapshot->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $snapshot->title }}</h5>
                            <a href="{{ route('snapshots.show', $snapshot) }}" class="card-link">@lang('snapshots.show')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
