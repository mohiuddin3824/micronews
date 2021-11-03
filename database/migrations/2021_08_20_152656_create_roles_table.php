<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->integer('post')->nullable()->default(1);
            $table->integer('category')->nullable()->default(1);
            $table->integer('division')->nullable()->default(1);
            $table->integer('district')->nullable()->default(1);
            $table->integer('menu')->nullable()->default(1);
            $table->integer('photo_gallery')->nullable()->default(1);
            $table->integer('video')->nullable()->default(1);
            $table->integer('seo')->nullable()->default(1);
            $table->integer('general_setting')->nullable()->default(1);
            $table->integer('header')->nullable()->default(1);
            $table->integer('footer')->nullable()->default(1);
            $table->integer('ads')->nullable()->default(1);
            $table->integer('status')->nullable()->default(1);
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
        Schema::dropIfExists('roles');
    }
}
