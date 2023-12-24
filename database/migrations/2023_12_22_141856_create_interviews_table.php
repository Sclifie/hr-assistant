<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('status');
            $table->unsignedBigInteger('employee_id')
                ->nullable();
            
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('SET NULL')
                ->onUpdate('RESTRICT');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('interviews');
        Schema::enableForeignKeyConstraints();
    }
};
