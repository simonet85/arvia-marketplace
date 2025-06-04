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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('shipping_address')->nullable(); // Optional shipping address

            $table->enum('status', ['En attente', 'Effectuée', 'Annulée'])->default('En attente'); // e.g., Pending, Completed, Cancelled
            $table->enum('priority', ['Basse', 'Moyenne', 'Haute']); // e.g., Low, Medium, High
            $table->string('payment_method')->nullable(); // e.g., Credit Card, PayPal, cash on delivery
            $table->enum('payment_status', ['Payé', 'Non payé', 'Remboursé'])->default('Non payé'); // e.g., Paid, Unpaid, Refunded
            $table->string('order_number')->unique(); // Unique order number
            $table->string('order_notes')->nullable(); // Optional notes from the customer
            $table->string('coupon_code')->nullable(); // Optional coupon code used for the order
            $table->decimal('discount_amount', 10, 2)->default(0); // Discount amount applied to the order
            $table->decimal('total_amount', 10, 2);
            $table->decimal('tax_amount', 10, 2)->default(0); // Tax amount applied to the order
            $table->decimal('shipping_cost', 10, 2)->nullable(); // Cost of shipping

            $table->enum('refund_status', ['Non remboursé', 'Remboursé'])->default('Non remboursé'); // e.g., Not Refunded, Refunded
           $table->decimal('refund_amount', 10, 2)->nullable(); // Amount refunded if applicable
            $table->string('refund_reason')->nullable(); // Reason for 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
