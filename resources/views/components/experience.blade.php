<div class="experience py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="mb-3">@lang('experience.introduction')</h2>
            </div>
            <div class="col-md-8">
                <div class="menu shadow-lg mb-1">
                    @foreach ($experiences as $experience)
                        <div class="item p-3">
                            <div class="row">
                                <div class="col-6 col-md-3 mb-2 mb-sm-0 mb-md-0 mb-lg-0 mb-xl-0 order-first">
                                    <img src="{{ asset($experience->logo) }}" class="img-fluid" alt="{{ $experience->organization }} logo">
                                </div>
                                <div class="col-md-5 order-3">
                                    <h5 class="mb-0">
                                        {{ $experience->role }}<br>
                                        <small class="text-muted">{{ $experience->organization }}</small>
                                    </h5>
                                </div>
                                <div class="col-6 col-md-4 order-2 order-sm-3 order-md-3 order-lg-3 order-xl-3">
                                    <p class="text-right">{{ $experience->start_year }} - {{ $experience->end_year }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
