@extends('layouts.app')

@section('content')
<style>
body{
  color: #fff;
  background-color: #24292f;
}
.form-group {
    margin-bottom: 5px;
}
.btn-perple {
    color: #fff;
    background-color: #9d3a95;
    border-color: #852b85;
}
.btn-perple:hover {
    color: #fff;
    background-color: #852b85;
    border-color: #852b85;
}
.panel-body {
    padding: 10px 25px;
}
.panel-default>.panel-heading {
    background-image: url({{url('assets/image/DVAwebregist_head.jpg')}});

}
.panel-heading {
    padding: 5px 5px;
}
.body-sign .line-thru {
    display: block;
    font-size: 12px;
    font-size: 1.2rem;
    position: relative;
}
.text-uppercase {
    text-transform: uppercase;
}
.ui.button {
  width: 100%;
  text-decoration: none;
    cursor: pointer;
    display: inline-block;
    min-height: 1em;
    outline: 0;
    border: none;
    background: #e0e1e2;
    color: #fff;
    margin: 0 .25em 0 0;
    padding: .78571429em 1.5em;
    text-shadow: none;
    font-weight: 700;
    line-height: 1em;
    font-style: normal;
    text-align: center;
    border-radius: .28571429rem;
    user-select: none;
    -webkit-transition: opacity .1s ease,background-color .1s ease,color .1s ease,box-shadow .1s ease,background .1s ease;
    transition: opacity .1s ease,background-color .1s ease,color .1s ease,box-shadow .1s ease,background .1s ease;
    will-change: '';
}
.ui.facebook.button {
    background-color: #3b5998;
    text-shadow: none;
}
hr {
    margin-top: 20px;
    margin-bottom: 5px;
    border: 0;
    border-top: 1px solid #eee;
}
.navbar-default {
    background-color: #080808;
    border-color: #484445;
}
.panel-default {
    border: none;
}
.panel-body {
    background-color: #545559;
}
@media (min-width: 1200px){
.container {
    width: 970px;
}
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #ccc;
    background-color: #24292f;
    background-image: none;
    border: 1px solid #000;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
select,
option:focus,
.uneditable-input:focus {
  border-color: rgba(154, 47, 146, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(154, 47, 146, 0.6);
  outline: 0 none;
}
select:active, select:hover ,  select:focus, option
 {
  border-color: rgba(154, 47, 146, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(154, 47, 146, 0.6);
  outline: 0 none;
}
.form-horizontal .form-group {
    margin-right: 5px;
    margin-left:5px;
}
label {
    font-size: 17px;
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label {
    color: #ff0500;
}
</style>
<div class="container" style="margin-top:30px;">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-default" >
              <img src="{{url('assets/image/DVAwebregist_head.jpg')}}" class="img-responsive">
                <div class="panel-body" style="margin-bottom: 40px;">

                    <form class="form-horizontal" role="form" name="teacher" method="POST" action="{{ url('/useraccount_register') }}" style="padding-bottom: 40px;">
                        {{ csrf_field() }}
                        <div class="row">

                          <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name_user') ? ' has-error' : '' }}">
                                <label  class=" control-label">Name</label>


                                    <input type="text" class="form-control" name="name_user" value="{{ old('name_user') }}">

                                    @if ($errors->has('name_user'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name_user') }}</strong>
                                        </span>
                                    @endif

                            </div>
                          </div>

                          <div class="col-md-6">
                        <div class="form-group{{ $errors->has('ser_name') ? ' has-error' : '' }}">
                            <label  class=" control-label">Surname</label>


                                <input type="text" class="form-control" name="ser_name" value="{{ old('ser_name') }}">

                                @if ($errors->has('ser_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ser_name') }}</strong>
                                    </span>
                                @endif

                        </div>
                        </div>



                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('position_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">Position</label>


                                <input  type="text" class="form-control" name="position_user" value="{{ old('position_user') }}">

                                @if ($errors->has('position_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position_user') }}</strong>
                                    </span>
                                @endif

                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('company_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">Company</label>


                                <input  type="text" class="form-control" name="company_user" value="{{ old('company_user') }}">

                                @if ($errors->has('company_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_user') }}</strong>
                                    </span>
                                @endif

                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">Email</label>


                                <input  type="email" class="form-control" name="email_user" value="{{ old('email_user') }}">

                                @if ($errors->has('email_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_user') }}</strong>
                                    </span>
                                @endif

                        </div>
                        </div>



                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('group_user') ? ' has-error' : '' }}">
                            <label class=" control-label">Type of Participants</label>


                            <select class="form-control" name="group_user">
                            <option value="">--Please select--</option>
                            @foreach($objs as $obj)
                            <option value="{{$obj->id}}">{{$obj->group_name}}</option>
                            @endforeach
                            </select>

                                @if ($errors->has('group_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group_user') }}</strong>
                                    </span>
                                @endif

                        </div>
                        </div>








                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('phone_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">Mobile Phone No.</label>


                                <input type="text" class="form-control" name="phone_user" value="{{ old('phone_user') }}">

                                @if ($errors->has('phone_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_user') }}</strong>
                                    </span>
                                @endif

                        </div>
                        </div>



                        <div class="col-md-6">
                        <div class="form-group" style="margin-top:30px;">

                                <button type="submit" class="btn btn-perple btn-block">
                                    <i class="fa fa-btn fa-user"></i>REGISTER NOW
                                </button>

                        </div>
                        </div>
<br><br>


                        </div>
                    </form>
                </div>
            </div>
            <div><a href="http://www.dv.co.th/DVA/DemoDay/"><img src="http://www.dvregister.com/assets/image/digital_venture_logo2.png" class="img-responsive" style="height:80px; margin:0 auto"></a></div>
            <br>
            <p class="text-center"><a href="http://www.dv.co.th/DVA/DemoDay/" target="_blank" style="
    text-decoration: none;
    color: #fff;
">Full agenda at www.dv.co.th/DVA/DemoDay</a></p>
            <br><br>

        </div>


    </div>
</div>
@endsection
