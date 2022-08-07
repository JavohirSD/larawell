<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('title',128)->unique();
            $table->string('anons',255);
            $table->mediumText('description');
            $table->tinyInteger('status')->default(0);
            $table->string('slug',128)->unique()->nullable()->default(NULL);
            $table->tinyInteger('language')->default(1);
            $table->string('image')->nullable()->default(NULL);
            $table->integer('author_id');
            $table->integer('category_id')->default(0);
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog');
    }
};
