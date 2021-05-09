<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("destination_id")->nullable()->unsigned()->index();
            $table->bigInteger("program_id")->nullable()->unsigned()->index();
            $table->bigInteger("package_id")->nullable()->unsigned()->index();
            $table->bigInteger("date_id")->nullable()->unsigned()->index();
            $table->bigInteger("pricing_id")->nullable()->unsigned()->index();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("phone_no")->nullable();
            $table->string("email")->nullable();
            $table->string("address")->nullable();
            $table->dateTime("date_of_birth")->nullable();
            $table->string("gender")->nullable();
            $table->string("nationality")->nullable();
            $table->text("emergency_contact_details")->nullable();
            $table->text("academic_qualification")->nullable();
            $table->text("health_condition")->nullable();
            $table->text("other_applicant_details")->nullable();
            $table->text("applicant_questions")->nullable();
            $table->text("academic_group_details")->nullable();
            $table->boolean("is_read")->default(0);
            $table->boolean("is_email_forwarded")->default(0);
            $table->boolean("is_served")->default(0);
            $table->foreign("destination_id")->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("program_id")->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("package_id")->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("date_id")->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("pricing_id")->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
}
