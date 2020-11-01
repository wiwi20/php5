<?php

namespace App\Http\Controllers;

use App\Category;
use App\NewsItem;
use App\models\User;
use Illuminate\Http\Request;
use Auth;

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
        $categories = Category::all();
        return view('news-items.index', compact('newsItems','categories'));
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
            'status' =>'required',
        ]);

        $newsItem = new NewsItem();
        $newsItem->title = $request->get('title');
        $newsItem->description = $request->get('description');
        $newsItem->category_id = $request->get('category');
        $newsItem->image = $request->get('image');
        $newsItem->status = $request->get('status');

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

        if (Auth::check()){
            $user = Auth::user();
            $user->validatie++;
            $user->save();
            return view('news-items.show', compact('newsItem', 'user'));
        }

        if($newsItem === null){
            abort(404, "Dit niewsitem is helaas niet gevonden");
        }

        return view('news-items.show', compact('newsItem'));
    }

    public function search(){
        $search_text = $_GET['query'];
        $newsItems = NewsItem::where('title','LIKE','%'.$search_text.'%')->orWhere('description','LIKE','%'.$search_text.'%')->get();

        return view('news-items.search', compact('newsItems'));
    }

    public function filter($id){
        $category_item = NewsItem::where('category_id', $id)->get();
        $id_= $id;
        return view('news-items.category', compact('category_item', 'id_' ));
    }
}
