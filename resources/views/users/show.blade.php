@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show User') }}</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
                        </div>

                        <div>
                            <h4>Name: {{ $user->name }}</h4>
                            <p>Email: {{ $user->email }}</p>

                            @if ($user->roles->isNotEmpty())
                                <h5>User Roles</h5>
                                <ul>
                                    @foreach ($user->roles as $role)
                                        <li class="mb-1">
                                            {{ $role->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
