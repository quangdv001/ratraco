<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';
    protected $fillable = [
        'name', 'code', 'group_id'
    ];
    protected $dates = ['deleted_at'];

    public function groupPermission()
    {
        return $this->belongsTo(GroupPermission::class, 'group_id');
    }
}
