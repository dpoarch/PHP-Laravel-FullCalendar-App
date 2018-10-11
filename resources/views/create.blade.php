@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create New Event</div>

                <div class="card-body">
                    @if (isset($success))
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> New event has been created.
                        </div>
                    @endif

                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Event Title</label>
                            <input type="text" class="form-control" name="title"></input>
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" class="form-control" name="start"></input>
                        </div>

                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" class="form-control" name="end"></input>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Event"></input>
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
