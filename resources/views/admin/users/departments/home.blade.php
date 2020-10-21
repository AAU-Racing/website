@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @include('admin.components.users_nav', ['departments' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <div class="table-responsive">
                    @can('edit departments')
                        <sortable-table :elements="{{ $departments->toJson() }}"
                                        :can_delete="{{ Auth::user()->can('delete departments') }}"
                                        header_view="department-header"
                                        row_view="department-row"
                                        order_field_name="department_order">
                            @can('assign departments')
                                <a href="{{ route('admin::department::assignForm') }}" class="btn btn-primary mr-1">Assign members to departments</a>
                            @endcan
                            @can('create departments')
                                <a href="{{ route('admin::department::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            @endcan
                        </sortable-table>
                    @else
                        <table class="table">
                            <thead class="thead-aau">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    @can('delete departments')<th scope="col" class="fit"></th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td scope="row">{{ $department->name }}</td>
                                        <td>{!! $department->description !!}</td>
                                        @can('delete departments')
                                            <td class="fit">
                                                <form method="POST" action="{{ route('admin::department::delete', ['id' => $department->id]) }}" >
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-link no-border no-padding"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">
                            @can('assign departments')
                                <a href="{{ route('admin::department::assignForm') }}" class="btn btn-primary mr-1">Assign members to departments</a>
                            @endcan
                            @can('create departments')
                                <a href="{{ route('admin::department::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            @endcan
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
