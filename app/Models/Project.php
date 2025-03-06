<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name'];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_projects');
    }
}
