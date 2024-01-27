<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCreateFromTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('surname', 255)->nullable();
            $table->date('birthday')->nullable();
            $table->string('country_city', 255)->nullable();
            $table->string('country_residence', 255)->nullable();            
            $table->string('address', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->text('social_media_account', 2048)->nullable();
            $table->string('educational', 255)->nullable();
            $table->string('failOf_studies', 255);
            $table->string('yearOfStudies', 255)->nullable();
            $table->string('expected_year_graduation', 255)->nullable();
            $table->string('will_you_still', 255)->nullable();
            $table->string('can_you_be_fully', 255)->nullable();
            $table->string('english_level', 255)->nullable();
            $table->string('level_of_italian', 255)->nullable();
            $table->string('other_languages', 255)->nullable();
            $table->string('about_you_eng', 100)->nullable();
            $table->string('Citizenship', 255)->nullable();
            $table->timestamps();
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
