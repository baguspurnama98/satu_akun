<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CampaignCategories extends Model 
{
    protected $table = 'campaign_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categories',
    ];

    /**
     * relation
     */
    // public function campaign()
    // {
    //     return $this->belongsTo(Campaign::class);
    // }

}