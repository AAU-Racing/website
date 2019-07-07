@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @component('admin.components.website_nav', ['cars' => 'active', 'flex' => 'md'])
                @endcomponent
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <div class="table-responsive">
                    <table class="table">
                        <thead slot="header">
                            <tr class="thead-aau">
                                <th scope="col">Name</th>
                                <th scope="col">First year</th>
                                <th scope="col">Last year</th>
                                <th scope="col">Image</th>
                                @can('edit cars')<th scope="col" class="fit"></th>@endcan
                                @can('delete cars')<th scope="col" class="fit"></th>@endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td scope="row">{{ $car->name }}</td>
                                    <td>{{ $car->first_year }}</td>
                                    <td>{{ $car->last_year }}</td>
                                    <td>{{ $car->getFirstMedia('photos') ? $car->getFirstMedia('photos')->file_name : '' }}</td>
                                    @can('edit cars')
                                        <td class="fit">
                                            <a href="{{ route('admin::car::editForm', ['id' => $car->id]) }}"><i class="fas fa-edit"></i></a>
                                        </td>
                                    @endcan
                                    @can('delete cars')
                                        <td class="fit">
                                            <form method="POST" action="{{ route('admin::car::delete', ['id' => $car->id]) }}" >
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
                        @can('create cars')<a href="{{ route('admin::car::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>@endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection