<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_path'); // relative to storage/app/private/ebooks/...
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('ebooks');
    }
};
