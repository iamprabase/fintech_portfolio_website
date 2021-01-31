<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->mediumText('site_icon')->nullable();
            $table->string('site_title')->default("Fintech");
            $table->text('site_sub_title')->nullable();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->mediumText('meta_keywords')->nullable();
            $table->mediumText('site_logo')->nullable();
            $table->mediumText('site_logo-2')->nullable();
            $table->longText('app_store_link')->nullable()->default("#");
            $table->longText('play_store_link')->nullable()->default("#");
            $table->longText('fb_link')->nullable()->default("#");
            $table->longText('insta_link')->nullable()->default("#");
            $table->longText('linked_link')->nullable()->default("#");
            $table->longText('twitter_link')->nullable()->default("#");
            $table->string('location')->default("Narayanchaur, Naxal, Kathmandu Metropolitan City-1");
            $table->string('email')->default("info@fintechinternational.com.np");
            $table->string('phone')->default("+ (321) 984 754");
            $table->string('fax')->default("+1-212-9876543");
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
        Schema::dropIfExists('settings');
    }
}
