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
        Schema::create('prix_ciment_client', function (Blueprint $table) {
            $table->bigIncrements('ref');
            $table->unsignedBigInteger('ref_client');
            $table->unsignedInteger('ref_cimenttype');
            $table->float('prix');
            $table->string('created_by', 100);
            $table->string('updated_by', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ref_client')->references('ref')->on('client')->onDelete('cascade');
            $table->foreign('ref_cimenttype')->references('ref')->on('ciment_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prix_ciment_client');
    }
};
