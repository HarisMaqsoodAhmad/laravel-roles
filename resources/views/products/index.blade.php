@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @session('success')
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endsession

                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">
                        <div class="mb-3">
                            @can('product-create')
                                <a href="{{ route('products.create') }}" class="btn btn-primary">{{ __('Create Products') }}</a>
                            @endcan
                        </div>

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            @can('product-list')
                                                <a
                                                    href="{{ route('products.show', $product->id) }}"class="btn btn-info btn-sm">{{ __('View') }}</a>
                                            @endcan
                                            @can('product-edit')
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-success btn-sm">{{ __('Edit') }}</a>
                                            @endcan
                                            @can('product-delete')
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
