@extends('admin.main')
@section('title', 'Employees')
@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    @include('admin.partials.validate')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Employees</h3>

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

                    <th>Index</th>
                    <th>Full Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $e)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$e->fullname}}</td>
                      <td><a href="#" data-toggle="modal" data-target="#myModal{{$loop->iteration}}">{{ isset($e->company) ? $e->company->name : ''}}</a></td>
                      <td>{{$e->email}}</td>
                      <td>{{$e->phone}}</td>
                      <td>
                        <a href="#" class="btn btn-success" onclick="edit_item( <?= $e->id ?> ,'employees_list');">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="deleted_item( <?= $e->id ?> ,'employees_list');">Delete
                        </a>
                      </td>                   
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal{{$loop->iteration}}" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Detail Company</h4>
                          </div>
                          <div class="modal-body">
                              <div class="box-body">
                                <div class="list-group">
                                  <div class="list-group-item">
                                    <h4 class="list-group-item-heading">Company name</h4>
                                    <p class="list-group-item-text">{{ isset($e->company) ? $e->company->name : ''}}</p>
                                  </div>
                                </div>
                                <div class="list-group">
                                  <div class="list-group-item">
                                    <h4 class="list-group-item-heading">Email</h4>
                                    <p class="list-group-item-text">{{ isset($e->company) ? $e->company->email : ''}}</p>
                                  </div>
                                </div>
                                <div class="list-group">
                                  <div class="list-group-item">
                                    <h4 class="list-group-item-heading">Logo</h4>
                                    <p class="list-group-item-text">
                                      @if(isset($e->company))
                                      <img class="media-object" src="{{url('/').'/storage/'.$e->company->logo }}" width="75px" height="75px">
                                      @else
                                      @endif
                                    </p>
                                  </div>
                                </div>
                                <div class="list-group">
                                  <div class="list-group-item">
                                    <h4 class="list-group-item-heading">Website</h4>
                                    <p class="list-group-item-text">
                                      @if(isset($e->company))
                                      <a href="{{$e->company->website}}" target="_blank">{{$e->company->website}}</a>
                                      @else
                                      @endif
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          
                        </div>
                        
                      </div>
                    </div>
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <form action="{{route('admin.employees.update')}}" method="post">
          {{csrf_field()}}
          {{method_field('POST')}}
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nik</label>
                <input type="name" name="nik" class="form-control" id="nik" placeholder="Enter Nik">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">First name</label>
                <input type="hidden" name="id" class="form-control" id="id">
                <input type="name" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Last name</label>
                <input type="name" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Company</label>
                <select name="company_id" id="company_id" class="form-control selectpicker">
                  @foreach($company as $c)
                  <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
                <!-- <input type="name" name="company" class="form-control" id="company" placeholder="Enter Company"> -->
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="name" name="phone" class="form-control" id="phone" placeholder="Phone">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="name" name="address" class="form-control" id="address" placeholder="address">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
        
      </div>
      
    </div>
  </div>
@endsection
@push('style')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush
@push('scripts')
<!-- DataTables -->
<script src="{{asset('assets/admin')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
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