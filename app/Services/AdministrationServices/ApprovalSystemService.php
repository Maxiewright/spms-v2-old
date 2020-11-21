<?php


namespace App\Services\AdministrationServices;


use App\Models\Authentication\User;
use Approval\Models\Modification;

class ApprovalSystemService
{

    public static function approveModification($userId, $modificationId)
    {
        $user = User::find($userId);
        $modification = Modification::where('id', $modificationId)->first();
        $user->approve($modification);
    }

    public static function disapproveModification($userId, $modificationId)
    {
        $user = User::find($userId);
        $modification = Modification::where('id', $modificationId)->first();
        $user->disapprove($modification);
    }
}
