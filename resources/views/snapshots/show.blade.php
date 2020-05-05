@extends('layouts.app')

@section('title')
Snapshots — {{ $snapshot->title }}
@endsection

@php
    $description = __('snapshots.description', ['title' => $snapshot->title, 'date' => $snapshot->updated_at->toDateString()]);
@endphp

@section('meta')

    <meta name="title" content="{{ $snapshot->title }}">
    <meta name="description" content="{{ $description }}">

    <meta name="og:type" content="website">
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:title" content="{{ $snapshot->title }}">
    <meta name="og:description" content="{{ $description }}">
    <meta name="og:image" content="{{ $snapshot->media->first()->getUrl() }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $snapshot->title }}">
    <meta property="twitter:description" content="{{ $description }}">
    <meta property="twitter:image" content="{{ $snapshot->media->first()->getUrl() }}">
@endsection

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
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="{{ $media->getUrl() }}">
                            <img src="{{ $media->getUrl('thumbnail') }}" class="card-img-top" alt="{{ $snapshot->title }}">
                        </a>
                        <div class="card-body">
                            {{ $media->created_at->toDateString() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
