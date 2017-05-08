<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
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
		$index->delete($posts-Post_id);

	}

	public static function updateIndex($user)
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
