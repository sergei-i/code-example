<?php

declare(strict_types=1);

use Domain\Comments\Models\Comment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    private string $table;

    public function __construct()
    {
        $this->table = (new Comment())->getTable();
    }

    public function up(): void
    {
        Schema::create($this->table, static function (Blueprint $table) {
            $table->id();

            $table->string('subject');
            $table->text('body');
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
}
