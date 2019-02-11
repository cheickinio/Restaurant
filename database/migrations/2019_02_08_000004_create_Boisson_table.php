<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoissonTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Boisson';

    /**
     * Run the migrations.
     * @table Boisson
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('idBois');
            $table->string('libelleBois', 45)->nullable();
            $table->double('prixBois')->nullable();
            $table->integer('quantiteEntreBois')->nullable();
            $table->string('quantiteSortieBois', 45)->nullable();
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
