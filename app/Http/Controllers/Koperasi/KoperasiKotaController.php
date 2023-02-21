<?php

namespace App\Http\Controllers\Koperasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\KoperasiKota_Model;


class KoperasiKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_kota = KoperasiKota_Model::orderBy('id','DESC')->get();
        // $res_category_barang = DB::select('select * from koperasi_category_barang');
        //   dd($res_category_barang);
        $title = 'ini kota';
        return view('koperasi.list-kota',compact('title','res_kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_provinsi =DB ::select ('select *from koperasi_provinsi');
        $res_kota =DB :: select('select *from koperasi_kota');
        return view('koperasi.add-kota',compact('res_kota','res_provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          
            'id_provinsi' => 'required',
            'kota' => 'required'


        ]);

        $resinsert = DB::insert('INSERT INTO koperasi_kota (id_provinsi, kota)
        VALUES ("'.$request->id_provinsi.'","'.$request->kota.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('koperasikota.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res_provinsi =DB:: select('select *from koperasi_provinsi');
        $res_kota =DB :: select('select *from koperasi_kota');
        $res_find = DB::select('select * from  koperasi_kota where id='.$id);
        $find = $res_find[0];
        return view('koperasi.show-kota',compact('find','res_kota','res_provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_provinsi =DB ::select ('select *from koperasi_provinsi');
        $res_kota =DB :: select('select *from koperasi_kota');
        $res_find = DB::select('select * from  koperasi_kota where id='.$id);
        $find = $res_find[0];
        return view('koperasi.edit-kota',compact('find','res_kota','res_provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
         
            'id_provinsi' => 'required',
            'kota' => 'required',
            

        ]);
        // dump($id);
        // dump($request->category_barang);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE koperasi_kota
        set id_provinsi = "'.$request->id_provinsi.'", kota= "'.$request->kota.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('koperasikota.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resdelete = DB::delete('DELETE FROM koperasi_kota WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('koperasikota.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }

    }
}