<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_pricings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->unsigned()->nullable()->index();
            $table->string('period')->nullable();
            $table->string('unit')->nullable();
            $table->string('price')->nullable();
            $table->boolean('is_active')->default(1);
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('package_pricings');
    }
}
