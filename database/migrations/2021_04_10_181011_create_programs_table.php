<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable()->index();
            $table->bigInteger('sub_category_id')->unsigned()->nullable()->index();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('cost')->nullable();
            $table->string('dates')->nullable();
            $table->boolean('group_discount_available')->default(0);
            $table->text('group_discount_description')->nullable();
            $table->boolean('has_sample_itinerary')->default(1);
            $table->text('sample_itinerary_description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('sub_category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('programs');
    }
}
