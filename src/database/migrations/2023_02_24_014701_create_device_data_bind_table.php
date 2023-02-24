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
        Schema::create('device_data_binds', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'binder_name', length: 50)->unique();
            $table->uuid(column: 'device_uuid')->index();
            $table->string(column: 'device_prop', length: 50);
            $table->uuid(column: 'subscriber_uuid')->index();
            $table->smallInteger(column: 'char_placeholder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_data_binds');
    }
};
