<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
        'title',
        'description',
        'due_date',
        'category',
        'status',
    ] ;

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
