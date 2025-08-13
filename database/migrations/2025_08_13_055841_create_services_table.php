<?php

use App\Models\Services;
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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('short_order')->default(0);
            $table->string('title');
            $table->string('sub_title');
             $table->string('icon')->nullable();
            $table->tinyInteger('status')->default(Services::STATUS_ACTIVE)->comment(Services::STATUS_ACTIVE . ': active' . Services::STATUS_INACTIVE . ': inactive');

         
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
        Schema::dropIfExists('services');
    }
};
