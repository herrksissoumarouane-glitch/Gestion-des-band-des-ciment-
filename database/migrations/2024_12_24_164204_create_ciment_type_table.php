<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCimentTypeTable extends Migration
{
    public function up()
    {
        Schema::create('ciment_type', function (Blueprint $table) {
            $table->increments('ref');
            $table->string('nom', 200);
            $table->string('created_by', 100);
            $table->string('updated_by', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ciment_type');
    }
}