@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-marginless is-centered">
        <div class="column is-7">
            <nav class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Home Dashboard
                    </p>
                </header>

                <div class="card-content">
                    <a href="{{ url('/chat') }}"> Start Chat </a>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
