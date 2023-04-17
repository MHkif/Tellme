<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\Room;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\CallingNotification;

class NotificationController extends Controller
{
    public function notifyUser(Request $request)
    {
        $sender = User::find($request->sender);
        $receiver =  User::find($request->receiver);
        $room = new Room;
        $room->user_id = $sender->id;
        $room->save();
        $roomId = $room->id;
        $username = $sender->last_name;

        if ($receiver->id != $sender->id) {
            $receiver->notify(new CallingNotification($sender, $receiver, $room));
        }

        return response()->json(['success']);
    }

    public function callNotify(Request $request)
    {
        try {
            $sender = User::find($request->sender);
            $receiver =  User::find($request->receiver);
            $room = new Room;
            $room->user_id = $sender->id;
            $room->save();
            $roomId = $room->id;
            $username = $sender->last_name;
            Notification::create([
                'sender' => $sender->id,
                'receiver' => $receiver->id,
                'room_id' => $roomId,
                'type' => 'call',
                'content' =>  $username . " has been called you"
            ]);
            // $room->paricipants()->attach($user->id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function notifications(Request $request)
    {
        $user = User::find($request->id);

        if ($user) {

            return response()->json([
                'success',
                'data' => $user->unreadNotifications
            ]);
        } else {
            return response()->json([

                'error' => 'user not found'
            ]);
        }
    }
}
