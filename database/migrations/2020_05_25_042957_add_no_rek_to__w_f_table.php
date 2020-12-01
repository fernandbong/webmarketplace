<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoRekToWFTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdraw_funds', function (Blueprint $table) {
            $table->string('no_rek')->after('atas_nama');
            $table->boolean('is_done')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdraw_funds', function (Blueprint $table) {
            $table->dropColumn('no_rek');
            $table->dropColumn('is_done');
        });
    }
}
