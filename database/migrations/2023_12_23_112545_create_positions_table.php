<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            
            $table->string('name')
                ->fulltext()
                ->unique();
            
            $table->index(['name']);
            
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
