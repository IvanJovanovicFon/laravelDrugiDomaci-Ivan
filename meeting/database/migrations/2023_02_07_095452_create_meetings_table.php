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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->default('Konsultacije');
            $table->string('room');
            $table->date('date');
            $table->foreignId('professor_id');
            $table->foreignId('user_id');
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meetings', function (Blueprint $table) {
        $table->dropForeign("user_id");
        $table->dropForeign("professor_id");
    });
}
};
