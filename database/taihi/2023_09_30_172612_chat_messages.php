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

        Schema::create('chat_messages', function (Blueprint $table) { 

        $table->id();

        $table->foreignId('chat_room_id') 
            ->constrained('chat_rooms','id')
            ->onUpdate('cascade')
            ->onDelete('cascade');  // 参照先が削除されたら同時に削除
    
        $table->foreignId('user_id') 
            ->constrained('users','id')
            ->onUpdate('cascade')
            ->onDelete('cascade');  // 参照先が削除されたら同時に削除

            $table->text('message');
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
        //
    }
};
