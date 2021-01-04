<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('file_id')->index();
            $table->string('buyer_email');
            $table->decimal('sales_price',6,2);
            $table->decimal('sales_commission',6,2);
            $table->foreign('file_id')
                ->references('id')
                ->on('files')->onDelete('set null');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('set null');
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
        Schema::dropIfExists('sales');
    }
}
