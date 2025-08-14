<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;


return new class extends Migration
{
    use SoftDeletes,AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('membership_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sort_order')->default(0);
            $table->unsignedBigInteger('membership_id')->index();
            $table->unsignedBigInteger('feature_id')->index();

            $table->timestamps();
            $table->softDeletes();
            $this->addAdminAuditColumns($table);

            $table->foreign('membership_id')->references('id')->on('member_ships')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_features');
    }
};
