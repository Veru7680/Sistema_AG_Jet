<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('pacientes', function (Blueprint $table) {
        $table->dropColumn(['created_at', 'updated_at']); // Elimina columnas actuales
        $table->timestamps(); // Crea columnas correctamente
    });
}

public function down(): void
{
    Schema::table('pacientes', function (Blueprint $table) {
        $table->dropTimestamps();
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
    });
}

};
