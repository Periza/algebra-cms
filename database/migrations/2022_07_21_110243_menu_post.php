<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_post', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('menu_id')->nullable()->constrained('menus')->onDelete('set null');
            $table->foreignId('post_id')->nullable()->constrained('posts')->onDelete('set null');
            $table->string('name');
            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_post');
    }
};
