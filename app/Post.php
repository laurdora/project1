<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use TNTSearch;

class Post extends Model
{
	protected $table="posts";
	protected $primaryKey="Post_id";
	//Define Post belongs to one user example: one post only has one user_id
	public function user()
	{
		return $this->belongsTo('App\Registered_user');
	}

    public static function insertToIndex($posts)
	{
    TNTSearch::selectIndex("posts.index");
    $index = TNTSearch::getIndex();
    $index->insert($posts->toArray());
	}

	public static function deleteFromIndex($posts)
	{
    TNTSearch::selectIndex("posts.index");
    $index = TNTSearch::getIndex();
    $index->delete($posts->Post_id);
	}

	public static function updateIndex($posts)
	{
    TNTSearch::selectIndex("posts.index");
    $index = TNTSearch::getIndex();
    $index->update($posts->Post_id, $posts->toArray());
	}

	public static function boot()
	{
    Post::created([__CLASS__, 'insertToIndex']);
    Post::updated([__CLASS__, 'updateIndex']);
    Post::deleted([__CLASS__, 'deleteFromIndex']);
	}

    
}
