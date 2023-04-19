<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->prefix.'product_feature_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_feature_id')->constrained($this->prefix.'product_features');
            $table->integer('position')->default(0)->index();
            $table->json('name');
            $table->json('legacy_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->prefix.'product_feature_values');
    }
};
