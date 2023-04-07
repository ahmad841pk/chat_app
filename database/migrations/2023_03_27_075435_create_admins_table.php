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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('admins')->insert(
            array(
                0=>
                    array(
                        'email' => 'admin1@whizzbridge.com',
                        'name' => 'Ahmad',
                        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                        'image' => 'uploads/profile/sOrFQwVoes6f7319699f10d40f242e9d33fd91bf4d.png',
                    ),
                1=>
                    array(
                        'email' => 'admin2@whizzbridge.com',
                        'name' => 'wasim',
                        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                        'image' => 'uploads/profile/sOrFQwVoes6f7319699f10d40f242e9d33fd91bf4d.png',
                    ),
                2=>
                    array(
                        'email' => 'admin3@whizzbridge.com',
                        'name' => 'raza',
                        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                        'image' => 'uploads/profile/sOrFQwVoes6f7319699f10d40f242e9d33fd91bf4d.png',
                    ),
                3=>
                    array(
                        'email' => 'admin4@whizzbridge.com',
                        'name' => 'hassan',
                        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                        'image' => 'uploads/profile/sOrFQwVoes6f7319699f10d40f242e9d33fd91bf4d.png',
                    )
            ));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
