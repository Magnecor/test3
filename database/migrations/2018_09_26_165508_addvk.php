<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addvk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servers', function (Blueprint $table) {
          $table->string('nick')->nullable();
          $table->decimal('vk_300')->nullable();
          $table->decimal('vk_500')->nullable();
          $table->decimal('vk_3000')->nullable();
          $table->decimal('vk1_300')->nullable();
          $table->decimal('vk2_500')->nullable();
          $table->decimal('vk3_3000')->nullable();
          $table->decimal('vk_3001')->nullable();
          $table->decimal('vk_5001')->nullable();
          $table->decimal('vk_30001')->nullable();
          $table->decimal('vk1_3001')->nullable();
          $table->decimal('vk2_5001')->nullable();
          $table->decimal('vk3_30001')->nullable();


            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servers', function (Blueprint $table) {
         $table->dropColumn(['nick',
           'vk_300',
           'vk_500',
           'vk_3000',
           'vk1_300',
           'vk2_500',
           'vk3_3000',
           'vk_3001',
           'vk_5001',
           'vk_30001',
           'vk1_3001',
           'vk2_5001',
           'vk3_30001']);
            //
        });
    }
}
