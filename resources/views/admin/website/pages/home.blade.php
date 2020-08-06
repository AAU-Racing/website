@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @component('admin.components.website_nav', ['pages' => 'active', 'flex' => 'md'])
                @endcomponent
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <div class="table-responsive">
                    @can('edit pages')
                        <sortable-table :elements="{{ json_encode($pages) }}"
                                        :can_edit="{{ Auth::user()->can('edit pages') }}"
                                        header_view="page-header"
                                        row_view="page-row"
                                        order_field_name="page_order">
                            <a href="{{ route('admin::page::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </sortable-table>
                    @else
                        <table class="table">
                            <thead class="thead-aau">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Title') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td scope="row">{{ $page->name }}</td>
                                        <td>{{ $page->title }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
