<?php

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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->tinyInteger('event_type')->default(1);
            $table->string('event_venue');
            $table->date('event_date');
            $table->time('morning_in_start')->nullable(); //start of in attendance morning
            $table->time('morning_in_end')->nullable(); //end if in attendance morning
            $table->time('morning_out_start')->nullable(); //start if out attendance morning
            $table->time('morning_out_end')->nullable();   //end if out attendance morning
            $table->time('afternoon_in_start')->nullable(); //start if in attendance afternoon
            $table->time('afternoon_in_end')->nullable();  //end if in attendance afternoon
            $table->time('afternoon_out_start')->nullable(); //start if out attendance afternoon
            $table->time('afternoon_out_end')->nullable(); //end if out attendance afternoon
            $table->unsignedBigInteger('user_id'); // reference to user table
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
