<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            
            $table->unsignedBigInteger('email_id')->index();
            $table->foreign('email_id')->references('id')->on('emails');
            $table->unsignedBigInteger('categories_id')->index();
            $table->foreign('categories_id')->references('id')->on('campaign_categories');

            $table->dateTime('expired_date', $precision = 0);
            $table->dateTime('duration_date', $precision = 0);
            $table->string('durasi');
            $table->tinyInteger('status')->default(0);
            $table->integer('slot_capacity');
            $table->double('slot_price');
            $table->string('media_url')->nullable();
            $table->string('password_email');

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            
            $table->index(['title']);
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
        Schema::dropIfExists('campaigns');
    }
}
