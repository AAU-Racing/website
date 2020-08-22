@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @include('admin.components.website_nav', ['press' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <div class="table-responsive">
                    @can('edit press posts')
                        <sortable-table :elements="{{ $press_posts->toJson() }}"
                                        :can_delete="{{ Auth::user()->can('delete press posts') }}"
                                        header_view="press-post-header"
                                        row_view="press-post-row"
                                        order_field_name="press_post_order">
                            @can('create press posts')
                                <a href="{{ route('admin::press::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            @endcan
                        </sortable-table>
                    @else
                        <table class="table">
                            <thead class="thead-aau">
                                <tr>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Content') }}</th>
                                    <th scope="col">{{ __('Active') }}</th>
                                    @can('delete press posts')<th scope="col" class="fit"></th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($press_posts as $press_post)
                                    <tr>
                                        <td scope="row">{{ $press_post->name }}</td>
                                        <td>{!! $press_post->content !!}</td>
                                        <td>@if($press_post->active)<i class="fas fa-times"></i>@endif</td>
                                        @can('delete press posts')
                                            <td class="fit">
                                                <form method="POST" action="{{ route('admin::press::delete', ['id' => $press_post->id]) }}">
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
                        @can('create press posts')
                            <div class="float-right">
                                <a href="{{ route('admin::press::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        @endcan
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
