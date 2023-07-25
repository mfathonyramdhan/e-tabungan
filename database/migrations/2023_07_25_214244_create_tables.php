<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    public function up()
    {
        // Create roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role_name');
            $table->timestamps();
        });

        // Create class_levels table
        Schema::create('class_levels', function (Blueprint $table) {
            $table->id('cl_id');
            $table->string('cl_name');
            $table->timestamps();
        });

        // Create accounts table
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('acc_id');
            $table->string('acc_unique_num');
            $table->string('acc_birthplace');
            $table->date('acc_datebirth');
            $table->string('acc_name');
            $table->string('acc_address');
            $table->string('acc_phone');
            $table->string('acc_religion');
            $table->string('acc_gender');
            $table->string('acc_email');
            $table->string('acc_password');
            $table->string('acc_class');
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_cl');
            $table->timestamps();

            $table->foreign('id_role')->references('role_id')->on('roles');
            $table->foreign('id_cl')->references('cl_id')->on('class_levels');
        });

        // Create transactions table
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('tr_id');
            $table->unsignedBigInteger('id_acc');
            $table->integer('tr_debt');
            $table->integer('tr_credit');
            $table->timestamp('datecreated')->useCurrent();
            $table->timestamp('datemodified')->nullable();
            $table->timestamps();

            $table->foreign('id_acc')->references('acc_id')->on('accounts');
        });
    }

    public function down()
    {
        // Drop the tables in reverse order (important for foreign key constraints)
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('class_levels');
        Schema::dropIfExists('roles');
    }
}
