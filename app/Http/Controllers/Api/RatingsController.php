<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rating;
use App\User;
use Auth;

class RatingsController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        
        if ($user->hasRole(['company', 'customer', 'employee'])) {
            $rating = Rating::where('project_id', $request->project_id)->where('rating_from', Auth::id())->first();
            $rating_to = Project::where('id', $request->project_id)->first()->transferista_id;
            if($rating == null){
                $rating = new Rating;
                $rating->rating_from = Auth::id();
                $rating->rating_to = $rating_to;
                $rating->project_id = $request->project_id;
                $rating->rating = $request->rating;
                $rating->rating_text = $request->rating_text;
                $rating->save();
                return response()->json([
                    'message' => 'Rating Submitted',
                    'status' => 1
                ]);
            }else{
                return response()->json([
                    'message' => 'Already Done',
                    'status' => 0
                ]);
            }
            
        }elseif ($user->hasRole('driver')) {
            $rating = Rating::where('project_id', $request->project_id)->where('rating_from', Auth::id())->first();
            $rating_to = Project::where('id', $request->project_id)->first()->project_owner_id;
            if($rating == null){
                $rating = new Rating;
                $rating->rating_from = Auth::id();
                $rating->rating_to = $rating_to;
                $rating->project_id = $request->project_id;
                $rating->rating = $request->rating;
                $rating->rating_text = $request->rating_text;
                $rating->save();
                return response()->json([
                    'message' => 'Rating Submitted',
                    'status' => 1
                ]);
            }else{
                return response()->json([
                    'message' => 'Already Done',
                    'status' => 0
                ]);
            }
        }
    }
}
