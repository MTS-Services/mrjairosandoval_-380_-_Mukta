<?php

use App\Http\Traits\AuditColumnsTrait;
use App\Models\Articles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('title');
            $table->string('slug');
            $table->string('sub_title');
            $table->text('content');
            $table->string('image');
            $table->string('auther_name');
            $table->tinyInteger('status')->default(Articles::STATUS_INACTIVE)->comment(Articles::STATUS_INACTIVE . ': active' . Articles::STATUS_INACTIVE . ': inactive');
            $table->timestamp('published_data');
            $table->integer('read_time');
            $table->integer('views');
            $table->string('meta_title');
            $table->longText('meta_description');
            $table->text('meta_keywords');


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
        Schema::dropIfExists('articles');
    }
};
