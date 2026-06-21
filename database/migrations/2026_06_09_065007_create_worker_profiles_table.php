<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('worker_profiles', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();

            $table->string('name');

            $table->string('aadhaar_number');

            $table->string('aadhaar_image')->nullable();

            $table->string('profile_image')->nullable();

            $table->text('bio')->nullable();

            $table->string('experience')->nullable();

            $table->string('daily_wage')->nullable();

            $table->boolean('is_verified')->default(false);

            $table->string('mobile',10)->nullable();

            $table->string('address')->nullable();

            $table->string('city')->nullable();

            $table->string('state')->nullable();

            $table->decimal('latitude',10,7)->nullable();

            $table->decimal('longitude',10,7)->nullable();

            // $table->decimal('wallet_balance',10,2)->default(0);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('worker_profiles');
    }
};

