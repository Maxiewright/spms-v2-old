<?php

namespace Modules\Events\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventVenue extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Modules\Events\Database\factories\EventVenueFactory::new();
    }

    protected $fillable = ['name', 'slug', 'description'];

    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
