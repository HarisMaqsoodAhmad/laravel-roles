@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show Role') }}</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to Roles</a>
                        </div>

                        <div>
                            <h4>Role Name: {{ $role->name }}</h4>
                            <h5>Permissions</h5>
                            <ul>
                                @foreach ($role->permissions as $permission)
                                <li>
                                    {{ $permission->name }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
