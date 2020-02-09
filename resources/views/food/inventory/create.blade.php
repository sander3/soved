@extends('layouts.food')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inventory management') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('food.inventory.store') }}" aria-label="{{ __('Inventory management') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ingredient" class="col-md-4 col-form-label text-md-right">{{ __('Ingredient') }}</label>

                            <div class="col-md-6">
                                <select id="ingredient" class="form-control{{ $errors->has('ingredient') ? ' is-invalid' : '' }}" name="ingredient" required>
                                    @foreach ($ingredients as $ingredient)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('ingredient'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ingredient') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-sm-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" required>

                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
