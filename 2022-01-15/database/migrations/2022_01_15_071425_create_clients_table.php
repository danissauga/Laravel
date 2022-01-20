<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('surename');
            $table->string('username');
         //   $table->bigInteger('company_id'); // leidzia ir neigiamas reiksmes -5,-6 ir t.t.
            
            $table->unsignedBigInteger('company_id'); //neleidzia neigiamu reiksmiu -5,-6 ir t.t.
            // $table->foreign('company_id')->references('id')->on('companies');
               $table->foreign('company_id')->references('id')->on('companies'); 
            
            $table->string('image_url', 300); //300 - simboliu kiekis.
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
