<div class="packages py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="font-weight-bold mb-4">@lang('packages.introduction')</h2>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col">
                <div class="card-deck">
                    @foreach ($packages as $package)
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $package->name }}
                                    @if ($package->isNew())
                                        <span class="badge badge-secondary">New</span>
                                    @endif
                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    @foreach ($package->topics as $topic)
                                        <span class="badge badge-primary">{{ $topic }}</span>
                                    @endforeach
                                </h6>
                                <p class="card-text">{{ $package->description }}</p>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="{{ $package->html_url }}" class="card-link">GitHub</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
