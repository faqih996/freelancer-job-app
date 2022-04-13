<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    public $table ='service';

    protected $date =[
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'delivery_time',
        'revision_limit',
        'price',
        'note',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    // one to many relation
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function advantage_service()
    {
        return $this->hasMany(AdvantageService::class, 'service_id');
    }

    public function advantage_user()
    {
        return $this->hasMany(AdvantageUser::class, 'service_id');
    }

    public function thumbnail_service()
    {
        return $this->hasMany(ThumbnailService::class, 'service_id');
    }

    public function tagline()
    {
        return $this->hasMany(Tagline::class, 'service_id');
    }

    public function Order()
    {
        return $this->hasMany(Order::class, 'service_id');
    }

}
