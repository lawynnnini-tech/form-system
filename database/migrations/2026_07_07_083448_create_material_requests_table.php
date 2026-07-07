<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    

   public function up()
{
    Schema::create('material_requests', function (Blueprint $table) {
        $table->id();
        $table->string('form_no')->nullable();
        $table->date('date_issued')->nullable();
        $table->string('requester_name')->nullable();
        $table->json('department')->nullable();
        $table->string('department_other')->nullable();
        $table->string('employee_id')->nullable();
        $table->string('contact')->nullable();
        $table->date('request_date')->nullable();
        $table->date('need_date')->nullable();
        $table->json('items')->nullable(); 
        $table->json('purpose')->nullable();
        $table->json('signatures')->nullable();
        $table->date('date_released')->nullable();
        $table->string('status')->nullable();
        $table->string('admin')->nullable();
        $table->timestamps();
    });
}

    
    public function down(): void
    {
        Schema::dropIfExists('material_requests');
    }
};
