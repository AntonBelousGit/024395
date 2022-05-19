<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = ['name','cost'];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['is_own']);
    }

    public function own()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['is_own'])
            ->wherePivot('is_own',1);
    }
}
