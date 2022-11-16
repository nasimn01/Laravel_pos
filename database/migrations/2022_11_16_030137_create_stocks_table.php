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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id')->index()->nullable()->foreign()->references('id')->on('purchases')->onDelete('cascade');
            $table->unsignedBigInteger('sales_id')->index()->nullable()->foreign()->references('id')->on('sales')->onDelete('cascade');
            $table->unsignedBigInteger('transfer_id')->index()->nullable()->foreign()->references('id')->on('transfers')->onDelete('cascade');
            $table->unsignedBigInteger('company_id')->index()->nullable()->foreign()->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id')->index()->nullable()->foreign()->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedBigInteger('warehouse_id')->index()->nullable()->foreign()->references('id')->on('warehouses')->onDelete('cascade');
            $table->decimal('quantity',10,2)->default(0);
            $table->decimal('unit_price',10,2)->default(0);
            $table->decimal('tax',10,2)->default(0);
            $table->decimal('discount',10,2)->default(0);
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
        Schema::dropIfExists('stocks');
    }
};
