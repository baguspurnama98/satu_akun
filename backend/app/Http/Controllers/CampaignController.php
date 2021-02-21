<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CampaignCategories;

class CampaignController extends Controller
{
    /**
     * Get all categories.
     *
     * @return Response
     */
    public function allCategories() {
        return response()->json(['categories' => CampaignCategories::all()], 200);
    }

    /**
     * Create categories.
     *
     * @param  Request  $request
     * @return Response post
     */
    public function storeCategories(Request $request) {
        // 
        try {
            $categories = new CampaignCategories();
            $categories->categories = $request->input('categories');
            $categories->save();
            // return successful response
            return response()->json(['categories' => $categories, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
        }
    }


}