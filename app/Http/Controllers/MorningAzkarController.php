<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\MorningAzkar;
use Illuminate\Http\Request;

class MorningAzkarController extends Controller
{
    // get all morning azkar woth count
    public function index(){
        $morningAzkars=MorningAzkar::all();
        return ApiResponse::sendResponse(200,'Morning Azkar',$morningAzkars);
    }

    //Decrement count of specific azkar
    public function decrement(Request $request )
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $morningAzkar=MorningAzkar::find($request->id);
        if(!$morningAzkar){
            return ApiResponse::sendResponse(404,'Not Found',[]);
        }
        if($morningAzkar->count >0){
            $morningAzkar->count--;
            $morningAzkar->save();
        }
        return ApiResponse::sendResponse(200,'Decrement count',$morningAzkar);

    }


    // Method to reset the count for all azkars
    public function resetAllAzkarCounts()
    {
        $morningAzkars = MorningAzkar::all();
        // Iterate through each and reset the count to the original_count
        foreach ($morningAzkars as $azkar) {
            $azkar->count = $azkar->original_count;
            $azkar->save(); // Save the updated azkar
        }
        return ApiResponse::sendResponse(200, 'All azkar counts have been reset to original values.', $morningAzkars);
    }

    // Toggle the like for a specific Morning Azkar
    public function toggleLike(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',]);
        $morningAzkar = MorningAzkar::find($request->id);
        if (!$morningAzkar) {
            return ApiResponse::sendResponse(404, 'Azkar not found', []);
        }
        $morningAzkar->like = $morningAzkar->like == 0 ? 1 : 0;
        $morningAzkar->save();
        return ApiResponse::sendResponse(200, 'Like status toggled', $morningAzkar);
    }

    // Get all Azkar have like
    public function getLikedAzkar(){
        $likedAzkars = MorningAzkar::where('like', 1)->get();
        if ($likedAzkars->isEmpty()) {
            return ApiResponse::sendResponse(404, 'No liked Azkars found', []);
        }
        return ApiResponse::sendResponse(200, 'Liked Azkars', $likedAzkars);
    }

}
