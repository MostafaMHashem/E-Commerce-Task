<?php

use App\Models\Order;
use App\Models\User\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel(
    'orders.{order}',
    function (User $user,Order $order): bool {
    return (int) $user->id === (int) $order->user_id;
});
