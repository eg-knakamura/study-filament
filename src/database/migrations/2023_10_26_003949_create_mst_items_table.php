<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("mst_items", function (Blueprint $table) {
            $table->id();
            $table->string("name")->comment("アイテム名");
            $table->timestamps();
        });

        \DB::table("mst_items")->insert([
            0 => [
                "id" => 1,
                "name" => "アイテム1",
                "created_at" => "2023-10-20 02:16:04",
                "updated_at" => "2023-10-20 02:16:04",
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("mst_items");
    }
};
