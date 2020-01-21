@extends ('layouts.app')
@section ('head')
<meta name="friendId" content="{{ $friend->id }}">
@endsection
@section ('content')
<div class="container">
    <div class="column is-8 is-offset-2">
        <div class="panel">
            <div class="panel-heading">
                {{ $friend->name }}
                <div class="contain is-pulled-right">
                    <a href="{{ route('chat.index') }}" class="is-link">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
                <chat :chats="chats" :userid="{{ auth()->id() }}" :friendid="{{ $friend->id }}"></chat>
            </div>
        </div>
    </div>
</div>
@endsection
