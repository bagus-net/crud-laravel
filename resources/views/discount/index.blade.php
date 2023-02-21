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
        @slot('pagetitle') Supresso @endslot
        @slot('title') Product Discount List @endslot
    @endcomponent

 <div class="row">
        <div class="col-lg-12 margin-tb">
             <div class="card">
                <div class="card-body">
                @can('product-create')
                <a class="btn btn-primary" href="{{ route('discount-cluster.index') }}"> Back</a>
                <a class="btn btn-success" href="{{ route('discount.create','id_discount_cluster=' .$id_discount_cluster) }}"> Add Product Discount</a>
                  
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

                                <th>Promo</th>
                                <th>Product</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($discount_models as $discount)
                        <tr>
                           
                            
                            <td>{{ ++$i }}</td>
                                <td>{{$discount->nama}}</td>
                                <td>{{$discount->product_name}}</td>
                                <td>{{$discount->discount}}</td>
                                <td>{{$discount->status}}</td>
          
                            <td>
                                <form action="{{ route('discount.destroy',$discount->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('discount-cluster.show',$discount->id) }}">Show</a>
                                    @can('product-edit')
                                    <a class="btn btn-primary" href="{{ route('discount-cluster.edit',$discount->id) }}">Edit</a>
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
