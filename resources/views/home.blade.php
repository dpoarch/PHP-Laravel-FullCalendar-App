@extends('layouts.app')

@section('style')
<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}"/>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/create" class="btn btn-primary" style="margin-bottom: 20px;">Create new Event</a>
            <a href="/users" class="btn btn-success" style="margin-bottom: 20px;">View other users schedule</a>
            <div class="card">
                <div class="card-header">Events</div>
                @if (isset($success))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> Event has been deleted.
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="calendar">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
{!! $calendar->script() !!}
@endsection