<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_uper_title')->nullable();
            $table->string('post_title');
            $table->string('post_sub_title')->nullable();
            $table->longText('post_details');
            $table->string('post_tags')->nullable();
            $table->text('post_slug')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_descp')->nullable();
            $table->integer('lead')->nullable();
            $table->integer('lead2')->nullable();
            $table->integer('featured')->nullable();
            $table->string('repoter_name')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('category_id');
            $table->string('post_thumbnail')->nullable();
            $table->string('thumbnail_caption')->nullable();
            $table->string('thumbnail_alt')->nullable();
            $table->integer('view_count')->nullable()->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes(); 
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
        Schema::dropIfExists('posts');
    }
}
