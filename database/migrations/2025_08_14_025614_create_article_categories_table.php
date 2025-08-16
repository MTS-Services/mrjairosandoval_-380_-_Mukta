<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\ArticleCategory;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->tinyInteger('status')->default(ArticleCategory::STATUS_INACTIVE)->comment(ArticleCategory::STATUS_ACTIVE . ': active' . ArticleCategory::STATUS_INACTIVE . ': inactive');
            $table->timestamps();
            $table->softDeletes();

            $this->addAdminAuditColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_categories');
    }
};
