<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->text('title');
            $table->text('slug');
            $table->text('sub_title')->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('button_title')->nullable();
            $table->string('seo_url', 191)->nullable()->unique();
            $table->text('seo_title')->nullable();
            $table->mediumText('seo_description')->nullable();
            $table->integer('descriptionable_id');
            $table->text('descriptionable_type');
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
        Schema::dropIfExists('descriptions');
    }
}
