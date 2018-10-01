@extends('layouts.app')

@section('content')
@include('components.preloader')
@include('components.hero')

<div class="fadeInUpBig">
    @include('components.experience')
    @include('components.skills')
</div>

@include('components.packages')
@include('components.quote')
@include('components.footer')
@endsection
