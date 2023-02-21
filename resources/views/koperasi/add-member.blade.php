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
        @slot('pagetitle') Tables @endslot
        @slot('title') Add Member @endslot
    @endcomponent
   


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
    <form action="{{ route('koperasimember.add') }}" method="POST">
    	@csrf


        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Nama :</label>
            <div class="col-md-10">
            <input class="form-control" type="text" name="nama" value="" id="example-text-input" placeholder="nama">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Id Provinsi :</label>
            <div class="col-md-10">
            {{-- <input class="form-control" type="text" name="id_category_barang" value="" id="example-text-input" placeholder="Name"> --}}
            <select class="form-select" name="id_provinsi" onchange ="selectkota()"
            id="provinsi" aria-label="Floating label select">
            @foreach ($res_provinsi as $item)
            <option value ="{{$item->id}}">
              {{$item->provinsi}}</option>
            @endforeach
              </select>
          </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Id Kota Kabupaten :</label>
            <div class="col-md-10">
            {{-- <input class="form-control" type="text" name="id_category_barang" value="" id="example-text-input" placeholder="Name"> --}}
            <select class="form-select" name="id_kotakabupaten" 
            id="kota" aria-label="Floating label select">
            @foreach ($res_kota as $item)
            <option value ="{{$item->id}}">
              {{$item->kota}}</option>
            @endforeach
              </select>
          </div>
        </div>

		      {{-- <div class="mb-3 row">
		       
		             <label for="example-text-input" class="col-md-2 col-form-label">Detail :</label>
		              <div class="col-md-10">
                     <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		            </div>
        
		    </div> --}}
		    
		   
	<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('koperasimember.list') }}"> Back</a>
		            <button type="submit" class="btn btn-primary">Submit</button>
            </div>


    </form>
</div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
@section('script')

<script>
    var provinsi = @json($res_provinsi);
    var kota = @json($res_kota);
    //===============================================================
    console.log("ini provinsinya gaes")
    console.log(provinsi);
    console.log("ini kotanya gaes")
    console.log(kota);
    var filtered = kota.filter(p => p.id_provinsi == 1)
    // const filtered = kota.filter(([key, value]) => id_provinsi === 1);
    console.log("ini setelah difilter gaes")
    console.log(filtered)
    //===============================================================
    function selectkota()
    {
    var idprovinsi = document.getElementById('provinsi').value;
    var filtered = kota.filter(p => p.id_provinsi == idprovinsi)
    var str = '';
    str = "<select class='form-select' name='id_kota' id='kota' aria-label='Floating label select'>";
        for (let index = 0; index < filtered.length; index++) {
            //const element = array[index];
            console.log(filtered[index].kota);
            str += "<option value="+filtered[index].id+">"+filtered[index].kota+"</option>";
        }
        str +="</select>";
        console.log(str)       ;
        document.getElementById('kota').innerHTML = str;
    }
    </script>
    
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
