<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->nullable()->unsigned()->index();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('seo_title')->index()->nullable();
            $table->string('seo_key_words')->index()->nullable();
            $table->text('seo_description')->nullable();
            $table->string('social_share_image')->index()->nullable();
            $table->integer('position')->nullable();
            $table->longText('description')->nullable();
            $table->enum('placing', ['header', 'footer'])->nullable();
            $table->boolean('is_parent')->default(0);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('pages');
    }
}
