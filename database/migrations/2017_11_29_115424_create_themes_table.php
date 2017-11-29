<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('selected')->default(false);
            $table->string('background');
            $table->string('container_background');
            $table->string('posts_list_background');
            $table->string('menu_item_text');
            $table->string('menu_item_background');
            $table->string('menu_item_active_text');
            $table->string('menu_item_active_background');
            $table->string('categories_list_text');
            $table->string('categories_list_background');
            $table->string('tags_list_text');
            $table->string('tags_list_background');
            $table->string('title');
            $table->string('text');
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
        Schema::dropIfExists('themes');
    }
}
