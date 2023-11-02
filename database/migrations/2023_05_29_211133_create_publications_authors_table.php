<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications_authors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')->references('id')->on('publications')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('author_id')->references('id')->on('researchers');
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
        Schema::dropIfExists('publications_authors');
    }
}
