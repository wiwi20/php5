<?php

namespace App\Http\Controllers;

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
        $newsItems = NewsItem::all();
        return view('news-items.index',[
            'newItems' => $newsItems
        ]);
    }
    /**
     * Display a listing of the resourse
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Request|\Illuminate\View\View
     *
     */
    public function create(){
        //dit is het create pagina
        return view('news-items/create');
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
        ]);

        $newsItem = new NewsItem();
        $newsItem->title = $request->get('title');
        $newsItem->description = $request->get('description');
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
        try{
            $newsItem = NewsItem::find($id);
            $error = null;
        } catch(\Exception $e){
            $newsItem = null;
            $error = $e->getMessage();
        }

        return view('news-items.show', [
            'newsItem' => $newsItem,
            'error' =>$error
        ]);
    }
}
