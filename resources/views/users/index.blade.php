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
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->roles->isNotEmpty())
                                                @foreach ($user->roles as $role)
                                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                                @endforeach
                                            @else
                                                <span class="badge bg-secondary">No Roles</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
