<?php

namespace Modules\Events\Entities;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Modules\Events\Database\Factories\EventFactory::new();
    }

    protected $fillable = [
        'name',
        'description',
        'image',
        'event_type_id',
        'event_status_id',
        'event_venue_id',
        'start_at',
        'end_at',
    ];

    protected $dates = [
        'start_at', 'end_at'
    ];

    /**
     * Return Event Types
     *
     * @return BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }
    /**
     * Return Event Statuses
     *
     * @return BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(EventStatus::class, 'event_status_id');
    }

    /**
     * Return Event Venue
     *
     * @return BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo(EventVenue::class, 'event_venue_id');
    }

    /**
     * Return Serviceperson Event Organisers
     *
     * @return BelongsToMany
     */

    public function servicepersonOrganisers()
    {
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_event_organiser');
    }

    /**
     * Return Serviceperson Event Organisers
     *
     * @return BelongsToMany
     */
    public function unitOrganisers()
    {
        return $this->belongsToMany(Unit::class, 'unit_event_organiser');
    }
}
