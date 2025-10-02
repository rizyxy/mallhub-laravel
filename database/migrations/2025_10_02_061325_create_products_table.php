<?php

use App\Models\Store;
use App\Models\SubCategory;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->required();
            $table->text('description')->nullable();
            $table->double('price');
            $table->foreignIdFor(Store::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(SubCategory::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
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
