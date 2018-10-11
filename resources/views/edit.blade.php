@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update Event</div>

                <div class="card-body">
                    @if (isset($success))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/update" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id }}"></input>
                        <div class="form-group">
                            <a href="/delete/{{ $event->id }}" class="btn btn-danger">Delete this Event</a>
                        </div>
                        <div class="form-group">
                            <label>Event Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $event->title }}"></input>
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" class="form-control" name="start" value="{{ $event->start_date }}"></input>
                        </div>

                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" class="form-control" name="end" value="{{ $event->end_date }}"></input>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update"></input>
                            <a href="/" class="btn btn-danger">Return</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function(){
        $("input[name=start], input[name=end]").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>
@endsection
