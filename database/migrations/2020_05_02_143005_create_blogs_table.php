<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->enum('type', ['news', 'blog'])->nullable();
            $table->string('tags')->nullable();
            $table->longText('content')->nullable();
            $table->string('seo_title')->index()->nullable();
            $table->string('seo_key_words')->index()->nullable();
            $table->text('seo_description')->nullable();
            $table->string('social_share_image')->index()->nullable();
            $table->text('social_share_description')->nullable();
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->integer('views')->index()->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('blogs');
    }
}
