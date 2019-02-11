<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComcafeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ComCafe';

    /**
     * Run the migrations.
     * @table ComCafe
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('Commande_idCom');
            $table->integer('Cafe_idCafe');

            $table->index(["Cafe_idCafe"], 'fk_Commande_has_Cafe_Cafe1_idx');

            $table->index(["Commande_idCom"], 'fk_Commande_has_Cafe_Commande1_idx');


            $table->foreign('Commande_idCom', 'fk_Commande_has_Cafe_Commande1_idx')
                ->references('idCom')->on('Commande')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Cafe_idCafe', 'fk_Commande_has_Cafe_Cafe1_idx')
                ->references('idCafe')->on('Cafe')
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
