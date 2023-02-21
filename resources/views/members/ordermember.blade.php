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
            Members Point Beans
        @endslot
    @endcomponent

   
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
                                    <th rowspan="2">Number.</th>
                                    <th rowspan="2">username</th>
                                   
                                    <th rowspan="2">Email</th>
                                    <th rowspan="2">Telpon</th>
                                  
                                    <th rowspan="2">Total All Orders</th>
                                    <th colspan="4"> Status Order</th>
                                   
                                  
                                    <th rowspan="2">Order List</th>
                                    

                                    <th rowspan="2">Action</th>


                                </tr>
                                <tr>
                                   
                                  
                                  
                                  
                                    <th>Active</th>
                                    <th>On-Hold</th>
                                    <th>Cancel</th>
                                    <th>Complete</th>
                                  
                                  


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member_models as $member)
                                    <tr>


                                        <td>{{ ++$i }}</td>

                                        <td>{{ $member->username }}</td>
                                       
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->notelp }}</td>
                                       
                                        <td>total order</td>
                                        <td></td> 
                                        <td></td> 
                                        <td></td> 
                                        <td></td> 
                                     
                                        <td>
                                            <table class="table table-striped table-bordered dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <th>No.</th>
                                                    <th>status</th>
                                                    <th>tanggalorder</th>
                                                    <th>jamorder</th>
                                                    <th>itemsubtotal</th>
                                                    <th>discon</th>
                                                    <th>shippingprice</th>
                                                    <th>ordertotal</th>

                                                </thead>
                                                <tbody>
                                                    @foreach ($member->order as $item)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>
                                                                @if ($item->status == 'cancel')
                                                                    <button type="button"
                                                                        class="btn btn-danger">{{ $item->status }}</button>
                                                                @elseif ($item->status == 'complete')
                                                                    <button type="button"
                                                                        class="btn btn-success">{{ $item->status }}</button>
                                                                @elseif ($item->status == 'processing')
                                                                    <button type="button"
                                                                        class="btn btn-info">{{ $item->status }}</button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-warning">{{ $item->status }}</button>
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->tanggalorder }}</td>
                                                            <td>{{ $item->jamorder }}</td>
                                                            <td>{{ $item->itemsubtotal }}</td>
                                                            <td>{{ $item->discon }}</td>
                                                            <td>{{ $item->shippingprice }}</td>
                                                            <td>{{ $item->ordertotal }}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>


                                        </td>
                                      

                                        {{-- <td>{{ $member->name }}</td>
                            <td>{{ $member->detail }}</td> --}}
                                        <td>
                                            <form action="{{ route('products.destroy', $member->id) }}" method="POST">
                                                <a class="btn btn-info"
                                                    href="{{ route('products.show', $member->id) }}">Show</a>
                                                @can('product-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('products.edit', $member->id) }}">Edit</a>
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
    <script>
        function synctovend() {
            alert("sync to vend");
        }
    </script>
@endsection
