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

            $table->string('form_no')->unique();
$table->date('date_issued')->nullable();

$table->string('requester_name');
$table->string('department');
$table->string('contact');
$table->date('request_date');

$table->string('event_title');
$table->string('event_type');
$table->date('proposed_date')->nullable();
$table->time('start_time')->nullable();
$table->time('end_time')->nullable();
$table->string('venue')->nullable();
$table->integer('participants')->nullable();

$table->json('target_audience')->nullable();

$table->text('purpose')->nullable();

$table->integer('tables_qty')->default(0);
$table->integer('chairs_qty')->default(0);
$table->integer('projector_qty')->default(0);
$table->integer('microphone_qty')->default(0);
$table->integer('speaker_qty')->default(0);
$table->integer('banner_qty')->default(0);

$table->decimal('total_cost',10,2)->default(0);

$table->json('logistics')->nullable();

$table->enum('status',['Pending','Approved','Rejected'])
      ->default('Pending');

$table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_requests');
    }
};
