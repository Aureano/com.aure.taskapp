<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->longText('description')->default('text');
            $table->date('start_date');
            $table->date('due_date');
            $table->string('status')->default('new');
            $table->foreignId('user_created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_assigned_to')->constrained('users')->nullable()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
