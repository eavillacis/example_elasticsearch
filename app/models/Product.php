<?php

use Elasticquent\ElasticquentTrait;

class Product extends Eloquent {

    use ElasticquentTrait;

    public $table = 'general_products';
    public $fillable = ['name', 'short_description', 'long_description'];

    protected $mappingProperties = array(
        'name' => [
            'type' => 'string',
            "search_analyzer" => "autocomplete"
        ],
        'short_description' => [
            'type' => 'string',
            "analyzer" => "standard"
        ],
        'long_description' => [
            'type' => 'string',
            "analyzer" => "standard"
        ],
    );
}