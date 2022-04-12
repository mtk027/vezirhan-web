<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->on('languages')->onDelete('cascade');
            $table->integer('parent_id')->nullable();
            $table->foreignId('menu_id')->on('menus')->onDelete('cascade');
            $table->text('title');
            $table->text('active')->nullable();
            $table->text('type')->comment('0:Custom,1:Branches,2:SystemPages');
            $table->text('value')->comment('0:Url,1:BranchID,2:PageRouteName');
            $table->string('target', 10)->default('_self');
            $table->integer('row_number')->default(1);
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
        Schema::dropIfExists('menu_items');
    }
}
