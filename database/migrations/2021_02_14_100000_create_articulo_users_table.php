<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->require;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('articulo_id')->require;
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');
            //$table->unique('user_id','articulo_id');
            $table->string('codigo', 10);
            $table->string('descripcion',250);
            $table->integer('cantidad')->default('1');
            $table->decimal('precio1',8,3)->default('1.000');
            $table->decimal('precio2',8,3)->default('1.000');
            $table->decimal('precio3',8,3)->default('1.000');
            $table->decimal('precio4',8,3)->default('1.000');
            $table->decimal('precio5',8,3)->default('1.000');
            $table->decimal('precio6',8,3)->default('1.000');
            $table->integer('tramo1')->default('100');
            $table->integer('tramo2')->default('300');
            $table->integer('tramo3')->default('500');
            $table->integer('tramo4')->default('1000');
            $table->integer('tramo5')->default('3000');
            $table->integer('tramo6')->default('3000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_users');
    }
}
