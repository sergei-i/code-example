<?php

declare(strict_types=1);

use Domain\Tags\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    private string $table;

    public function __construct()
    {
        $this->table = (new Tag())->getTable();
    }

    public function up(): void
    {
        Schema::create($this->table, static function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
}
