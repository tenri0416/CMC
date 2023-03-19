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
        Schema::create('directories', function (Blueprint $table) {
            $table->id(); //ディレクトリーのID
            //ユーザーIDの外部キー
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('directorie_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directories');
    }
};
