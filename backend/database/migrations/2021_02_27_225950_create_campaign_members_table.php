<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('campaign_id')->index();
            $table->foreign('campaign_id')->references('id')->on('campaigns');  
            $table->unsignedBigInteger('categories_id')->index();
            $table->foreign('categories_id')->references('id')->on('campaign_categories');
            
            // tambahkan atribut kolom lain disini
            $table->boolean('is_host')->default(0);
            $table->boolean('is_pay')->default(0);

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->index(['user_id', 'campaign_id', 'categories_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_members');
    }
}
