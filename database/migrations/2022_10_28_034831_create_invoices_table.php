<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('inventaris_id')->nullable();
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->decimal('total_biaya',14,5);
            $table->string('status');
            $table->integer('quantity');
            $table->text('image')->nullable();
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onUpdate(DB::raw('NO ACTION'))
                ->onDelete(DB::raw('NO ACTION'));

            $table->foreign('inventaris_id')
                ->references('id')
                ->on('inventaris')
                ->onUpdate(DB::raw('NO ACTION'))
                ->onDelete(DB::raw('NO ACTION'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
