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
            $rating = new Rating;
            $rating->company_or_customer_id = Auth::id();
            $rating->transferista_id = null;
            $rating->project_id = $request->project_id;
            $rating->rating = $request->rating;
            $rating->rating_text = $request->rating_text;
            $rating->save();
        }elseif ($user->hasRole('driver')) {
            $rating = new Rating;
            $rating->transferista_id = Auth::id();
            $rating->company_or_customer_id = null;
            $rating->project_id = $request->project_id;
            $rating->rating = $request->rating;
            $rating->rating_text = $request->rating_text;
            $rating->save();
        }
    }
}
