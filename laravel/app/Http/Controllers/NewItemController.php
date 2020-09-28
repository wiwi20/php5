<?php

namespace App\Http\Controllers;

use App\Category;
use App\NewsItem;
use Illuminate\Http\Request;

class NewItemController extends Controller
{
    /**
     * Display a listing of the resourse
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Request|\Illuminate\View\View
     *
     */
    Public function index(){
        $newsItems = NewsItem::orderBy('created_at', 'desc')->get();
        return view('news-items.index', compact('newsItems'));
    }
    /**
     * Display a listing of the resourse
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Request|\Illuminate\View\View
     *
     */
    public function create(){
        //dit is het create pagina
        $categories = Category::all();
        return view('news-items.create', compact('categories'));
    }
    /**
     * store a newly created resource in starage
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Request|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' =>'required',
            'category' =>'exists:categories,id',
        ]);

        $newsItem = new NewsItem();
        $newsItem->title = $request->get('title');
        $newsItem->description = $request->get('description');
        $newsItem->category_id = $request->get('category');
        $newsItem->image = $request->get('image');

        $newsItem->save();
        return redirect('news')->with('succes', 'bericht is opgeslagen');
    }
    /**
     * Display a listing of the resourse
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Request|\Illuminate\View\View
     */
    // voor de post
    public function show($id){

        $newsItem = NewsItem::find($id);
        if($newsItem === null){
            abort(404, "Dit niewsitem is helaas niet gevonden");
        }

        return view('news-items.show', compact('newsItem'));
    }
    /**
     *
     * show the form for editing the specified resource
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
}
