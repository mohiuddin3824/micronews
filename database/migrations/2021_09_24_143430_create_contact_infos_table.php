<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->text('location')->nullable()->default('Farmview Super Market, 5th floor');
            $table->text('email')->nullable()->default('contact@gmail.com');
            $table->text('phone')->nullable()->default('01911-555084');
            $table->text('gmap')->nullable()->default('https://goo.gl/maps/Y8j2pRkSZ8DCeXYg8');
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
        Schema::dropIfExists('contact_infos');
    }
}
