<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = [
        'role_id', 'namespace', 'controller', 'method', 'action', 'allowed',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

}
