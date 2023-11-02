<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dissemination_id')->default(null)->nullable()
                    ->references('id')->on('disseminations')->onDelete('cascade');
            $table->foreignId('news_id')->default(null)->nullable()->references('id')->on('news')->onDelete('cascade');;
            $table->foreignId('gallery_id')->default(null)->nullable()->references('id')->on('gallery')->onDelete('cascade');;
            $table->string('photo');

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
        Schema::dropIfExists('gallery_photos');
    }
}
