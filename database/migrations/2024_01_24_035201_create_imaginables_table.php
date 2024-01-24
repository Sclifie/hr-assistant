<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('imaginables', function (Blueprint $table) {
            $table->id('image_id');
            
            $table->integer('imaginable_id');
            $table->string('imaginable_type');
            
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('imaginables');
    }
};
