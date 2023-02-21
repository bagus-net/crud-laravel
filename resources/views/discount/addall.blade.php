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
            Product Flash Sale
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    @can('product-create')
                        <a class="btn btn-success" href="{{ route('flashsale.create') }}"> Set Discount Price</a>
                    @endcan

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    Set Discount Value on here <input type="text" id="discountvalue">
                    <button class="btn btn-success" onclick="setdiscountvalue()">Set</button>

                  
                    <div class="table-responsive">
                        <form action="{{ route('discount-storeall', 'id_discount_cluster=' . $id_discount_cluster) }}" method="POST">
                            @csrf
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="10%">Product ID</th>
                                    {{-- <th width="10%">Foto</th> --}}
                                    <th>Product Name</th>
                                    <th>Percentage</th>
                                    <th width="10%">Status</th>
                                    {{-- <th>Action</th> --}}


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_product_res as $product)
                                    <tr>

                                        <td>{{ ++$i }}</td>

                                        <td>{{ $product->id }}</td>
                                        {{-- <td>
                                            @if (!empty(json_decode($product->fileimages)[0]))
                                                <img class="img-fluid"
                                                    src="{{ URL::asset('/files/product-images/' . json_decode($product->fileimages)[0]) }}">
                                            @endif


                                        </td> --}}
                                        <td>{{$product->product_collection_name}}-{{ $product->product_name }}-{{$product->product_type_name}}-{{$product->product_form_name}}-{{$product->product_package_name}}
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center justify-content-between h-100"> $ <input
                                                    class="form-control rounded-0 border-0 bg-transparent" type="text"
                                                    id="discount{{$loop->index}}" name="discount[{{ $loop->index }}]"
                                                    value=0>
                                                    <input type="hidden" name="id[{{ $loop->index }}]" value={{ $product->id }}>
                                                </div>

                                        </td>
                                        <td>{{ $product->status }}</td>


                                        <td>
                                            {{-- <form action="{{ route('flashsale.destroy', $product->id) }}" method="POST">
                                                <a class="btn btn-info"
                                                    href="{{ route('flashsale.show', $product->id) }}">Show</a>
                                                @can('product-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('flashsale.edit', $product->id) }}">Edit</a>
                                                @endcan


                                                @csrf
                                                @method('DELETE')
                                                @can('product-delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                @endcan
                                            </form> --}}
                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <button class="btn btn-success" type="submit" >Submit Discount</button>
                    </form>


                        <style>
                            #datatable-buttons th,
                            #datatable-buttons td {
                                vertical-align: middle;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                serverSide: true,
                processing: true,
                ajax: '',
                paging: false
            });
        });
    </script>
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script> --}}

    <script>
        var product = '';
        var productcount = 0;
        window.onload = function(e) {
            product = @json($all_product_res);
            productcount = product.length;

        }

        function setdiscountvalue() {
           
            for (var i = 0; i < productcount; i++) {
               
                document.getElementById("discount" + i).value = document.getElementById('discountvalue').value;

            }
            window.scrollTo(0, document.body.scrollHeight);

            alert("set value done");
        }
    </script>
@endsection
