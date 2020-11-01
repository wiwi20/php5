<?php

namespace App\Http\Controllers;

use App\NewsItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    public function index(){
        $newsItems = NewsItem::orderBy('created_at', 'asc')->get();
        return view('admin.index', compact('newsItems'));
    }

    public function destroy($id)
    {
        $newsItems = NewsItem::find($id);
        $newsItems->delete();

        return redirect('/admin')->with('success', 'nieuwsbericht is verwijderd');
    }

    public function changeStatus($id)
    {
        $newsItems = NewsItem::find($id);

        $newsItems->status=!$newsItems->status;

        if($newsItems->save()){
            return redirect('/admin')->with('success', 'nieuwsbericht is veranderd');
        }
        else{
            return redirect('/admin')->with('error', 'nieuwsbericht is niet veranderd');
        }
    }
}
