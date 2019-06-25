@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4">
        <div class="col-lg-2">
            @component('admin.components.users_nav', ['profiles' => 'active', 'flex' => 'lg'])
            @endcomponent
        </div>
        <div class="col-lg-10 table-responsive">
            <table class="table profiles-table">
                <thead class="thead-aau">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Education</th>
                        <th scope="col" class="date-of-birth">Date of birth</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Has car?</th>
                        <th scope="col">Primary contact</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->education }}</td>
                            <td>{{ $user->formatted_date_of_birth }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->car ? ($user->car->towbar ? 'Yes, with towbar' : 'Yes') : 'No' }}</td>
                            <td>{{ $user->contactPersons->where('primary', true)->first()->name }}, {{ $user->contactPersons->where('primary', true)->first()->phone_number }}</td>
                            <td>@can('edit profile', $user)<a href="{{ route('admin::profile::editForm', ['id' => $user->id]) }}"><i class="fas fa-edit"></i></a>@endcan</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
