<?php

namespace App\Http\Controllers\Koperasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\KoperasiCategoryBarang_Model;

class KoperasiCategoryBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_category_barang = KoperasiCategoryBarang_Model::orderBy('id','DESC')->get();
        // $res_category_barang = DB::select('select * from koperasi_category_barang');
        //   dd($res_category_barang);
        $title = 'ini category barang';
        return view('koperasi.list-categorybarang',compact('title','res_category_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('koperasi.add-categorybarang');
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
            'category_barang' => 'required'
        ]);

        $resinsert = DB::insert('INSERT INTO koperasi_category_barang (category_barang)
        VALUES ("'.$request->category_barang.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('koperasicategorybarang.list')
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
        $res_find = DB::select('select * from koperasi_category_barang where id='.$id);
        $find = $res_find[0];
        return view('koperasi.show-categorybarang',compact('find'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $res_find = DB::select('select * from koperasi_category_barang where id='.$id);
        $find = $res_find[0];
        return view('koperasi.edit-categorybarang',compact('find'));
        
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
            'category_barang' => 'required'
        ]);
        // dump($id);
        // dump($request->category_barang);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE koperasi_category_barang
        SET category_barang="'.$request->category_barang.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('koperasicategorybarang.list')
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

        $resdelete = DB::delete('DELETE FROM koperasi_category_barang WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('koperasicategorybarang.list')
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
