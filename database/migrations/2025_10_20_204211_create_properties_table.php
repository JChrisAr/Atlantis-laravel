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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // agente que publica
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('type'); // venta o renta
            $table->string('category')->nullable(); // casa, terreno, depa...
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->float('size')->nullable(); // m2
            $table->boolean('status')->default(true); // activa o no
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
