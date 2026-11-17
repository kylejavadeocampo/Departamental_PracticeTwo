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
        Schema::create('equipments', function (Blueprint $table) {
            $table -> id();

            $table -> string('EquipmentName', 50);
            $table -> enum('Category', ['paddles', 'balls', 'nets', 'accessories']);
            $table -> decimal('UnitPrice', 8, 2);
            $table -> text('Description', 255);
            $table -> boolean('Availability');

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};
