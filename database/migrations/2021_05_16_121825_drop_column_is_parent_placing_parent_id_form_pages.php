<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnIsParentPlacingParentIdFormPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['parent_id', 'placing', 'is_parent', 'name']);
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['name']);
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->bigInteger('parent_id')->nullable()->unsigned()->index();
            $table->enum('placing', ['header', 'footer'])->nullable();
            $table->boolean('is_parent')->default(0);
            $table->string('name')->after('id')->nullable();
        });
//
//
    }
}
