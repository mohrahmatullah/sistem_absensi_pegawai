@extends('admin.main')
@section('title', 'Absensi')
@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    @include('admin.partials.validate')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Absensi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="example1">
                <thead>
                <tr>

                    <th>Nik</th>
                    <th>Full Name</th>
                    <th>Datetime</th>
                    <th>In Out</th>
                    
                </tr>
                </thead>
                <tbody>

                @foreach($attendance as $e)
                    <tr>
                      <td>{{$e->nik}}</td>
                      <td>{{$e->first_name}} {{$e->last_name}}</td>
                      <td>{{$e->date_time}}</td>
                      <td>{{$e->in_out}}</td>
                    </tr>
                @endforeach
                </tbody>

              </table>
            </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection
@push('style')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
  <!-- https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css -->

@endpush
@push('scripts')
<!-- DataTables -->
<script src="{{asset('assets/admin')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable( {
        // dom: 'Bfrtip',
        dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>> <'row'<'col-sm-12'tr>> <'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
  })
</script>
<script type="text/javascript">
    var mousePosition;
    var offset = [0,0];
    var div = document.getElementById('myModal');
    var isDown = false;

    // div = document.createElement("div");
    // div.style.position = "absolute";
    // div.style.left = "0px";
    // div.style.top = "0px";
    // div.style.width = "100px";
    // div.style.height = "100px";
    // div.style.background = "red";
    // div.style.color = "blue";

    // document.body.appendChild(div);

    div.addEventListener('mousedown', function(e) {
        isDown = true;
        offset = [
            div.offsetLeft - e.clientX,
            div.offsetTop - e.clientY
        ];
    }, true);

    document.addEventListener('mouseup', function() {
        isDown = false;
    }, true);

    document.addEventListener('mousemove', function(event) {
        event.preventDefault();
        if (isDown) {
            mousePosition = {
        
                x : event.clientX,
                y : event.clientY
        
            };
            div.style.left = (mousePosition.x + offset[0]) + 'px';
            div.style.top  = (mousePosition.y + offset[1]) + 'px';
        }
    }, true);
</script>
@endpush