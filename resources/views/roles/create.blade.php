@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Role') }}</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to Roles</a>
                        </div>

                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <h3>Permissions</h3>
                                <div>
                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="permissions[]"
                                                id="permission_{{ $permission->id }}" value="{{ $permission->name }}"
                                                {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }} />
                                            <label for="permission_{{ $permission->id }}"
                                                class="form-check-label">{{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                @error('permissions.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>


                            <button type="submit" class="btn btn-primary">Create Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
