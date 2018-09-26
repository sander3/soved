@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 hero text-center text-md-left">
            <p class="lead mb-0">Hallo, mijn naam is</p>
            <h1 class="display-1 mb-2"><strong>Sander</strong> de Vos</h1>
            <p class="lead">Software engineer, DevOps en informatiebeveiliging.</p>
        </div>
    </div>
</div>

<div class="experience py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="mb-3">Dit is wat ik heb gedaan:</h2>
            </div>
            <div class="col-md-8">
                <div class="menu">
                    <div class="item p-3">
                        <div class="row">
                            <div class="col-6 col-md-3 mb-2 order-first">
                                <img src="{{ asset('svg/foryard-tech.svg') }}" class="img-fluid" alt="FORYARD.tech logo">
                            </div>
                            <div class="col-md-5 order-3">
                                <h5 class="mb-0">
                                    DevOps<br>
                                    <small class="text-muted">FORYARD.tech</small>
                                </h5>
                            </div>
                            <div class="col-6 col-md-4 order-2 order-sm-3 order-md-3 order-lg-3 order-xl-3">
                                <p class="text-right">2018 - nu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
