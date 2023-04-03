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
        Schema::create('group_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable();
            $table->foreignId('group_id')->nullable();
            $table->timestamps();

        });

        DB::table('group_members')->insert(
            array(
                0=>
                    array(
                        'member_id' => '1',
                        'group_id' => 1,
                    ),
                1=>
                    array(
                        'member_id' => '2',
                        'group_id' => 1,
                    ),
                2=>
                    array(
                        'member_id' => '3',
                        'group_id' => 1,
                    ),
            ));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_members');
    }
};
