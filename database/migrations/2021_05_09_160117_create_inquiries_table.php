<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("destination_id")->nullable()->unsigned()->index();
            $table->bigInteger("program_id")->nullable()->unsigned()->index();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("phone_no")->nullable();
            $table->string("email")->nullable();
            $table->string("address")->nullable();
            $table->string("planed_for")->nullable();
            $table->text("description")->nullable();
            $table->boolean("is_read")->default(0);
            $table->boolean("message_permitted")->default(0);
            $table->boolean("is_email_forwarded")->default(0);
            $table->boolean("is_served")->default(0);
            $table->foreign("destination_id")->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("program_id")->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('inquiries');
    }
}
