<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wainwright_operator_access', function (Blueprint $table) {
            $table->id('id')->index();
            $table->string('operator_key', 100);
            $table->string('operator_secret', 100);
            $table->string('operator_access', 100);
            $table->string('callback_url', 100);
            $table->boolean('active');
            $table->unsignedBigInteger('ownedBy');
            $table->foreign('ownedBy')->references('id')->on('users');
            $table->date('last_used_at');
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
        Schema::dropIfExists('wainwright_operator_access');
    }
};