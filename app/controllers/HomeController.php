<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
        // Check if user has sent a search query
        if($query = Input::get('query', false)) {
            // Use the Elasticquent search method to search ElasticSearch
//        $posts = Post::search($query);
            $posts = Post::searchByQuery([
                "bool" => [
                    'must' => [
                        'multi_match' => [
                            'query' => Input::get('query', ''),
                            'fields' => [ "title^2", "content"]
                        ],
                    ],
                    "should" => [
                        'match' => [
                            'tags' => [
                                "query" => Input::get('query', ''),
                                "type" => "phrase"
                            ]
                        ]
                    ]
                ]
            ]);
        } else {
            // Show all posts if no query is set
            $posts = Post::all();
        }

        return View::make('home', compact('posts'));
	}

}
