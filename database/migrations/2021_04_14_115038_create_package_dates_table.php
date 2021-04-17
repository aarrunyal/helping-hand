<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_dates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('program_id')->unsigned()->nullable()->index();
            $table->dateTime('start_form')->nullable();
            $table->dateTime('end_to')->nullable();
            $table->boolean('is_active')->default(1);
            $table->foreign('program_id')->references('id')->on('programs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('package_dates');
    }
}
