@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('snapshots.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $snapshot->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            @foreach ($snapshot->media as $media)
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{ $media->getUrl() }}">
                            <img src="{{ $media->getUrl('thumbnail') }}" class="card-img-top" alt="{{ $snapshot->title }}">
                        </a>
                        <div class="card-body">
                            {{ $snapshot->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
