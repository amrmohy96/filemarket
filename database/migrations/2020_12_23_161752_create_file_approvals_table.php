<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id')->index();
            $table->string('title');
            $table->string('overview_short', 300);
            $table->text('overview');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_approvals');
    }
}
