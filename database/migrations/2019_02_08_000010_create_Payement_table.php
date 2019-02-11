<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayementTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Payement';

    /**
     * Run the migrations.
     * @table Payement
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('idPay');
            $table->double('montantPay')->nullable();
            $table->integer('Commande_idCom');

            $table->index(["Commande_idCom"], 'fk_Payement_Commande1_idx');


            $table->foreign('Commande_idCom', 'fk_Payement_Commande1_idx')
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
