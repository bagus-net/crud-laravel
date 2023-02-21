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
        @slot('pagetitle')
            Tables
        @endslot
        @slot('title')
            Product Free Gift
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    @can('product-create')
                        <a class="btn btn-success" href="{{ route('freegift.create') }}"> Add New Free Gift</a>
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
                                    <th width="5%">No.</th>
                                    <th width="10%">Product ID</th>
                                    <th width="10%">Foto</th>
                                    <th>Product Name</th>
                                    <th width="10%">Minimum Order</th>
                                    <th width="10%">Status</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_free_gift_models as $product_free_gift)
                                    <tr>

                                        <td>{{ ++$i }}</td>
                                       
                                        <td>{{ $product_free_gift->product_id }}</td>
                                        <td>  <img class="img-fluid" src="{{ URL::asset('/files/product-images/'.(json_decode($product_free_gift->fileimages))[0]) }}">
                                            
                                       </td>
                                        <td>{{ $product_free_gift->product_name }}</td>

                                        <td>${{ $product_free_gift->minimum_order }}</td>
                                        <td>{{ $product_free_gift->status }}</td>


                                        <td>
                                            <form action="{{ route('freegift.destroy', $product_free_gift->id) }}"
                                                method="POST">
                                                <a class="btn btn-info"
                                                    href="{{ route('freegift.show', $product_free_gift->id) }}">Show</a>
                                                @can('product-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('freegift.edit', $product_free_gift->id) }}">Edit</a>
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
