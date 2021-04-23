<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDestinationIds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('destination_ids')->after('sub_category_id')->nullable();
            $table->dropColumn(['cost', "dates"]);
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->text('cost')->nullable();
            $table->text('dates')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['destination_ids']);
            $table->dropColumn(['cost', "dates"]);
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->string('cost')->nullable();
            $table->string('dates')->nullable();
        });
    }
}
