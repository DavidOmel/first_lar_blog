<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title', 255)->unique();
            $table->text('short_text');
            $table->text('full_text');
            $table->string('author', 200);
            $table->integer('category_id')->unsigned();
            $table->string('category_name');
            $table->string('img');
            $table->text('views_ip_id')->nullable();
            $table->integer('views')->nullable()->unsigned();
            $table->integer('created');
            $table->integer('updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
