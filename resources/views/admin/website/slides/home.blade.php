@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-lg-2">
                @include('admin.components.website_nav', ['carousel' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-6 offset-lg-1">
                <div class="table-responsive">
                    @can('edit carousel slides')
                        <sortable-table :elements="{{ $slides->toJson() }}"
                                        :can_edit="{{ Auth::user()->can('edit carousel slides') }}"
                                        :can_delete="{{ Auth::user()->can('delete carousel slides') }}"
                                        header_view="carousel-slide-header"
                                        row_view="carousel-slide-row"
                                        order_field_name="carousel_slides_order">
                            @can('create carousel slides')
                                <a href="{{ route('admin::carousel::addForm') }}" class="btn btn-aau"><i class="fas fa-plus"></i></a>
                            @endcan
                        </sortable-table>
                    @else
                        <table class="table">
                            <thead class="thead-aau">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    @can('delete carousel slides')<th scope="col" class="fit"></th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slides as $slide)
                                        <tr>
                                            <td scope="row">{{ $slide->label }}</td>
                                            <td>@if($slide->getFirstMedia('photos'))<a href="{{ $slide->getFirstMedia('photos')->getUrl() }}">{{ $slide->getFirstMedia('photos')->file_name }}</a>@endif</td>
                                            @can('delete carousel slides')
                                                <td class="fit">
                                                    <form method="POST" action="{{ route('admin::carousel::delete', ['id' => $slide->id]) }}" >
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
                        @can('create carousel slides')
                            <div class="float-right">
                                <a href="{{ route('admin::carousel::addForm') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        @endcan
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
