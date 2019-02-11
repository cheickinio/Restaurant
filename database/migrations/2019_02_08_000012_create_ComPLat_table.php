<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplatTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ComPLat';

    /**
     * Run the migrations.
     * @table ComPLat
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('Commande_idCom');
            $table->integer('PLat_idPLat');

            $table->index(["PLat_idPLat"], 'fk_Commande_has_PLat_PLat1_idx');

            $table->index(["Commande_idCom"], 'fk_Commande_has_PLat_Commande_idx');


            $table->foreign('Commande_idCom', 'fk_Commande_has_PLat_Commande_idx')
                ->references('idCom')->on('Commande')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('PLat_idPLat', 'fk_Commande_has_PLat_PLat1_idx')
                ->references('idPLat')->on('PLat')
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
