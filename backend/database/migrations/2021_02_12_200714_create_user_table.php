<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->notNullable()->index();
            $table->string('password');
            $table->string('whatsapp')->nullable()->default(null);
            $table->text('otp')->nullable()->default(null);
            $table->tinyInteger('status')->default(0);
            $table->string('role', 5)->default('u'); // u for user, a for admin
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->index(['email']);
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
        Schema::dropIfExists('users');
    }
}
