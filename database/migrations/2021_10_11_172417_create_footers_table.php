<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('footer_logo')->nullable();
            $table->longText('footer_disclaimer')->nullable();
            $table->string('footer_menu_link1')->nullable();
            $table->string('footer_menu_link2')->nullable();
            $table->string('footer_menu_link3')->nullable();
            $table->string('footer_menu_link4')->nullable();
            $table->string('footer_menu_link5')->nullable();
            $table->string('footer_menu_link6')->nullable();
            $table->string('footer_menu_link7')->nullable();
            $table->string('footer_menu_link8')->nullable();
            $table->string('footer_menu_link9')->nullable();
            $table->string('footer_font')->nullable();
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
        Schema::dropIfExists('footers');
    }
}
