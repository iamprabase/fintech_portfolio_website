<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_setup', function (Blueprint $table) {
            $table->id();
            $table->mediumText('hero_title')->nullable();
            $table->text('hero_sub_title')->nullable();
            $table->mediumText('hero_back')->nullable();
            $table->tinyInteger('back_hero_active')->nullable()->default(1);
            $table->mediumText('hero_front')->nullable();
            $table->tinyInteger('front_hero_active')->nullable()->default(1);
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
        Schema::dropIfExists('hero_setup');
    }
}
