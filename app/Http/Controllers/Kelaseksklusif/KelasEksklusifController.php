<?php

namespace App\Http\Controllers\Kelaseksklusif;

use App\Models\Kelas_online_model;
use App\Models\Kelas_online_category_model;
use App\Models\Kelas_online_detail_model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class KelasEksklusifController extends Controller
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

        return view('kelasonline/list-kelasonline', compact('kelasonline'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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

        $news_models = News_model::create([
            'category_id' =>$request->category_id,
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'text' => $request->text,
            'image' => $files
        ]);

        if ($news_models) {
            return redirect()
                ->route('news.index')
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
        $resnews =  DB::select("SELECT n.id, n.title, c.name, n.created_at, n.short_desc, n.text from news as n inner join news_category as c on n.category_id = c.id where n.id=".$id);
        $news = $resnews[0];
        //dd($news);
        //$product_models = Blog_article_category_model::findOrFail($id);
        return view('news.edit-news', compact('news'));
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
       

        $news_models = News_model::findOrFail($id);

        $news_models->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'text' => $request->text,
            'image' => $files
        ]);

        if ($news_models) {
            return redirect()
                ->route('news.index')
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
