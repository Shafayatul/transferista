<?php

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

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('location', function ($employee, $id) {
    return true;
});
Broadcast::channel('positions', function () {
    return true;
});


Broadcast::channel('chat.{id}', function ($id){
    $bid = \App\Bid::where('project_id',$id)->where('bid_status',1)->first();
    if($bid){
        return  true;
    } else{
        return false;
    }
});
