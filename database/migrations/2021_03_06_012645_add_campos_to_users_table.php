<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ci', 15)->nullable()->after('password');
            $table->string('perfil', 30)->nullable()->after('password');
            $table->string('celulares', 30)->nullable()->after('password');
            $table->string('direccion', 200)->nullable()->after('password');
            $table->string('estado', 30)->nullable()->after('password');
            $table->date('fecha_nacimiento')->nullable()->after('password');
            $table->datetime('deleted_at')->nullable()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ci');
            $table->dropColumn('perfil');
            $table->dropColumn('celulares');
            $table->dropColumn('direccion');
            $table->dropColumn('estado');
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('deleted_at');
        });
    }
}
