<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('receiver_name');
            $table->text('receiver_email');
            $table->text('sender_name');
            $table->text('sender_email');
            $table->text('subject');
            $table->text('message');
            $table->text('appointment_room');
            $table->dateTime('appointment_date');
            $table->enum('status', ['pending', 'accept', 'reject']);
            $table->text('token');
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
        Schema::dropIfExists('libs');
    }
}
