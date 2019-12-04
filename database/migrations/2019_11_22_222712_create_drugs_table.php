<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_english');
            $table->string('name_arabic')->nullable();
            $table->string('chemical_composition');
            $table->string('shape');
            $table->string('manufacturer')->nullable();
            $table->string('volume_unit')->nullable();
            $table->integer('net_price');
            $table->integer('sell_price');
            $table->integer('lic_palte')->nullable();
            $table->string('local_barcode');
            $table->string('global_barcode');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('drug_categories')->onUpdate('cascade');
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
        Schema::dropIfExists('drugs');
    }
}
