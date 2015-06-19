<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
	'title',
	'body',
	'published_at',
    'url',
	'tags',
	'user_id',
	'image',
	'published'
];
    public function getRouteKey()
    {
        return $this->url;
    }
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}

