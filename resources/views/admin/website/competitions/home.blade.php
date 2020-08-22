@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @include('admin.components.website_nav', ['competitions' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-aau">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Country') }}</th>
                                <th scope="col">{{ __('Year') }}</th>
                                <th scope="col">{{ __('Link') }}</th>
                                @can('edit competitions')<th scope="col" class="fit"></th>@endcan
                                @can('delete competitions')<th scope="col" class="fit"></th>@endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($competitions as $competition)
                                <tr>
                                    <td scope="row">{{ $competition->name }}</td>
                                    <td>{{ $competition->country }}</td>
                                    <td>{{ $competition->year }}</td>
                                    <td><a href="{{ $competition->link }}" target="_blank">{{ $competition->link }}</a></td>
                                    @can('delete competions')
                                        <td class="fit">
                                            <a href="{{ route('admin::competition::edit', ['id' => $competition->id]) }}" class="btn btn-link no-border no-padding"><i class="fas fa-edit"></i></a>
                                        </td>
                                    @endcan
                                    @can('delete competions')
                                        <td class="fit">
                                            <form method="POST" action="{{ route('admin::competition::delete', ['id' => $competition->id]) }}" >
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
                    @can('create competitions')
                        <div class="float-right">
                            <a href="{{ route('admin::competition::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
