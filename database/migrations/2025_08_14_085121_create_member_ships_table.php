<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\MemberShip;

return new class extends Migration
{
    use SoftDeletes,AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member_ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('name')->unique();
            $table->string('tag')->unique()->nullable();
            $table->string('slug')->unique();
            $table->tinyInteger('status')->default(MemberShip::STATUS_INACTIVE)->comment(MemberShip::STATUS_ACTIVE . ': active' . MemberShip::STATUS_INACTIVE . ': inactive');

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
        Schema::dropIfExists('member_ships');
    }
};
