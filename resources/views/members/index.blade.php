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
            Members
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    @can('product-create')
                        <a class="btn btn-success" href="{{ route('members.create') }}"> Create New Members</a>
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
                    <h2>Web Members</h2>

                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Vend Id</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>password real</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Fullname</th>
                                    <th>Nickname</th>
                                    <th>Website</th>
                                    <th>Company</th>
                                    <th>Gambar</th>
                                    <th>Alamat</th>
                                    <th>Kecamatan</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                    <th>Negara</th>
                                    <th>Kode negara</th>
                                    <th>Kode pos</th>


                                    <th>status</th>

                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member_models as $member)
                                    <tr>


                                        <td>{{ ++$i }}</td>
                                        <td>
                                            @if (!empty($member->vend))
                                            <button type="button" class="btn btn-success">
                                                already sync <span
                                                    class="badge bg-info text-bg-primary">&#9745;</span>
                                            </button>
                                                
                                            @else
                                                <button type="button" class="btn btn-warning" onclick="synctovend()">
                                                    sync to vend <span
                                                        class="badge bg-danger text-bg-primary">&#9746;</span>
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{ $member->username }}</td>
                                        <td>{{ $member->password }}</td>
                                        <td>
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
                                            @endphp</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->notelp }}</td>
                                        <td>{{ $member->firstname }}</td>
                                        <td>{{ $member->lastname }}</td>
                                        <td>{{ $member->fullname }}</td>
                                        <td>{{ $member->nickname }}</td>
                                        <td>{{ $member->website }}</td>
                                        <td>{{ $member->company }}</td>
                                        <td>{{ $member->gambar }}</td>
                                        <td>{{ $member->alamat }}</td>
                                        <td>{{ $member->kecamatan }}</td>
                                        <td>{{ $member->kota }}</td>
                                        <td>{{ $member->provinsi }}</td>
                                        <td>{{ $member->negara }}</td>
                                        <td>{{ $member->kodenegara }}</td>
                                        <td>{{ $member->kodepos }}</td>

                                        <td>{{ $member->status }}</td>



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
                    <h2>Vend Members</h2>

                    <div class="table-responsive">
                        <table id="datatable-buttons-2" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>name</th>
                                    <th>id</th>
                                    <th>customer_code</th>
                                    <th>source_unique_id</th>
                                    <th>first_name</th>
                                    <th>last_name</th>
                                    <th>email</th>
                                    <th>year_to_date</th>
                                    <th>balance</th>
                                    <th>loyalty_balance</th>
                                    <th>on_account_limit</th>
                                    <th>note</th>
                                    <th>gender</th>
                                    <th>date_of_birth</th>
                                    <th>company_name</th>
                                    <th>do_not_email</th>
                                    <th>loyalty_email_sent</th>
                                    <th>phone</th>
                                    <th>mobile</th>
                                    <th>fax</th>
                                    <th>twitter</th>
                                    <th>website</th>
                                    <th>physical_address_1</th>
                                    <th>physical_address_2</th>
                                    <th>physical_suburb</th>
                                    <th>physical_city</th>
                                    <th>physical_postcode</th>
                                    <th>physical_state</th>
                                    <th>physical_country_id</th>
                                    <th>postal_address_1</th>
                                    <th>postal_address_2</th>
                                    <th>postal_suburb</th>
                                    <th>postal_city</th>
                                    <th>postal_state</th>
                                    <th>postal_country_id</th>
                                    <th>customer_group_id</th>
                                    <th>enable_loyalty</th>
                                    <th>custom_field_1</th>
                                    <th>custom_field_2</th>
                                    <th>custom_field_3</th>
                                    <th>custom_field_4</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>deleted_at</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($totalmember as $membervend)
                                    <tr>


                                        <td>{{ ++$m }}</td>
                                        <td>{{ $membervend['name'] }}</td>
                                        <td>{{ $membervend['id'] }}</td>
                                        <td>{{ $membervend['customer_code'] }}</td>
                                        <td>{{ $membervend['source_unique_id'] }}</td>
                                        <td>{{ $membervend['first_name'] }}</td>
                                        <td>{{ $membervend['last_name'] }}</td>
                                        <td>{{ $membervend['email'] }}</td>
                                        <td>{{ $membervend['year_to_date'] }}</td>
                                        <td>{{ $membervend['balance'] }}</td>
                                        <td>{{ $membervend['loyalty_balance'] }}</td>
                                        <td>{{ $membervend['on_account_limit'] }}</td>
                                        <td>{{ $membervend['note'] }}</td>
                                        <td>{{ $membervend['gender'] }}</td>
                                        <td>{{ $membervend['date_of_birth'] }}</td>
                                        <td>{{ $membervend['company_name'] }}</td>
                                        <td>{{ $membervend['do_not_email'] }}</td>
                                        <td>{{ $membervend['loyalty_email_sent'] }}</td>
                                        <td>{{ $membervend['phone'] }}</td>
                                        <td>{{ $membervend['mobile'] }}</td>
                                        <td>{{ $membervend['fax'] }}</td>
                                        <td>{{ $membervend['twitter'] }}</td>
                                        <td>{{ $membervend['website'] }}</td>
                                        <td>{{ $membervend['physical_address_1'] }}</td>
                                        <td>{{ $membervend['physical_address_2'] }}</td>
                                        <td>{{ $membervend['physical_suburb'] }}</td>
                                        <td>{{ $membervend['physical_city'] }}</td>
                                        <td>{{ $membervend['physical_postcode'] }}</td>
                                        <td>{{ $membervend['physical_state'] }}</td>
                                        <td>{{ $membervend['physical_country_id'] }}</td>
                                        <td>{{ $membervend['postal_address_1'] }}</td>
                                        <td>{{ $membervend['postal_address_2'] }}</td>
                                        <td>{{ $membervend['postal_suburb'] }}</td>
                                        <td>{{ $membervend['postal_city'] }}</td>
                                        <td>{{ $membervend['postal_state'] }}</td>
                                        <td>{{ $membervend['postal_country_id'] }}</td>
                                        <td>{{ $membervend['customer_group_id'] }}</td>
                                        <td>{{ $membervend['enable_loyalty'] }}</td>
                                        <td>{{ $membervend['custom_field_1'] }}</td>
                                        <td>{{ $membervend['custom_field_2'] }}</td>
                                        <td>{{ $membervend['custom_field_3'] }}</td>
                                        <td>{{ $membervend['custom_field_4'] }}</td>
                                        <td>{{ $membervend['created_at'] }}</td>
                                        <td>{{ $membervend['updated_at'] }}</td>
                                        <td>{{ $membervend['deleted_at'] }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
   
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
        <script>
            function synctovend(){
                alert("sync to vend");
            }
        </script>
@endsection
