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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Catalogue::class)->constrained();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique()->comment('Mã sản phẩm');
            $table->string('img_thumbnail')->nullable();
            $table->string('price');
            $table->string('price_sale')->nullable();
            $table->string('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('material')->nullable()->comment('Chất liệu');
            $table->text('user_manual')->nullable()->comment('Hướng dẫn sử dụng');
            $table->unsignedBigInteger('views')->default(0);

            $table->boolean('is_active')->default(true);
            $table->boolean('is_hot_deal')->default(false);
            $table->boolean('is_good_deal')->default(false);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_show_home')->default(false);

//            $table->enum('status',['draft','pending-review','published'])->default(true);
//            $table->date('published_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
