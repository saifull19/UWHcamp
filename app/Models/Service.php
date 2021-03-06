<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'service';

    protected $with = ['category', 'user', 'advantage_user', 'advantage_service', 'thumbnail_service', 'tagline', 'order'];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $guarded = [
        'id'
    ];

    // mengembalikan relationship one to many
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

    // menjadi object relationship one to many
    public function advantage_user()
    {
        return $this->hasMany('App\Models\AdvantageUser', 'service_id');
    }

    public function advantage_service()
    {
        return $this->hasMany('App\Models\AdvantageService', 'service_id');
    }

    public function thumbnail_service()
    {
        return $this->hasMany('App\Models\ThumbnailService', 'service_id');
    }

    public function tagline()
    {
        return $this->hasMany('App\Models\Tagline', 'service_id');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order', 'service_id');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
