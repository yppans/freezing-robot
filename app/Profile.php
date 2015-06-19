<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
    protected $table = 'profiles';
	protected $fillable = ['user_id', 'email', 'phone', 'website', 'bio', 'avatar'];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

}
