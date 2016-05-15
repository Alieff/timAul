@extends('layouts.adminpage')

@section('bodycontent')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h5>You are logged in!</h5></div>

                <div class="panel-body">
                    <a href="admin/dashboard" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i>  Continue to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
