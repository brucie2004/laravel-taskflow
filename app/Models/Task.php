<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Task extends Model
{
    //

     use HasFactory;

    protected $fillable = ['name', 'priority', 'status', 'due_date'];

    // A Task belongs to a Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
