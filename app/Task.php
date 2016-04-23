<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function priority() {
        return $this->belongsTo('Priority::class');
    }

    public function status() {
        return $this->belongsTo('Status::class');
    }

    public function parent()
    {
        return $this->belongsTo('Task::class');
    }

    public function children()
    {
        return $this->hasMany('Task::class');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
