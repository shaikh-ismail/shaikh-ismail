<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    // database/migrations/create_books_table.php

public function up()
{
    Schema::create('movies', function (Blueprint $table) {
        $table->id();
        $table->string('movie_name');
        $table->text('description')->nullable();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
