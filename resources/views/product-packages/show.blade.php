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
        @slot('pagetitle') Product @endslot
        @slot('title') Product Packages @endslot
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
                        <label for="example-text-input" class="col-md-2 col-package-label">Name</label>
                        <div class="col-md-10">
                            : {{ $product_package_models->product_package_name }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-package-label">Description</label>
                        <div class="col-md-10">
                            : {{ $product_package_models->product_package_desc }}
                        </div>
                    </div>

                     <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-package-label">Status</label>
                        <div class="col-md-10">
                            : {{ $product_package_models->status }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product-packages.index') }}"> Back</a>
        </div>
</div>


@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js') }}"></script>
@endsection
