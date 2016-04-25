<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function priority() {
        return $this->belongsTo('App\Priority');
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    public function parent()
    {
        return $this->belongsTo('App\Task');
    }

    public function children()
    {
        return $this->hasMany('App\Task');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
