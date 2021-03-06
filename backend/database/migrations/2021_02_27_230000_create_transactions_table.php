<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('campaign_id')->index();
            $table->foreign('campaign_id')->references('id')->on('campaigns');  

            // tambahkan atribut/kolom lain disini
            $table->string('bank');
            $table->string('no_transaction')->nullable();
            $table->string('type', 5); // 'in' / 'out'
            $table->double('nominal');
            $table->double('unique_code');
            $table->double('total_nominal');
            $table->string('no_rek_origin')->nullable();
            $table->string('no_rek_destination')->nullable();
            $table->boolean('status')->default(0);

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
