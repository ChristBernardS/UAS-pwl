<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KnowledgeBase;

class VisitorController extends Controller
{
    public function searchdata()
    {
        return view('searchdata');    
    }

    public function actsearchdata(Request $request)
    {
        $search = $request->input('search');
        $data = KnowledgeBase::where('question', 'like', '%' . $search . '%')
        ->orWhere('answer', 'like', '%' . $search . '%')
        ->get();
        return view('/actsearchdata', ['search' => $data]);
    }
}
