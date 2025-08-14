<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\PrivacyPolicie;


return new class extends Migration
{
    use SoftDeletes,AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('privacy_policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('type');
            $table->string('notes');
            $table->tinyInteger('status')->default(PrivacyPolicie::STATUS_INACTIVE)->comment(PrivacyPolicie::STATUS_INACTIVE . ': active' . PrivacyPolicie::STATUS_INACTIVE . ': inactive');
           
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
        Schema::dropIfExists('privacy_policies');
    }
};
