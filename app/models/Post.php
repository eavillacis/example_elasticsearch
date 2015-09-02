<?php

use Elasticquent\ElasticquentTrait;

class Post extends Eloquent {

    use ElasticquentTrait;

    public $table = 'posts';
    public $fillable = ['title', 'content', 'tags'];

    protected $mappingProperties = array(
        'title' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'content' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'tags' => [
            'type' => 'string',
            "analyzer" => "stop",
            "stopwords" => [","]
        ],
    );
}