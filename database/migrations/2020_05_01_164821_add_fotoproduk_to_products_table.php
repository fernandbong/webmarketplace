<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoprodukToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('harga')->change();
            $table->string('cover_img')->change();
            $table->string('fotoproduk1')->after('cover_img');
            $table->string('fotoproduk2')->after('fotoproduk1');
            $table->string('fotoproduk3')->after('fotoproduk2');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('fotoproduk1');
            $table->dropColumn('fotoproduk2');
            $table->dropColumn('fotoproduk3');
        });
    }
}
