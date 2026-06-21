<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->enum('role', [
                'admin',
                'worker',
                'customer'
            ])->default('customer');

            $table->string('phone')->nullable();

            $table->string('city')->nullable();

            $table->string('address')->nullable();

            $table->decimal('latitude',10,8)->nullable();

            $table->decimal('longitude',11,8)->nullable();

            $table->string('profile_image')->nullable();

            $table->boolean('status')->default(1);

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'role',
                'phone',
                'city',
                'address',
                'latitude',
                'longitude',
                'profile_image',
                'status'
            ]);

        });
    }
};