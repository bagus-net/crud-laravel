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
        @slot('title') Product List @endslot
    @endcomponent

 <div class="row">
        <div class="col-lg-12 margin-tb">
             <div class="card">
                <div class="card-body">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('discount-cluster.create') }}"> Create New Promo</a>
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
                                <th>Nama</th>
                                <th>Active Date</th>
                                <th>Off Date</th>
                                <th>status</th>
                             
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($discount_cluster_models as $discount_cluster)
                        <tr>
                           
                            
                            <td>{{ ++$i }}</td>
                                <td>{{$discount_cluster->nama}}</td>
                                <td>{{$discount_cluster->active_date}}</td>
                                <td>{{$discount_cluster->off_date}}</td>
                                <td>{{$discount_cluster->status}}</td>
          
                            <td>
                                <form action="{{ route('products.destroy',$discount_cluster->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('discount-cluster.show',$discount_cluster->id) }}">Show</a>
                                    @can('product-edit')
                                    <a class="btn btn-primary" href="{{ route('discount-cluster.edit',$discount_cluster->id) }}">Edit</a>
                                    @endcan
                                    <a class="btn btn-warning" href="{{ route('discount.index','id_discount_cluster='.$discount_cluster->id) }}">Add Product Discount</a>

                                    <a class="btn btn-secondary" href="{{ route('discount-addall','id_discount_cluster='.$discount_cluster->id) }}">Add All Product Discount</a>

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
