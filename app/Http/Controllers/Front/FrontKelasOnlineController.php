<?php

namespace App\Http\Controllers\Front;


use App\Models\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FrontKelasOnlineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $res_news = DB::select("SELECT * from kelas_online order by id asc");

        $title = "News & Reviews";
		$pages = "news";
        return view('front/kelasonline',compact('title','pages','res_news'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res_kelas_online = DB::select("SELECT * from kelas_online where id = ".$id);
        $kelas_online = $res_kelas_online[0];
        $res_kelas_online_detail = DB::select("SELECT * from kelas_online_detail where id_kelas_online = ".$id);
        $kelas_online_detail  = $res_kelas_online_detail;
        $title = "News & Reviews";
        $pages = 'detail';
        return view('front/detail-kelas_online',compact('title','pages','kelas_online','kelas_online_detail'));
    }

    
}