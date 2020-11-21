<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Serviceperson\Serviceperson;
use Approval\Traits\RequiresApproval;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Support\Collection;

trait MustBeApproved
{
    use RequiresApproval, HasEvents;

    /**
     * Boot the RequiresApproval trait. Listen for events and perform logic.
     *
     * Overwritten from RequiresApproval Tait to ensure the model is saved first
     * because images are attached
     *
     */

    public static function bootRequiresApproval()
    {
        static::created(function ($item) {
            return self::captureModified($item);
        });

        static::updating(function ($item) {
            return self::captureModified($item);
        });
    }

    /**
     * Capture the modifications
     *
     * @param $item
     * @return bool
     */
    private static function captureModified($item)
    {
        if (!$item->isForcedApprovalUpdate() && $item->requiresApprovalWhen($item->getDirty()) === true) {
            return self::captureSave($item);
        }

        $item->setForcedApprovalUpdate(false);

        return true;
    }

    /**
     * Function that defines the rule of when an approval process
     * should be actioned for this model.
     *
     * @param array $modifications
     *
     * @return boolean
     */
    protected function requiresApprovalWhen(array $modifications): bool
    {
        if ($this->isDirty()) {
            return true;
        }
        return false;
    }

    /**
     * Get Modifications Array
     *
     * @return HigherOrderBuilderProxy|mixed
     */
    public function getModsAttribute()
    {
        return $this->modifications()->first()->modifications;
    }

    /**
     * Determine if item was just created
     *
     * @return bool
     */
    public function isCreation(): bool
    {
        if ($this->modifications()->exists()) {
            foreach ($this->mods as $mod) {
                if ($mod['original'] == null) {
                    return true;
                }
            }
        }
        return false;
    }


    public function statement($class)
    {
        if ($this->whereInstanceOf($class) == true) {
            return [
                'number' => $this->mods['number']['modified'],
                'first name' => $this->mods['first_name']['modified'],
                'middle_name' => $this->mods['middle_name']['modified'],
                'last_name' => $this->mods['last_name']['modified'],
                'other_names' => $this->mods['other_names']['modified'],
                'marital_status' => maritalStatus($this->mods['marital_status_id']['modified']),
                'ethnicity' => ethnicity($this->mods['ethnicity_id']['modified']),
                'religion' => religion($this->mods['religion_id']['modified']),
            ];
        } elseif ($this->whereInstanceOf(Serviceperson::class) == true) {
            dd('that is not true');
        }
    }

    /**
     * returns a collection of modified attributes
     *
     * @param array $details
     * @return Collection
     */
    public function modificationDetails(array $details)
    {
        return collect(
            (object) $details
        );
    }

    /**
     * Returns the modification attribute for the models
     *
     * @param string $index
     * @param null $helper
     * @param null $date
     * @return object
     * @throws Exception
     */

    public function modificationAttribute(string $index, $helper = null, $date = null)
    {
        $original = isset($this->mods[$index]['original']) ? $this->mods[$index]['original'] : '';
        $modified = isset($this->mods[$index]['modified']) ? $this->mods[$index]['modified'] : '';

        if (isset($helper)) {
            return (object) [
                'original' => isset($this->mods[$index]['original']) ? $helper($original) : '',
                'modified' => isset($this->mods[$index]['modified']) ? $helper($modified) : ''
            ];
        } elseif (isset($date))
            return (object)[
                'original' => isset($original) ? (new Carbon($original))->format('d M Y') : '',
                'modified' => isset($modified) ? (new Carbon($modified))->format('d M Y') : ''
            ];
        else {
            return (object)[
                'original' => $original,
                'modified' => $modified,
            ];
        }
    }

}
