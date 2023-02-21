<?php

namespace App\Http\Controllers\Koperasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\KoperasiProvinsi_Model;


class KoperasiProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_provinsi = KoperasiProvinsi_Model::orderBy('id','DESC')->get();
        // $res_category_barang = DB::select('select * from koperasi_category_barang');
        //   dd($res_category_barang);
        $title = 'ini provinsi';
        return view('koperasi.list-provinsi',compact('title','res_provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_provinsi =DB :: select('select *from koperasi_provinsi');
        return view('koperasi.add-provinsi',compact('res_provinsi'));
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
            
            'provinsi' => 'required',
            


        ]);

        $resinsert = DB::insert('INSERT INTO koperasi_provinsi (provinsi)
        VALUES ("'.$request->provinsi.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('koperasiprovinsi.list')
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
        $res_provinsi =DB :: select('select *from koperasi_provinsi');
        $res_find = DB::select('select * from  koperasi_provinsi where id='.$id);
        $find = $res_find[0];
        return view('koperasi.show-provinsi',compact('find','res_provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_provinsi =DB :: select('select *from koperasi_provinsi');
        $res_find = DB::select('select * from  koperasi_provinsi where id='.$id);
        $find = $res_find[0];
        return view('koperasi.edit-provinsi',compact('find','res_provinsi'));
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
            'provinsi' => 'required',

            

        ]);
        // dump($id);
        // dump($request->category_barang);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE koperasi_provinsi
        set provinsi="'.$request->provinsi.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('koperasiprovinsi.list')
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
        $resdelete = DB::delete('DELETE FROM koperasi_provinsi WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('koperasiprovinsi.list')
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