<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('prestamos', function (Blueprint $table) {
        $table->decimal('monto_original', 10, 2)->after('monto');
    });
    
    // Actualizar los registros existentes
    DB::statement('UPDATE prestamos SET monto_original = monto');
}

public function down()
{
    Schema::table('prestamos', function (Blueprint $table) {
        $table->dropColumn('monto_original');
    });
}
};
