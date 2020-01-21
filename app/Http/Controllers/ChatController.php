<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $friends = auth()->user()->friends();
        return view('chat.index')->withFriends($friends);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendChat(Request $request)
    {
        Chat::create([
            'user_id' => request('user_id'),
            'friend_id' => request('friend_id'),
            'chat' => request('chat')
        ]);

        return response([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = User::find($id);
        return view('chat.show')->withFriend($friend);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }



    public function getChat($id)
    {
        $chats = Chat::where(function ($query) use ($id) {

            $query->where('user_id', '=', auth()->id())
                ->where('friend_id', '=', $id);
        })->orWhere(function ($query) use ($id) {

            $query->where('user_id', '=', $id)
                ->where('friend_id', '=', auth()->id());
        })->get();

        return $chats;
    }
}
