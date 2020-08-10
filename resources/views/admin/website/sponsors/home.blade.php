@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @component('admin.components.website_nav', ['sponsors' => 'active', 'flex' => 'md'])
                @endcomponent
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <div class="table-responsive">
                    @can('edit sponsors')
                        <sortable-table :elements="{{ json_encode($sponsors) }}"
                                        :can_delete="{{ Auth::user()->can('delete sponsors') }}"
                                        header_view="sponsor-header"
                                        row_view="sponsor-row"
                                        order_field_name="sponsor_order">
                            @can('create sponsors')
                                <a href="{{ route('admin::sponsor::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            @endcan
                        </sortable-table>
                    @else
                        <table class="table">
                            <thead class="thead-aau">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Link') }}</th>
                                    <th scope="col">{{ __('Logo') }}</th>
                                    <th scope="col">{{ __('Active') }}</th>
                                    @can('delete sponsors')<th scope="col" class="fit"></th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sponsors as $sponsor)
                                    <tr>
                                        <td scope="row">{{ $sponsor->name }}</td>
                                        <td><a href="{{ $sponsor->link }}" target="_blank">{{ $sponsor->link }}</a></td>
                                        <td>@if($sponsor->getFirstMedia('logo'))<a href="{{ $sponsor->getFirstMedia('logo')->getUrl() }}">{{ $sponsor->getFirstMedia('logo')->file_name }}</a>@endif</td>
                                        <td>@if($sponsor->active)<i class="fas fa-times"></i>@endif</td>
                                        @can('delete sponsors')
                                            <td class="fit">
                                                <form method="POST" action="{{ route('admin::sponsor::delete', ['id' => $sponsor->id]) }}" >
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
                        @can('create sponsors')
                            <div class="float-right">
                                <a href="{{ route('admin::sponsor::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        @endcan
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
