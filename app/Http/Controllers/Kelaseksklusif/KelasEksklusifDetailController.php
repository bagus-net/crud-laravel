<?php

namespace App\Http\Controllers\KelasEksklusif;

use App\Models\Kelas_online_model;
use App\Models\Kelas_online_category_model;
use App\Models\Kelas_online_detail_model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class KelasEksklusifDetailController extends Controller
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

        $kelasonlinedetail =  DB::select("SELECT n.id, n.title, c.title as topics, n.created_at from kelas_online_detail as n inner join kelas_online as c on n.id_kelas_online = c.id");

        return view('kelasonline/list-kelasonlinedetail', compact('kelasonlinedetail'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas_online_models = Kelas_online_model::latest()->get();
        return view('kelasonline/add-kelasonlinedetail',compact('kelas_online_models'));
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

        $kelas_online_detail_models = Kelas_online_detail_model::create([
            'id_kelas_online' =>$request->category_id,
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'text' => $request->text,
            'image' => $files
        ]);

        if ($kelas_online_detail_models) {
            return redirect()
                ->route('kelasonlinedetail.index')
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
        $blog_article_category_models = Blog_article_category_model::find($id);
        return view('blog-article-categorys.show', compact('blog_article_category_models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reskelasonlinedetail =  DB::select("SELECT n.id, n.title,n.text,n.short_desc, c.title as topics, n.created_at from kelas_online_detail as n inner join kelas_online as c on n.id_kelas_online = c.id where n.id=".$id);
        $kelasonlinedetail = $reskelasonlinedetail[0];
        //dd($kelasonlinedetail);
        //$product_models = Blog_article_category_model::findOrFail($id);
        return view('kelasonline.edit-kelasonlinedetail', compact('kelasonlinedetail'));
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
       

        $news_models = Kelas_online_detail_model::findOrFail($id);

        $news_models->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'text' => $request->text,
            'image' => $files
        ]);

        if ($news_models) {
            return redirect()
                ->route('kelasonlinedetail.index')
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
