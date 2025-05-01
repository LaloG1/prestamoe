<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pagos', function (Blueprint $table) {
        $table->enum('tipo_pago', ['interes', 'abono', 'liquidar'])->after('monto');
    });
}

public function down()
{
    Schema::table('pagos', function (Blueprint $table) {
        $table->dropColumn('tipo_pago');
    });
}
};
