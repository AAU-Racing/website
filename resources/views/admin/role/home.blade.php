@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center p-4">
        <table class="table roles-table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col" class="roles-email-column">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->name }}</td>
                        <td class="roles-email-column">{{ $user->email }}</td>
                        <td>
                            {{
                                collect($user->roles)->map(function($role, $key) {
                                    return ucfirst(str_replace('-', ' ', $role->name));
                                })->join(', ')
                            }}
                        </td>
                        <td><a href="{{ route('admin::role::alterForm', ['id' => $user->id]) }}"><i class="fas fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
