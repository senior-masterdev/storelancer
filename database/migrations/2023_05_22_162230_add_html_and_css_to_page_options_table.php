<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_options', function (Blueprint $table) {
            $table->longText('html')->after('contents');
            $table->longText('css')->after('html');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_options', function (Blueprint $table) {
            $table->dropColumn(['html', 'css']);
        });
    }
};
