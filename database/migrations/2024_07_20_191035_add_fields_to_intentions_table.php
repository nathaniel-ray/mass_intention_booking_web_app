<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('intentions', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('intention_for');
            $table->longText('intention');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('sunday_mass')->nullable();
            $table->string('weekday_mass')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('intentions', [
            'name',
            'email',
            'phone',
            'intention_for',
            'intention',
            'start_date',
            'end_date'
        ]);
    }
};
