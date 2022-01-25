<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('estrelas');
            $table->foreignid('user_id')->constrained()->onDelete('cascade');
            $table->foreignid('filme_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
   

        Schema::table('assessments', function (Blueprint $table) {
            $table->foreignId('filme_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
