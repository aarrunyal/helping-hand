<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageIncludeExcludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_include_excludes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->unsigned()->nullable()->index();
            $table->string('title')->nullable();
            $table->enum('type', ['include', 'exclude'])->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('package_include_excludes');
    }
}
