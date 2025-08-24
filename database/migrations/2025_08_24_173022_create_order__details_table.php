<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('order_details', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id');  // liên kết với orders
        $table->unsignedBigInteger('book_id');   // liên kết với books
        $table->integer('quantity');
        $table->decimal('price', 8, 2); 
        $table->timestamps();

        // Khóa ngoại
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order__details');
    }
};
