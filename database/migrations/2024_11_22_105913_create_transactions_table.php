<?php

use App\Models\Tour;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tour::class);
            $table->foreignIdFor(User::class);
            $table->integer('price');
            $table->string('tanggal_berkunjung');
            $table->integer('quantity');
            $table->enum('status', ['Menunggu Pembayaran', 'Transaksi Berhasil', 'Transaksi Gagal']);
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
        Schema::dropIfExists('transactions');
    }
}
