<div class="preloader position-fixed d-flex">
    <div class="text-wrapper position-absolute d-flex align-items-center">
        <div class="container">
            <div class="row no-gutters justify-content-start justify-content-sm-center text-white">
                <div class="col-12 col-sm-auto text-mask">
                    <h3 class="my-0">{{ __('preloader.skills')[0] }}</h3>
                </div>
                <div class="col-12 col-sm-auto text-mask">
                    <h3 class="my-0">{{ __('preloader.skills')[1] }}</h3>
                </div>
                <div class="col-auto text-mask">
                    <h3 class="my-0">{{ __('preloader.skills')[2] }}</h3>
                </div>
            </div>
        </div>
    </div>

    @for ($i = 0; $i < 4; $i++)
        <div class="panel-mask position-relative w-25">
            <div class="panel position-absolute"></div>
        </div>
    @endfor
</div>
