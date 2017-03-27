@extends('layouts.app')

@section('content')
<style>
body{
  background-color: #24292f;
}
.form-group {
    margin-bottom: 5px;
}
.btn-perple {
    color: #fff;
    background-color: #9857c7;
    border-color: #7a2bb3;
}
.btn-perple:hover {
    color: #fff;
    background-color: #b787da;
    border-color: #7a2bb3;
}
.panel-body {
    padding: 10px 25px;
}
.panel-default>.panel-heading {
    background-image: url({{url('assets/image/17554834_1772523896094679_941988071_n.png')}});

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
</style>
<div class="container" style="margin-top:30px;">
    <div class="row">


        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" >
              <div class="panel-heading">

                <div class="row-fluid user-row">

                <img src="{{url('assets/image/17554834_1772523896094679_941988071_n.png')}}" class="img-responsive imgpicture">

                </div>
              </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" name="teacher" method="POST" action="{{ url('/useraccount_register') }}">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                        <div class="form-group{{ $errors->has('name_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">ชื่อ</label>


                                <input type="text" class="form-control" name="name_user" value="{{ old('name_user') }}">

                                @if ($errors->has('name_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_user') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group{{ $errors->has('ser_name') ? ' has-error' : '' }}">
                            <label  class=" control-label">นามสกุล</label>


                                <input type="text" class="form-control" name="ser_name" value="{{ old('ser_name') }}">

                                @if ($errors->has('ser_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ser_name') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group{{ $errors->has('email_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">Email Addess</label>


                                <input  type="email" class="form-control" name="email_user" value="{{ old('email_user') }}">

                                @if ($errors->has('email_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_user') }}</strong>
                                    </span>
                                @endif

                        </div>




                        <div class="form-group{{ $errors->has('phone_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">mobile phone</label>


                                <input type="text" class="form-control" name="phone_user" value="{{ old('phone_user') }}">

                                @if ($errors->has('phone_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_user') }}</strong>
                                    </span>
                                @endif

                        </div>


                        <div class="form-group{{ $errors->has('position_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">ตำแหน่ง</label>


                                <input  type="text" class="form-control" name="position_user" value="{{ old('position_user') }}">

                                @if ($errors->has('position_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position_user') }}</strong>
                                    </span>
                                @endif

                        </div>


                        <div class="form-group{{ $errors->has('company_user') ? ' has-error' : '' }}">
                            <label  class=" control-label">บริษัท</label>


                                <input  type="text" class="form-control" name="company_user" value="{{ old('company_user') }}">

                                @if ($errors->has('company_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_user') }}</strong>
                                    </span>
                                @endif

                        </div>



                        <div class="form-group{{ $errors->has('group_user') ? ' has-error' : '' }}">
                            <label class=" control-label">กลุ่มลงทะเบียน</label>


                            <select class="form-control" name="group_user">
                            <option value="">--เลือกกลุ่มลงทะเบียน--</option>
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




                        <div class="form-group" style="margin-top:10px;">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-perple">
                                    <i class="fa fa-btn fa-user"></i>ลงทะเบียน
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
