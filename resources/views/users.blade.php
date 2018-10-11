@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Other People</div>

                <div class="card-body">

                    <table>
                        <tr>
                            @foreach($users as $user)
                            <td><a href="/profile/{{$user->id}}">{{$user->name}}</a></td>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
