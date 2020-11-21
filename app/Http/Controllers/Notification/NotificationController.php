<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Authentication\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{


    /**
     * mark notification as unread
     *
     * @param $id
     * @return RedirectResponse
     */
    public function readAll($id){
        $user = User::find($id);
        $user->unreadNotifications->markAsRead();
        return redirect()->back()->with('success', 'Notifications Read');
    }

    /**
     * Delete user notification
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->notifications()->delete();
        return redirect()->back()->with('success', 'Notifications Removed');
    }

}
