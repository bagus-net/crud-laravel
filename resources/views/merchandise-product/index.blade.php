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
        @slot('title') Marchendise List @endslot
    @endcomponent

    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
             
        </div>
    </div> --}}
@foreach($merchandise_product_models as $collections)
    <div class="card">
                <div class="card-body">
                    <h5>{{$collections->product_collection_name}}</h5>
                <div class="container-fluid">
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5">

                        @foreach($collections->product_merchandise as $merchandise)

                        <div class="col col-product mb-4 mb-xxl-5">
                            <div class="card card-product border-0 rounded-0 text-center">
                                <div class="card-header position-relative p-0 rounded-0 border-0">
                                   @if(empty($merchandise->images))
								<img class="img-fluid" src="{{ url('files/'.'imagenotavailable.jpg') }}">
								{{-- <img class="img-fluid" src="{{ url('files/'.'imagenotavailable.jpg') }}"> --}}
								@else
									
									<img class="img-fluid" src="{{ url('files/product-images/'.$merchandise->images[0]) }}">
									
								@endif
                                   
                                </div>
                                <div class="card-body text-capitalize px-0 pb-0">
                                    <div class="card-title fw-bold lh-sm" style="min-height:40px">{{$merchandise->product_name}}</div>
                                   
                                    <div class="harga-produk mb-0">
                                        <!-- <span class="harga-normal">S$ 7.50</span> -->
                                        <span class="harga-promo d-flex justify-content-center align-items-center gap-2">
                                            <span class="harga-setelah-diskon">{{$merchandise->poinneed}} Poins</span>
                                            {{-- <span class="harga-awal">S$ 7.50</span> --}}
                                        </span>
                                        
                                    </div>
                                    <div class="d-flex w-100 gap-2">
                                        <button class="btn btn-outline-secondary w-75">Update</button>
                                         <button class="btn btn-outline-danger w-25">
                                            &#x2715;
                                         </button>
                                    </div>
                                    
                                    
                                </div>
                                {{-- <button class="btn border-0 btn-bookmark position-absolute top-0 start-0 fs-3 p-0 ms-3 lh-1 d-none">
                                    <i class="bi bi-bookmark-fill"></i>
                                </button>
                                <div class="wobler text-bg-primary position-absolute top-0 start-0 py-1 px-2 small">SAVE 15%</div> --}}
                            </div>
                        </div>

                         @endforeach

                        

                    
                    </div>
                </div>

                @can('product-create')
                {{-- <a class="btn btn-primary" href="{{ route('discount-cluster.index') }}"> Back</a>
                <a class="btn btn-success" href="{{ route('discount.create','id_discount_cluster=' .$id) }}"> Add Product Discount</a>
                   --}}
                @endcan
                
                 </div>
    </div>
@endforeach
    

    

 

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
