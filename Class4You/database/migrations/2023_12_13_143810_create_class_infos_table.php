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
        Schema::create('class_infos', function (Blueprint $table) {
            $table->id('ClassID');
            $table->integer('InstructorID');
            $table->integer('CategoryID');
            $table->integer('CourseLanguageID');
            $table->string('ClassImg');
            $table->string('ClassTitle', 100);
            $table->string('ClassDescription', 1000);
            $table->integer('ClassPrice')->nullable();
            $table->char('ClassDifficulty', 1);
            $table->decimal('ClassRating', 2, 1)->default(0);
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
        Schema::dropIfExists('class_infos');
    }
};
