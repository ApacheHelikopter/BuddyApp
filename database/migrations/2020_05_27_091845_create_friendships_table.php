<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendships', function (Blueprint $table) {
            $table->id();
            $table->integer('buddy_id')->index()->references('id')->on('buddies')->onDelete('cascade');
            $table->integer('friend_id')->index()->references('id')->on('buddies')->onDelete('cascade');
            $table->integer('acted_user')->index();
            $table->enum('status', ['pending', 'confirmed', 'blocked']);
            $table->rememberToken();
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
        Schema::dropIfExists('friendships');
    }
}
