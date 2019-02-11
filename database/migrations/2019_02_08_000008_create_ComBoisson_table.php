<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboissonTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ComBoisson';

    /**
     * Run the migrations.
     * @table ComBoisson
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('Boisson_idBois');
            $table->integer('Commande_idCom');

            $table->index(["Boisson_idBois"], 'fk_Boisson_has_Commande_Boisson1_idx');

            $table->index(["Commande_idCom"], 'fk_Boisson_has_Commande_Commande1_idx');


            $table->foreign('Boisson_idBois', 'fk_Boisson_has_Commande_Boisson1_idx')
                ->references('idBois')->on('Boisson')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Commande_idCom', 'fk_Boisson_has_Commande_Commande1_idx')
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
