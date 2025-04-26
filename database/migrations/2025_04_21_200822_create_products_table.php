<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->after('name'); // ajoute "slug" après "name"
            $table->text('description')->nullable()->after('slug'); // ajoute "description" après "slug"
            $table->unsignedBigInteger('category_id'); // foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // foreign key constraint
            $table->decimal('price', 8, 2); // prix avec 2 décimales
            $table->integer('stock'); // quantité en stock
            $table->string('skin_type')->nullable(); // type de peau (optionnel)
            $table->boolean('bestseller')->default(false); // produit best-seller
            $table->boolean('popular')->default(false); // produit populaire
            $table->string('image')->nullable(); // chemin de l'image (optionnel)
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
