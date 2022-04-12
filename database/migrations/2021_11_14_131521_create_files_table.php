<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->text('path');
            $table->text('slug');
            $table->text('size')->comment('KB');
            $table->text('resolution')->nullable();
            $table->string('alt')->nullable();
            $table->string('type', 20)->default('default')->comment('default,cover,banner,video,gallery');
            $table->string('mime_type', 20);
            $table->string('file_title', 191)->nullable();
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
        Schema::dropIfExists('files');
    }
}
