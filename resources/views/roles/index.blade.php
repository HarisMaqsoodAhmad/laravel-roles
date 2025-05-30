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
                    <div class="card-header">{{ __('Roles') }}</div>
                    <div class="card-body">
                        <div class="mb-3">
                            @can('role-create')
                                <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
                            @endcan
                        </div>
                        <table class="table table-stacked table-bordered">
                            <thead>
                                <tr>
                                    <th width="40px">ID</th>
                                    <th>Name</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @can('role-list')
                                                <a href="{{ route('roles.show', $role->id) }}"
                                                    class="btn btn-info btn-sm">View</a>
                                            @endcan
                                            @can('role-edit')
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                            @endcan
                                            @can('role-delete')
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                                                    style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
