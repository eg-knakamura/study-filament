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
        Schema::create("customers", function (Blueprint $table) {
            $table->id();
            $table->string("name_sei")->comment("名前(性)");
            $table->string("name_mei")->comment("名前(名)");
            $table->integer("mst_item_id")->comment("マスタアイテムID");
            $table->timestamps();
        });

        \DB::table("customers")->insert([
            0 => [
                "id" => 1,
                "name_sei" => "山田",
                "name_mei" => "太郎",
                "mst_item_id" => "1",
                "created_at" => "2023-10-20 02:16:04",
                "updated_at" => "2023-10-20 02:16:04",
            ],
            [
                "id" => 2,
                "name_sei" => "山田",
                "name_mei" => "大",
                "mst_item_id" => "1",
                "created_at" => "2023-10-20 02:16:04",
                "updated_at" => "2023-10-20 02:16:04",
            ],
            [
                "id" => 3,
                "name_sei" => "山田",
                "name_mei" => "大吾",
                "mst_item_id" => "1",
                "created_at" => "2023-10-20 02:16:04",
                "updated_at" => "2023-10-20 02:16:04",
            ],
            [
                "id" => 4,
                "name_sei" => "山田",
                "name_mei" => "大吾郎",
                "mst_item_id" => "1",
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
        Schema::dropIfExists("customers");
    }
};
