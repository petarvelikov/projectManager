<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['project_id', 'description', 'completed'];

    public $timestamps = false;
}
