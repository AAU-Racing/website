@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @include('admin.components.website_nav', ['footer_links' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <div class="table-responsive">
                    @can('edit footer links')
                        <sortable-table :elements="{{ $footer_links->toJson() }}"
                                        :can_delete="{{ Auth::user()->can('delete footer links') }}"
                                        header_view="footer-link-header"
                                        row_view="footer-link-row"
                                        order_field_name="footer_link_order">
                            @can('create footer links')
                                <a href="{{ route('admin::footer_link::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            @endcan
                        </sortable-table>
                    @else
                        <table class="table">
                            <thead class="thead-aau">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Path') }}</th>
                                    <th scope="col">{{ __('Target') }}</th>
                                    <th scope="col">{{ __('Active') }}</th>
                                    @can('delete footer links')<th scope="col" class="fit"></th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($footer_links as $footer_link)
                                    <tr>
                                        <td scope="row">{{ $footer_link->name }}</td>
                                        <td><a href="{{ $footer_link->path }}" target="_blank">{{ $footer_link->path }}</a></td>
                                        <td>{{ $footer_link->formatted_target }}</td>
                                        <td>@if($footer_link->active)<i class="fas fa-times"></i>@endif</td>
                                        @can('delete footer links')
                                            <td class="fit">
                                                <form method="POST" action="{{ route('admin::footer_link::delete', ['id' => $footer_link->id]) }}" >
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
                        @can('create footer links')
                            <div class="float-right">
                                <a href="{{ route('admin::footer_link::addForm') }}" class="btn btn-aau"><i class="fas fa-plus"></i></a>
                            </div>
                        @endcan
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
