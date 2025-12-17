<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KnowledgeBase;

class KnowledgeBaseAPIController extends Controller
{
    public function apiKnowledgeBase()
    {
        $knowledgeBase = KnowledgeBase::orderBy("id", "desc")->get();
        return response()->json(
            data: [
                'success' => true,
                'message' => 'Knowledge Base Retrieved Successfully',
                'data' => $knowledgeBase
            ], status: 200
        );
    }
}
