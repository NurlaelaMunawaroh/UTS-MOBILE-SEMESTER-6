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
    Schema::table('deadlines', function (Blueprint $table) {
        if (!Schema::hasColumn('deadlines', 'notif_h1')) {
            $table->boolean('notif_h1')->default(false);
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('deadlines', function (Blueprint $table) {
        if (Schema::hasColumn('deadlines', 'notif_h1')) {
            $table->dropColumn('notif_h1');
        }
    });
}
};
