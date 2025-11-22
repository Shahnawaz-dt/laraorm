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
    // First change to string
    DB::statement("ALTER TABLE tasks MODIFY status VARCHAR(20) NOT NULL DEFAULT 'pending'");

    // Then update existing values to have spaces
    DB::table('tasks')->where('status', 'in_progress')->update(['status' => 'In Progress']);
    DB::table('tasks')->where('status', 'pending')->update(['status' => 'Pending']);
    DB::table('tasks')->where('status', 'completed')->update(['status' => 'Completed']);
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
