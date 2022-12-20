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
        Schema::create('invoices_products', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')
                ->foreign('invoice_id')
                ->references('id')
                ->on('invoices')->onDelete('cascade');
            $table->string('product_id')
                ->foreign('product_id')
                ->references('id')
                ->on('products')->onDelete('cascade');
            $table->integer('qnty')->nullable();
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
        Schema::dropIfExists('invoices_products');
    }
};
