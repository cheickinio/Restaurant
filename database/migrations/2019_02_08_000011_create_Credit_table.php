<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Credit';

    /**
     * Run the migrations.
     * @table Credit
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('idCredit');
            $table->string('NomPers', 45)->nullable();
            $table->string('prenomPers', 45)->nullable();
            $table->double('montantCred')->nullable();
            $table->string('datepay', 45)->nullable();
            $table->integer('Commande_idCom');

            $table->index(["Commande_idCom"], 'fk_Credit_Commande1_idx');


            $table->foreign('Commande_idCom', 'fk_Credit_Commande1_idx')
                ->references('idCom')->on('Commande')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
