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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('chat_with')->nullable();
            $table->boolean('is_group')->default('0');
            $table->timestamps();

        });
        DB::table('conversations')->insert(
            array(
                0=>
                    array(
                        'created_by' => '1',
                        'is_group' => 1,
                    ),
            ));


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
