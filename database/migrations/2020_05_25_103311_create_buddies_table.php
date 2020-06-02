<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuddiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('firstname')->default('');
            $table->string('lastname')->default('');
            $table->string('class')->default('');
            $table->string('birth_date')->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->default('default');
            $table->string('background_picture')->default('');
            $table->string('bio')->default('');
            $table->string('buddy_status')->default('Searching');
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
        Schema::dropIfExists('buddies');
    }
}
