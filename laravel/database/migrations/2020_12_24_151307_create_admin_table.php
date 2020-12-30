<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('user',20)->nullable();
            $table->string('passwd',180)->nullable();
            $table->string('uname',100);
            $table->string('email',180);
            $table->tinyInteger('auth_id')->nullable() ->default(1);
            $table->integer('reg_time')->nullable();
            $table->integer('log_time')->nullable();
            $table->tinyInteger('status')->default(1);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
