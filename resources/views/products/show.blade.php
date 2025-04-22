@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show Product') }}</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                        </div>

                        <div class="pt-3">
                            <h4>Name: {{ $product->name }}</h4>
                            <p>Description: {{ $product->description }}</p>
                            <p>Price: {{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
