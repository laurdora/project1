<?php

namespace App\Http\Controllers;
use App\Search;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){

    		$q = Input::get ( 'q' );
	$user = Search::where ( 'username', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
	if (count ( $user ) > 0)
		return view ( 'layouts/search' )->withDetails ( $user )->withQuery ( $q );
	else
		return view ( 'layouts/search' )->withMessage ( 'No Details found. Try to search again !' );
    }
}
