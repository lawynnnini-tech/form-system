<?php

// database/migrations/2026_01_01_000000_create_event_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('event_requests', function (Blueprint $table) {
            $table->id();

            // Section A
            $table->string('requester_name');
            $table->string('department');
            $table->string('contact');
            $table->date('request_date');

            // Section B
            $table->string('event_title');
            $table->string('event_type');
            $table->date('proposed_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('venue')->nullable();
            $table->integer('participants')->nullable();
            $table->string('target_audience')->nullable();

            // Section C
            $table->text('purpose')->nullable();

            // Section D (Fixed Resources)
            $table->integer('tables_qty')->nullable();
            $table->integer('chairs_qty')->nullable();
            $table->integer('projector_qty')->nullable();
            $table->integer('microphone_qty')->nullable();
            $table->integer('speaker_qty')->nullable();
            $table->integer('banner_qty')->nullable();

            $table->decimal('total_cost', 10, 2)->nullable();

            // Section E
            $table->json('logistics')->nullable();

            // Section F
            $table->string('status')->default('pending');
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_requests');
    }
};
