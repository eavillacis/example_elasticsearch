<?php

class ProductsController extends BaseController {

    public function index()
    {
        // Check if user has sent a search query
        if($query = Input::get('query', false)) {
            // Use the Elasticquent search method to search ElasticSearch
            $products = Product::search($query);
        } else {
            // Show all posts if no query is set
            $products = Product::all();
        }

        return View::make('products', compact('products'));
    }

}