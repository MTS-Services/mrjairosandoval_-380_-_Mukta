<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
       use SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'short_order',
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
        $this->appends = array_merge(parent::getAppends(), [
            
        ]);
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

    public function getStatusLabelAttribute()
    {
        return self::getStatusList()[$this->status];
    }

    public function getStatusColorAttribute()
    {
        return $this->status == self::STATUS_ACTIVE ? 'badge-success' : '';
    }

    public function getStatusBtnLabelAttribute()
    {
        return $this->status == self::STATUS_ACTIVE ? self::getStatusList()[self::STATUS_INACTIVE] : self::getStatusList();
    }

    public function getStatusBtnColorAttribute()
    {
        return $this->status == self::STATUS_ACTIVE ? 'btn-error' : 'btn-success';
    }

    public function getStatusBtnClassAttribute()
    {
        return $this->status == self::STATUS_INACTIVE ? 'btn-error' : 'btn-primary';
    }
    
}