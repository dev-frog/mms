<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->Integer('point')->nullable()->default(0);
            $table->Integer('shopping');
            $table->Integer('redeem_point')->nullable()->default(0);
            $table->unsignedInteger('member_id');
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('points',function(Blueprint $table){
            $table->dropForeign('points_member_id_foreign');
        });
        Schema::dropIfExists('points');
    }
}
