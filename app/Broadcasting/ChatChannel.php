<?php

namespace App\Broadcasting;

use App\Models\User;

class ChatChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param User $user
     * @param int $receiverId
     * @return array|bool
     */
    public function join(User $user, $receiverId)
    {
        return $user->id === (int)$receiverId;
    }
}
