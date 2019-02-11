<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeHasJusTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Commande_has_Jus';

    /**
     * Run the migrations.
     * @table Commande_has_Jus
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('Commande_idCom');
            $table->integer('Jus_idJus');

            $table->index(["Jus_idJus"], 'fk_Commande_has_Jus_Jus1_idx');

            $table->index(["Commande_idCom"], 'fk_Commande_has_Jus_Commande1_idx');


            $table->foreign('Commande_idCom', 'fk_Commande_has_Jus_Commande1_idx')
                ->references('idCom')->on('Commande')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Jus_idJus', 'fk_Commande_has_Jus_Jus1_idx')
                ->references('idJus')->on('Jus')
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
