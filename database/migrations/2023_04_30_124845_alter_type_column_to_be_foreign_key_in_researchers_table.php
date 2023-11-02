<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTypeColumnToBeForeignKeyInResearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('researchers', function (Blueprint $table) {
            $table->dropColumn('type');

            $table->foreignId('type_id')->after('photo')->references('id')->on('researchers_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('researchers', function (Blueprint $table) {
            $table->dropForeign('type_id');

            $table->string('type')->after('photo');
        });
    }
}
