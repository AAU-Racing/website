@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4">
        <div class="col-md-3 col-lg-2">
            @component('admin.components.users_nav', ['roles' => 'active', 'flex' => 'md'])
            @endcomponent
        </div>
        <div class="col-md-9 col-xl-6 offset-lg-1 table-responsive">
            <table class="table roles-table">
                <thead class="thead-aau">
                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Roles') }}</th>
                        @can('alter roles')<th scope="col"></th>@endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{
                                    collect($user->roles)->map(function($role, $key) {
                                        return ucfirst(str_replace('-', ' ', $role->name));
                                    })->join(', ')
                                }}
                            </td>
                            @can('alter roles')<td><a href="{{ route('admin::role::editForm', ['id' => $user->id]) }}"><i class="fas fa-edit"></i></a></td>@endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
