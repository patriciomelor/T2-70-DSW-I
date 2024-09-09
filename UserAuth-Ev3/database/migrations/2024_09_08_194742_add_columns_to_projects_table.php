<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->date('creation_date')->after('name');
            $table->unsignedBigInteger('user_id')->after('creation_date');
            $table->boolean('active')->default(true)->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['name', 'creation_date', 'user_id', 'active']);
        });
    }
}

