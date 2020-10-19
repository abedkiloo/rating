<?php

namespace App\Http\Controllers;

use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RatingController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_rated_id' => 'required|exists:users,id',
            'rating_score' => 'required|numeric|min:0|max:10'
        ]);

        if ($validator->fails()) {
            return response(['message' => 'Validation errors', 'errors' => $validator->errors(), 'status' => false], 422);
        }
        $input['user_id'] = Auth::user()->id;

        $new_rating = UserRating::create($input);
        $response = ['response' => "successfully added user rating",'data'=>null,'status' => true];
        return response()->json($response, 200);

    }

    public function rating()
    {
        $rating = UserRating::with(['rated_user'])->get();
        $response=['data'=>$rating,'message'=>"successfully retrieved users rating",'status' => true];
        return response()->json($response, 200);
    }

    public function user_rating(Request $request, $id)
    {
        $rating = UserRating::with(['rated_user'])->where('user_id', $id)->get();
        $response=['data'=>$rating,'message'=>"successfully retrieved user rating",'status' => true];
        return response()->json($response, 200);
    }
}
