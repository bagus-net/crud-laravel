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
            Members Order & Point Beans
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
                                    <th>Number.</th>
                                    <th>username</th>
                                    {{-- <th>password</th>
                                    <th>password real</th> --}}
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    {{-- <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Fullname</th>
                                    <th>Nickname</th>
                                    <th>Website</th>
                                    <th>Company</th> --}}
                                    <th>Point Redeem</th>
                                    <th>Beans Point</th>
                                    <th>Beans Caption</th>
                                    {{-- <th>Gambar</th> --}}
                                    {{-- <th>Alamat</th> --}}
                                    {{-- <th>Kecamatan</th> --}}
                                    {{-- <th>Kota</th> --}}
                                    {{-- <th>Provinsi</th> --}}
                                    {{-- <th>Negara</th> --}}
                                    {{-- <th>Kode negara</th> --}}
                                    {{-- <th>Kode pos</th> --}}
                                    {{-- <th>status</th> --}}
                                    <th>Order List</th>
                                    

                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member_models as $member)
                                    <tr>


                                        <td>{{ ++$i }}</td>

                                        <td>{{ $member->username }}</td>
                                        {{-- <td>{{ $member->password }}</td> --}}
                                        {{-- <td>
                                            @php
                                                $string = $member->password;
                                                $output = false;
                                                $action = 'decrypt';
                                                $encrypt_method = 'AES-256-CBC';
                                                $secret_key = 'osdkfje';
                                                $secret_iv = 'sdfvcdfeg';
                                                
                                                // hash
                                                $key = hash('sha256', $secret_key);
                                                
                                                // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a
                                                // warning
                                                $iv = substr(hash('sha256', $secret_iv), 0, 16);
                                                
                                                if ($action == 'encrypt') {
                                                    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                                                    $output = base64_encode($output);
                                                } else {
                                                    if ($action == 'decrypt') {
                                                        $password = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                                                    }
                                                }
                                                
                                                //         $password = $member->password;
                                                // $password = \encrypt_decrypt('decrypt', $password);
                                                echo $password;
                                            @endphp</td> --}}
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->notelp }}</td>
                                        {{-- <td>{{ $member->firstname }}</td>
                                        <td>{{ $member->lastname }}</td>
                                        <td>{{ $member->fullname }}</td>
                                        <td>{{ $member->nickname }}</td>
                                        <td>{{ $member->website }}</td>
                                        <td>{{ $member->company }}</td> --}}
                                        <td>{{ $member->totaluserredeem }}</td>
                                        <td>{{ $member->totalpoint }}</td> 
                                        <td>{{ $member->captionpoint }}</td> 
                                        {{-- <td>{{ $member->gambar }}</td> --}}
                                        {{-- <td>{{ $member->alamat }}</td> --}}
                                        {{-- <td>{{ $member->kecamatan }}</td> --}}
                                        {{-- <td>{{ $member->kota }}</td> --}}
                                        {{-- <td>{{ $member->provinsi }}</td> --}}
                                        {{-- <td>{{ $member->negara }}</td> --}}
                                        {{-- <td>{{ $member->kodenegara }}</td> --}}
                                        {{-- <td>{{ $member->kodepos }}</td> --}}
                                        {{-- <td>{{ $member->status }}</td> --}}
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
