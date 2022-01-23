<?php

declare(strict_types=1);

use Domain\Counters\Models\Counter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountersTable extends Migration
{
    private string $table;

    public function __construct()
    {
        $this->table = (new Counter())->getTable();
    }

    public function up(): void
    {
        Schema::create($this->table, static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('likes');
            $table->unsignedBigInteger('views');
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
}
