<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterContactRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("contact_requests", function(Blueprint $table){
           
            $table->string('surname', 255)->nullable();
            $table->date('birthday')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('tel_num', 255)->nullable();
            $table->text('social_media_account', 2047)->nullable();
            $table->string('educational', 255)->nullable();
            $table->string('failOf_studies', 255);
            $table->string('yearOfStudies', 255)->nullable();
            $table->string('expected_year_graduation', 255)->nullable();
            $table->string('will_you_still', 255)->nullable();
            $table->string('can_you_be_fully', 255)->nullable();
            $table->string('english_level', 255)->nullable();
            $table->string('other_languages', 255)->nullable();
            $table->text('about_you_eng', 100)->nullable();
            $table->string('Citizenship', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
