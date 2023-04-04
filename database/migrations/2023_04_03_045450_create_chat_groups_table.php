<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chat_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('conversation_id')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();

        });
        DB::table('chat_groups')->insert(
            array(
                0=>
                    array(
                        'created_by' => '1',
                        'conversation_id' => 1,
                        'name' => 'Laravel',
                    ),
                1=>
                    array(
                        'created_by' => '1',
                        'conversation_id' => 2,
                        'name' => 'React',
                    ),
            ));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
