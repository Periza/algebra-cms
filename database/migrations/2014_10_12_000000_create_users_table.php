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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreginId('role_id')->nullable()->contrained('roles')->onDelete('set null');
        });

        $adminUser = ['name' => 'admin', 'email' => 'admin@email.com', 'email_verified_at' => now(), 'password' => Hash::make('adminadmin'), 'role_id' => 1, 'created_at' => now()];

        
        DB:table('users')->insert($adminUser);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
