<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->integer('user_id')->nullable();
            $table->jsonb('data');
            $table->timestamps();

            $table->foreign('form_id')
                  ->references('id')->on('forms')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            $table->dropForeign('form_submissions_form_id_foreign');
        });

        Schema::dropIfExists('form_submissions');
    }
}
