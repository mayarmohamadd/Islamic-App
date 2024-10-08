<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\EveningAzkar;
use Illuminate\Http\Request;

class EveningAzkarController extends Controller
{
    //Get All Evening Azkar
    public function index(){
        $evening_azkars=EveningAzkar::all();
        return ApiResponse::sendResponse(200,'All Evening Azkar',$evening_azkars);
    }

    //Decrement count of specific azkar
    public function decrement(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
        $evening_azkars=EveningAzkar::find($request->id);
        if(!$evening_azkars){
            return ApiResponse::sendResponse(404,'Not Found',[]);
        }
        if ($evening_azkars->count > 0) {
            $evening_azkars->count--;
            $evening_azkars->save();
        }
        return ApiResponse::sendResponse(200,'Decrement count of Evening Azkar',$evening_azkars);

    }

     // Method to reset the count for all azkars
    public function resetAllAzkarCounts(){
        $evening_azkars = EveningAzkar::all();
        foreach ($evening_azkars as $azkar) {
            $azkar->count = $azkar->original_count;
            $azkar->save();
        }
        return ApiResponse::sendResponse(200, 'All azkar counts have been reset to original values.', $evening_azkars);
    }

    // Get all Azkar have like
    public function getLikedAzkar(){
        $likedAzkars = EveningAzkar::where('like', 1)->get();
        if ($likedAzkars->isEmpty()) {
            return ApiResponse::sendResponse(404, 'No liked Azkars found', []);
        }
        return ApiResponse::sendResponse(200, 'Liked Azkars', $likedAzkars);
    }

    // Toggle the like for a specific Morning Azkar
    public function toggleLike(Request $request){
        $request->validate([
            'id' => 'required|integer',]);
        $evening_azkars = EveningAzkar::find($request->id);
        if (!$evening_azkars) {
            return ApiResponse::sendResponse(404, 'Azkar not found', []);
        }
        $evening_azkars->like = $evening_azkars->like == 0 ? 1 : 0;
        $evening_azkars->save();
        return ApiResponse::sendResponse(200, 'Like status toggled', $evening_azkars);
    }

}
