<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'sort_order',
        'title',
        'sub_title',
        'icon',
        'status',

        'created_by',
        'updated_by',
        'deleted_by',


    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->appends = array_merge(parent::getAppends(), []);
    }

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_INACTIVE => 'Inactive',
        ];
    }

    public function getStatusLabelAttribute(): string
    {
        return self::getStatusList()[$this->status] ?? 'Unknown';
    }

    public function getStatusColorAttribute(): string
    {

        return $this->status == self::STATUS_ACTIVE ? 'badge-success' : 'badge-error';
    }

    public function getStatusBtnLabelAttribute(): string
    {

        return $this->status == self::STATUS_ACTIVE
            ? self::getStatusList()[self::STATUS_INACTIVE]
            : self::getStatusList()[self::STATUS_ACTIVE];
    }

    public function getStatusBtnColorAttribute(): string
    {

        return $this->status == self::STATUS_ACTIVE ? 'btn-error' : 'btn-success';
    }

    public function getStatusBtnClassAttribute(): string
    {

        return $this->status == self::STATUS_INACTIVE ? 'btn-error' : 'btn-primary';
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', self::STATUS_INACTIVE);
    }
}
