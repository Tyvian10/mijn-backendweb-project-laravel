<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('faqs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); //foreign key
        $table->string('vraag');
        $table->text('antwoord');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('faqs');
}

};
