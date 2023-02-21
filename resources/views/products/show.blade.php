@extends('layouts.master')
@section('title')
    @lang('translation.Add_Product')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Supresso @endslot
        @slot('title') Product @endslot
    @endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        
        
    </div>
</div>

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                     <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">SKU</label>
                        <div class="col-md-10">
                            : {{ $product_models[0]->sku }}
                        </div>
                    </div>


                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Name
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_name}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Detail
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_detail}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Shortdetail
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_shortdetail}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Brand
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_brand}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Collection
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_collection}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Type
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_type}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Form
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_form}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Package
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_package}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Price
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_price}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Price Currency
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_price_currency}}
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_weight
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_weight}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_length
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_length}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_width
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_width}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_height
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_height}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Acidity Score
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_acidityscore}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Product Acidity Desc
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_aciditydesc}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product Body Score
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_bodyscore}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product Roast Desc
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_roastdesc}}
                        </div>
                    </div>

                     <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product Type Desc
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_typedesc}}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_intensity
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_intensity}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            status_stock
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->status_stock}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            status
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->status}}
                        </div>
                    </div>

                       <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            Image
                            </label>
                        <div class="col-md-10"> 
                     @foreach ($pict as $picts)
                    <img src="{{ url('files/product-images/'.$picts) }}" height="100" style="margin:10px">
                    @endforeach
                     </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
</div>


@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js') }}"></script>
@endsection
