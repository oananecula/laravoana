<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'body'];

    public function path() {
        return route("Articles.show", $this);
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function projects() {
        return $this->belongsTo(Projects::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
