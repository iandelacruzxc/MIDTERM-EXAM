<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'instructor_id', 'department_id', 'credit'];
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    

}