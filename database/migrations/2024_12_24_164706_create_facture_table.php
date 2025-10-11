<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureTable extends Migration
{
    public function up()
    {
        Schema::create('facture', function (Blueprint $table) {
            $table->bigIncrements('ref');
            $table->string('n_ordre', 12);
            $table->string('username', 11);
            $table->unsignedBigInteger('ref_client');
            $table->unsignedBigInteger('ref_prix_ciment');
            $table->float('prix_ciment_cl');
            $table->float('montant');
            $table->enum('mode_regle', ['Chèque', 'Espèce']);
            $table->float('prixtotal');
            $table->float('reste');
            $table->float('quant_kg');
            $table->float('quant_tonne');
            $table->integer('quant_sacs');
            $table->date('date');
            $table->text('observation')->nullable();
            $table->string('created_by', 200);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ref_client')->references('ref')->on('client')->onDelete('cascade');
            $table->foreign('ref_prix_ciment')->references('ref')->on('prix_ciment_client')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facture');
    }
}