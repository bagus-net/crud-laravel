
@extends('layouts.master')
@section('title')
    @lang('translation.Datatables')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Tables @endslot
        @slot('title') Product Collection List @endslot
    @endcomponent

 <div class="row">
        <div class="col-lg-12 margin-tb">
             <div class="card">
                <div class="card-body">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('product-collections.create') }}"> Create New Product Collections</a>
                @endcan
                
                 </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                 <th>No.</th>
                                 <th>Name </th>
                                 <th>Description</th>
                                 <th>Status</th>
                                 <th>Menu Ordering</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($product_collection_models as $product_collection)
                        <tr>
                           
                            
                            <td>{{ ++$i }}</td>
                            <td>{{ $product_collection->product_collection_name}}</td>
                            <td>{{ $product_collection->product_collection_desc}}</td>
                            <td>{{ $product_collection->status}}</td>
                            <td>{{ $product_collection->order}}</td>

                            <td>
                                <form action="{{ route('product-collections.destroy',$product_collection->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('product-collections.show',$product_collection->id) }}">Show</a>
                                    @can('product-edit')
                                    <a class="btn btn-primary" href="{{ route('product-collections.edit',$product_collection->id) }}">Edit</a>
                                    @endcan


                                    @csrf
                                    @method('DELETE')
                                    @can('product-delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @endcan
                                </form>
                            </td>

                           
                        </tr>
	    @endforeach
                           
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
