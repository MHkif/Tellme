<?php

namespace App\Notifications;

use App\Models\Room;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class CallingNotification extends Notification implements ShouldBroadcast
{
    use Queueable;
    protected $sender;
    protected $receiver;
    protected $room;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $sender, User $receiver, Room $room)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->room = $room;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'sender' => $this->sender,
            'receiver' => $this->receiver,
            'room_id' => $this->room,
        ];
    }

    public function toBroadcast($notifiable)
    {
        $notification = [
            "data" =>  [
                "sender" => $this->sender,
                "receiver" => $this->receiver,
                "room" => $this->room,
                "sender_id" => $this->sender->id,
                "sender_name" => $this->sender->last_name,
                "receiver_name" => $this->receiver->last_name,
                "room_id" => $this->room->id
            ]
        ];
        return new BroadcastMessage([
            'notification' => $notification
        ]);
    }
}
