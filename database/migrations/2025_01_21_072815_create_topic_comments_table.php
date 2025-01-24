<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('topic_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrainted('topics');
            $table->morphs('commentable');
            $table->text('comment');
            $table->integer('likes')->default(0);
            $table->string('reply_to')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_comments');
    }
};
