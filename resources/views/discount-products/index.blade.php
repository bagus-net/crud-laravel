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
        @slot('title') Discount Product List @endslot
    @endcomponent

 <div class="row">
        <div class="col-lg-12 margin-tb">
             <div class="card">
                <div class="card-body">
                @can('product-create')
                {{-- <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a> --}}
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

<th>Product Disc Default</th>
<th>Product Disc Event</th>
<th>Event Discount</th>
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

<td>{{ $product->product_default_discount}}</td>
<td>  @if(empty($product->disc_event))
    <span class="badge bg-dark">not in promo</span>
    @else
      <span class="badge bg-danger">{{$product->disc_event}}</span>
    @endif</td>
<td>
    @if(empty($product->event_promo))
    <span class="badge bg-dark">not in promo</span>
    @else
      <span class="badge bg-danger">{{$product->event_promo}}</span>
    @endif
</td>
<td>{{ $product->status}}</td>


                            
                            {{-- <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td> --}}
                            <td>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    
                                    @can('product-edit')
                                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                    @endcan
                                 

                                    @csrf
                                    @method('DELETE')
                                   
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
