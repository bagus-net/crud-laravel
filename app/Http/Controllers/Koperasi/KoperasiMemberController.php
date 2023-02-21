<?php

namespace App\Http\Controllers\Koperasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\KoperasiMember_Model;


class KoperasiMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_member = KoperasiMember_Model::orderBy('id','DESC')->get();
        // $res_category_barang = DB::select('select * from koperasi_category_barang');
        //   dd($res_category_barang);
        $title = 'ini member';
        return view('koperasi.list-member',compact('title','res_member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_provinsi =DB :: select('select *from koperasi_provinsi');
        $res_kota =DB :: select('select *from koperasi_kota');
        $res_member =DB :: select('select *from koperasi_member');
        return view('koperasi.add-member',compact('res_member','res_provinsi', 'res_kota'));
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
            'nama' => 'required',
            'id_provinsi' => 'required',
            'id_kotakabupaten' => 'required'


        ]);

        $resinsert = DB::insert('INSERT INTO koperasi_member (nama, id_provinsi, id_kotakabupaten)
        VALUES ("'.$request->nama.'","'.$request->id_provinsi.'","'.$request->id_kotakabupaten.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('koperasimember.list')
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
        $res_kota =DB :: select('select *from koperasi_kota');
        $res_find = DB::select('select * from  koperasi_member where id='.$id);
        $find = $res_find[0];
        return view('koperasi.show-member',compact('find','res_provinsi', 'res_kota'));
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
        $res_kota =DB :: select('select *from koperasi_kota');
        $res_find = DB::select('select * from  koperasi_member where id='.$id);
        $find = $res_find[0];
        return view('koperasi.edit-member',compact('find','res_provinsi', 'res_kota'));
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
            'nama' => 'required',
            'id_provinsi' => 'required',
            'id_kotakabupaten' => 'required',
            

        ]);
        // dump($id);
        // dump($request->category_barang);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE koperasi_member
        set nama="'.$request->nama.'",id_provinsi = "'.$request->id_provinsi.'", id_kotakabupaten= "'.$request->id_kotakabupaten.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('koperasimember.list')
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
        $resdelete = DB::delete('DELETE FROM koperasi_member WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('koperasimember.list')
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