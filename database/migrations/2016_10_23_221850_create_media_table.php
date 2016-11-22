<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('media', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('displayName');
            $table->text('source');
            $table->text('address');
            $table->integer('type_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });

        Schema::table('media', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('type_id')->references('id')->on('media_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('location')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropForeign('media_user_id_foreign');
            $table->dropForeign('media_type_id_foreign');
            $table->dropForeign('media_location_id_foreign');
        });

        Schema::drop('media');
    }
}