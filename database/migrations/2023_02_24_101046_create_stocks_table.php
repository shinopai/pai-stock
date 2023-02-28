<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('商品名');
            $table->integer('amount')->unsigned()->comment('内容量');
            $table->integer('quantity')->unsigned()->comment('数量');
            $table->dateTime('arrival_date')->comment('入庫日');
            $table->timestamps();

            $table->foreignId('unit_id')
                  ->constrained()
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
