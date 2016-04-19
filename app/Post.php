<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = ['title', 'content'];


    // relationships
	public function comments() {

		return $this->hasMany(Comment::class);
	}
    

    public function commentsCount() {
    	return $this->hasMany(Comment::class)->count();
    }

    public function deleteRelateComments() {
    	$comments = $this->comments()->get();
    	foreach ($comments as $comment) {
    		$comment->delete();
    	}
    }
}
