@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="column is-8 is-offset-2">
        <div class="panel">
            <div class="panel-heading">
                Add Freinds
            </div>
            <div class="panel-block">

                <form action="{{ route('friend.add') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Add An Email...">
                    <button class="button is-primary" type="submit">submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
