<?php

namespace App\Observers\Approval;

use App\Models\Authentication\User;
use App\Notifications\Approval\ModificationNotification;
use Approval\Models\Modification;
use Illuminate\Support\Facades\Notification;

class ModificationObserver
{
    /**
     * Handle the modification "update" event.
     *
     * @param Modification $modification
     * @return void
     */

    public function updated(Modification $modification)
    {
        $users = $this->modelApprovers($modification);
        Notification::send($users, new ModificationNotification($modification));
    }

    /**
     * Return the approvers
     *
     * @param $type
     * @param $modification
     * @return mixed
     */
    private function approvers($type, $modification)
    {
        if ($type = 'serviceperson'){
            $servicepersonCompanyId = $modification->modifier->serviceperson->currentUnit->company_id;
        }else{
            $servicepersonCompanyId = $modification->modifiable->serviceperson->currentUnit->company_id;
        }

        return User::permission('approve-' . $type)
            ->with('serviceperson.currentUnit')
            ->whereHas('serviceperson.currentUnit', function ($query) use ($servicepersonCompanyId) {
                $query->where('company_id', $servicepersonCompanyId);
            })
            ->get();
    }

    /**
     * return approvers for a specific model
     *
     * @param $modification
     * @return mixed|null
     */
    private function modelApprovers($modification)
    {
        $model = class_basename($modification->modifiable()->getRelated());

        switch ($model) {
            case 'ServicepersonCourse':
            case 'ServicepersonEducation':
                $approvers = $this->approvers('qualification', $modification);
                break;
            case 'Unit':
                $approvers = $this->approvers('unit', $modification);
                break;
            case 'Dependent':
                $approvers = $this->approvers('dependent', $modification);
                break;
            case 'Serviceperson':
                $approvers = $this->approvers('serviceperson', $modification);
                break;
            default:
                $approvers = null;
                break;
        }

        return $approvers;
    }


}
