<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->decimal('lat', 11, 8);
            $table->decimal('lng', 11, 8);
            $table->mediumText('phone');
            $table->mediumText('address');
            $table->tinyInteger('order_status')->default(1)->comment('Şube sipariş alma durumu.1: Aktif');
            $table->tinyInteger('status')->default(0)->comment('Şubenin Aktiflik Durumu.1: Aktif');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
