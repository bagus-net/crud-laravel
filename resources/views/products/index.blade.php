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
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
                
                 </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
              
                    {{-- <h4 class="card-title">Buttons example</h4>
                    <p class="card-title-desc">The Buttons extension for DataTables
                        provides a common set of options, API methods and styling to display
                        buttons on a page that will interact with a DataTable. The core library
                        provides the based framework upon which plug-ins can built.
                    </p> --}}
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                 <th>No.</th>
<th>SKU</th>
<th>Product name</th>
<th>product_collection_name</th>
              <th>product_type_name</th>
              <th>product_form_name</th>
              <th>product_package_name</th>
              <th>Product weight</th>
<th>Currency</th>
<th>Product price</th>

<th>Acidity Score</th>
<th>Acidity Desc</th>
<th>Body Score</th>
<th>Body Desc</th>
<th>Roast Desc</th>
<th>Type Desc</th>
<th>Intensity</th>


<th>Product detail</th>
<th>Product shortdetail</th>
<th>Product brand</th>
<th>Product collection</th>
<th>Product type</th>
<th>Product form</th>
<th>Product package</th>


<th>Product width</th>
<th>Product height</th>
<th>Product length</th>

<th>Status Stock</th>
<th>Status</th>




                                  <th>Action</th>

                              
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($product_models as $product)
                        <tr>
                           
                            
                            <td>{{ ++$i }}</td>
<td>{{ $product->sku}}</td>
<td>{{ $product->product_name}}</td>

<td>{{$product->product_collection_name}}</td>
              <td>{{$product->product_type_name}}</td>
              <td>{{$product->product_form_name}}</td>
              <td>{{$product->product_package_name}}</td>
              <td>{{ $product->product_weight}}</td>

<td>{{ $product->product_price_currency}}</td>
<td>{{ $product->product_price}}</td>

<td>{{ $product->product_acidityscore}}</td>
<td>{{ $product->product_aciditydesc}}</td>
<td>{{ $product->product_bodyscore}}</td>
<td>{{ $product->product_bodydesc}}</td>
<td>{{ $product->product_roastdesc}}</td>
<td>{{ $product->product_typedesc}}</td>
<td>{{ $product->product_intensity}}</td>

<td>{{ $product->product_detail}}</td>
<td>{{ $product->product_shortdetail}}</td>
<td>{{ $product->product_brand}}</td>
<td>{{ $product->product_collection}}</td>
<td>{{ $product->product_type}}</td>
<td>{{ $product->product_form}}</td>
<td>{{ $product->product_package}}</td>


<td>{{ $product->product_width}}</td>
<td>{{ $product->product_height}}</td>
<td>{{ $product->product_length}}</td>

<td>{{ $product->status_stock}}</td>
<td>{{ $product->status}}</td>


                            
                            {{-- <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td> --}}
                            <td>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                    @can('product-edit')
                                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                    @endcan
                                    <a class="btn btn-warning" href="{{ route('product-images.index','id_product='.$product->id) }}">Add Image Product</a>

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
