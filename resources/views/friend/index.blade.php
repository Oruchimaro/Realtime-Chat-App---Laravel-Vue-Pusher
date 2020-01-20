@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="column is-8 is-offset-2">
        <div class="panel">
            <div class="panel-heading">
                My Freinds
            </div>
            @forelse ($friends as $friend)
            <div class="panel-block">
                {{ $friend->name }}
            </div>
            @empty
            <div class="panel-block">
                You are alone !!!
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
