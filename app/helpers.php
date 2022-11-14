<?php
use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;

if (!function_exists('notifications')) {
    function notifications()
    {
        $notifications = auth()->user();
        if (isset($notifications)) {
            return $notifications;
        } else {
            return false;
        }
    }
}
if (!function_exists('notification_count')) {

    function notification_count()
    {
        $notifications = \App\Models\Notification::where('read_at', null)->where('id','!=',1)->count();

        if ($notifications) {
            return $notifications;
        }

    }
}





