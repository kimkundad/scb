@extends('admin.layouts.template')
@section('admin.stylesheet')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />

<style>
.dataTables_wrapper .dataTables_filter input {
  margin-right: 10px;
  min-width: 120px;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
  -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.dataTables_wrapper .dataTables_filter {
        float: none;
        margin-right: 10px;
    text-align: right;
}
</style>
@stop('admin.stylesheet')
@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="dashboard.html">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">
              <div class="row">
              <div class="col-xs-12">

            <section class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>

                </div>

                <h2 class="panel-title">{{$datahead}}</h2>
              </header>
              <div class="panel-body">



                <div class="table-responsive">
                <table id="example" class="display  table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>QR</th>
                      <th>ชื่อ-นามสกุล</th>
                      <th>อีเมล</th>
                      <th>เบอร์โทร</ht>
                      <th>กลุ่ม</th>
                      <th>ตำแหน่ง</th>
                      <th>บริษัท</th>
                      <th>วันที่สมัคร</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($objs)
                @foreach($objs as $u)
                    <tr>
                      <td>{{$u->Qid}}</td>
                      <td>{{$u->name_user}} {{$u->ser_name}}</td>
                      <td><?=mb_substr(strip_tags($u->email_user),0,32,'UTF-8')?>..</td>
                      <td><?=mb_substr(strip_tags($u->phone_user),0,10,'UTF-8')?></td>
                      <td>{{$u->group_name}}</td>
                      <td>{{$u->position_user}}</td>
                      <td>{{$u->company_user}}</td>
                      <td>{{$u->created_at}}</td>


                      <td>

                        @if($u->status_user == 0)
                          <a type="button" style="float:left; margin-right:3px; margin-top:0px;" class="btn btn-danger btn-xs"><i class="fa fa-frown-o "></i></a>
                          @elseif($u->status_user == 1)
                           <a type="button" style="float:left; margin-right:3px; margin-top:0px;" class="btn btn-success btn-xs"><i class="fa fa-star"></i></a>
                             @else
                             <a type="button" style="float:left; margin-right:3px; margin-top:0px;" class="btn btn-warning btn-xs"><i class="fa fa-meh-o"></i></a>
                             @endif

                        <a style="float:left; margin-right:8px; " class="btn btn-success btn-xs " target="_blank"
                             download="{{$u->qrcode}}.jpg" href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($u->Qid)) !!}"
                             role="button"><i class="fa fa-download"></i> </a>


                        <a style="float:left; margin-right:8px;" class="btn btn-primary btn-xs"
                        href="{{url('admin/user/'.$u->Aid.'/edit')}}" role="button"><i class="fa fa-wrench"></i> </a>

                          <form  action="{{url('admin/user/'.$u->Aid)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                            <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times "></i></button>
                          </form>



                      </td>


                      </tr>
                       @endforeach
              @endif

                  </tbody>
                </table>
                </div>

              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>

@if ($message = Session::get('success'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

@stop('scripts')
