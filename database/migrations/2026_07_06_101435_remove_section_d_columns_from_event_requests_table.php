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
    Schema::table('event_requests', function (Blueprint $table) {
        $table->dropColumn([
            'tables_qty',
            'chairs_qty',
            'projector_qty',
            'microphone_qty',
            'speaker_qty',
            'banner_qty',
        ]);
    });
}

public function down(): void
{
    Schema::table('event_requests', function (Blueprint $table) {
        $table->integer('tables_qty')->default(0);
        $table->integer('chairs_qty')->default(0);
        $table->integer('projector_qty')->default(0);
        $table->integer('microphone_qty')->default(0);
        $table->integer('speaker_qty')->default(0);
        $table->integer('banner_qty')->default(0);
    });
}
};
