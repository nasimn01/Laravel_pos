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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->index()->foreign()->references('id')->on('suppliers')->onDelete('cascade');
            $table->date('purchase_date');
            $table->string('reference_no')->nullable();
            $table->string('total_quantity');
            $table->decimal('sub_amount',10,2)->default(0);
            $table->decimal('tax',10,2)->default(1)->comment('1 amount 2 percent')->nullable();
            $table->decimal('discount',10,2)->default(0);
            $table->decimal('total_amount',10,2)->default(0);
            $table->decimal('rount_of',10,2)->default(0);
            $table->string('grand_total');
            $table->string('note')->nullable();
            $table->unsignedBigInteger('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id')->index();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedBigInteger('warehouse_id')->index();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('payment_status')->comment('0 unpaid, 1 paid, 2 partial_paid')->default(0);
            $table->string('status')->comment('1 parches, 2 return, 3 partial return, 4 cancel')->default(1);
            $table->string('status_note')->nullable();
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
        Schema::dropIfExists('purchases');
    }
};
