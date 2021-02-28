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
        'updated_by',
        'created_by',
    ];

    /**
     * relation
     */
    // public function campaign()
    // {
    //     return $this->belongsTo(Campaign::class);
    // }

}