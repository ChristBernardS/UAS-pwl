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

    public function liveSearch(Request $request)
    {
        $query = $request->get('query');
        
        if (!$query) {
            return response()->json(['status' => 'none']);
        }

        // 1. Standard Search
        $results = KnowledgeBase::where('question', 'like', '%' . $query . '%')
            ->select('id', 'question') // Only select necessary fields
            ->limit(5)
            ->get();

        if ($results->count() > 0) {
            return response()->json(['status' => 'found', 'data' => $results]);
        }

        // 2. "Did You Mean?" Logic (Levenshtein Distance)
        // Only run this if standard search fails
        $allQuestions = KnowledgeBase::pluck('question')->toArray();
        $shortest = -1;
        $closest = null;

        foreach ($allQuestions as $question) {
            // Calculate distance between input and database question
            $lev = levenshtein(strtolower($query), strtolower($question));

            // If match is exact, loop continues (should have been caught above, but safety check)
            if ($lev == 0) { 
                $closest = $question; 
                $shortest = 0; 
                break; 
            }

            // Logic: Tolerance is higher for longer words.
            // e.g., "Pass" (4 chars) -> tolerance 1-2. "Authentication" (14 chars) -> tolerance 4-5.
            $tolerance = strlen($query) > 4 ? 4 : 2;

            if ($lev <= $tolerance) { 
                if ($lev < $shortest || $shortest < 0) {
                    $closest = $question;
                    $shortest = $lev;
                }
            }
        }

        if ($closest) {
            return response()->json(['status' => 'suggestion', 'data' => $closest]);
        }

        return response()->json(['status' => 'none']);
    }
}
