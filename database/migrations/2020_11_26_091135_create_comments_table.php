<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chick_id');
            $table->text('content');
            $table->string('image');
            $table->unsignedBigInteger('user_id');
            $table->string('tags');
            $table->timestamps();
            $table->date('deleted_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chick_id')->references('id')->on('chick');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
