<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opgs', function (Blueprint $table) {
            $table->id();
            $table->string('opgName');
            $table->string('MIBPG');
            $table->string('ownerFirstName');
            $table->string('ownerLastName');
            $table->string('opgAddress');
            $table->string('opgZipCode');
            $table->string('opgCity');
            $table->text('opgDescription');
            $table->string('opgPhoneNumber');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('opgs');
    }
}
