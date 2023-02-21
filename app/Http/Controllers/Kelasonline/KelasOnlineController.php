<?php

namespace App\Http\Controllers\Kelasonline;

use App\Models\Kelas_online_model;
use App\Models\Kelas_online_category_model;
use App\Models\Kelas_online_detail_model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class KelasOnlineController extends Controller
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
        // $product_models = Product_model::latest()->get();

        $kelasonline =  DB::select("SELECT n.id, n.title, c.name, n.created_at from kelas_online as n inner join kelas_online_category as c on n.category_id = c.id");

        return view('kelasonline/list-kelasonline', compact('kelasonline'));
            // ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news_category_models = Kelas_online_category_model::latest()->get();
        return view('kelasonline/add-kelasonline',compact('news_category_models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("ayam");
        $this->validate($request, [
            'title' => 'required'
        ]);

        $files = '';
        if ($request->hasfile('image')) {
           
            // foreach ($request->file('filenames') as $file) {
                $file = $request->file('image');
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files/news-images'), $name);
                $files = $name;
            // }
        }

        $kelas_online_models = Kelas_online_model::create([
            'category_id' =>$request->category_id,
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'text' => $request->text,
            'image' => $files,
            'status' => $request->status
        ]);

        if ($kelas_online_models) {
            return redirect()
                ->route('kelasonline.index')
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

        $res_kelas_online = DB::select("SELECT * from kelas_online where id = ".$id);
        $kelas_online = $res_kelas_online[0];
        $res_kelas_online_detail = DB::select("SELECT * from kelas_online_detail where id_kelas_online = ".$id);
        $kelas_online_detail  = $res_kelas_online_detail;
        $title = "News & Reviews";
        $pages = 'detail';


        //$kelas_online_models = Kelas_online_model::find($id);
        return view('kelasonline.show-kelasonline', compact('title','pages','kelas_online','kelas_online_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reskelasonline =  DB::select("SELECT n.id, n.title,n.short_desc, n.text, c.name, n.created_at from kelas_online as n inner join kelas_online_category as c on n.category_id = c.id where n.id=".$id);
        $kelasonline = $reskelasonline[0];
        //dd($news);
        //$product_models = Blog_article_category_model::findOrFail($id);
        return view('kelasonline.edit-kelasonline', compact('kelasonline'));
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

        //    dd($request->status);
        
        $this->validate($request, [
            'title' => 'required'
        ]);
        
         $files = '';
        if ($request->hasfile('image')) {
           
            // foreach ($request->file('filenames') as $file) {
                $file = $request->file('image');
                $name = time() . rand(1, 100) . '.' . $file->extension();
               
                $file->move(public_path('files/news-images'), $name); 
                
                $files = $name;
            // }
        }
       

        $kelas_online_models = Kelas_online_model::findOrFail($id);

        $kelas_online_models->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'text' => $request->text,
            'image' => $files,
            'status' => $request->status
        ]);

        if ($kelas_online_models) {
            return redirect()
                ->route('kelasonline.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
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
        //
    }
}
