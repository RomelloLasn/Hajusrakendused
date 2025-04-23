<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkersTable extends Migration
{
    public function up()
    {
        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            
            $table->string('description')->nullable()->default('No description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('markers');
    }
}