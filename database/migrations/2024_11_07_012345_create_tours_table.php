<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::create('tours', function (Blueprint $table) {
                $table->id();
                $table->string('gambar')->default('view.jpg');
                $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
                $table->string('nama_wisata');
                $table->string('tempat_wisata');
                $table->string('deskripsi');
                $table->decimal('harga', 10, 2);
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
