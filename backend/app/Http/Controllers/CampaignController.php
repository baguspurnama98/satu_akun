<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CampaignCategories;

class CampaignController extends Controller
{

    
    /**
     * Get all categories.
     *
     * @return Response
     */
    public function allCampaigns() {
        return response()->json(['campaigns' => Campaign::with(['categories'])->withCount('campaign_members as total_members')->get()], 200);
    }

    public function campaign($id_campaign) {
        // aktifkan ini jika masa production
        $id_campaign = $this->decode($id_campaign);
        
        $campaign = Campaign::with(['campaign_members.users', 'categories'])->withCount('campaign_members as total_members')->findOrFail($id_campaign);
        return response()->json(['campaigns' => $campaign], 200);
    }



    /**
     * data ini akan berada di fill input
     * 'email_id',
     * 'categories_id',
     * 'title',
     * 'description',
     * 'expired_date',
     * 'duration_date',
     * 'durasi',
     * 'status',
     * 'slot_capacity',
     * 'slot_price',
     * 'media_url', (nullable)
     * 'password_email', (nullable)
     * 'updated_by', (nullable)
     * 'created_by', (nullable)
     */
        

    public function createCampaign(Request $request) {
        try {
            $campaign = new Campaign();
            $campaign->fill($request->all());
            $campaign->save();
            // return successful response
            return response()->json(['campaign' => $campaign, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function updateCampaign(Request $request, $id_campaign) {
        // aktifkan ini jika masa production
        $id_campaign = $this->decode($id_campaign);

        try {
            $campaign = Campaign::findOrFail($id_campaign);
            $campaign->fill($request->all());
            $campaign->touch();
            $campaign->save();
            // return successful response
            return response()->json(['campaign' => $campaign, 'message' => 'UPDATED'], 201);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function deleteCampaign($id_campaign) {
        // aktifkan ini jika masa production
        $id_campaign = $this->decode($id_campaign);
        // bakal ada pengerjaan untuk softdelete member_campaign
        // seharusnya gabisa langsung delete gitu aja
        $campaign = Campaign::findOrFail($id_campaign);
        $campaign->delete();
    }

    // ---------------------------------- Categories

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