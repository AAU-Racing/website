@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @component('admin.components.website_nav', ['pages' => 'active', 'flex' => 'md'])
                @endcomponent
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <pages-table :pages="{{ json_encode($pages) }}" :can_edit_pages="{{ Auth::user()->can('edit pages') }}" >
                    <a href="{{ route('admin::page::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </pages-table>
            </div>
        </div>
    </div>
@endsection