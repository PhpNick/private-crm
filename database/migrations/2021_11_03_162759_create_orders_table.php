<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('range_start');
            $table->date('range_end');
            $table->string('fio');
            $table->string('phone');
            $table->string('diet');
            $table->string('schedule');
            $table->boolean('day1')->default(false);
            $table->boolean('day2')->default(false);
            $table->boolean('day3')->default(false);
            $table->boolean('day4')->default(false);
            $table->boolean('day5')->default(false);
            $table->boolean('day6')->default(false);
            $table->boolean('day7')->default(false);
            $table->text('comment');
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
        Schema::dropIfExists('orders');
    }
}
