<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsta10kFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insta_10k_follow', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('total')->nullable()->default('10000');
            $table->string('added')->nullable();
            $table->string('added_from')->default('admin')->comment('admin or api');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insta_10k_follow');
    }
}
