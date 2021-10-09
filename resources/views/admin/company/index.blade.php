@extends('admin.main')
@section('title', 'Company')
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    @include('admin.partials.validate')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Company</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th>Index</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>

                @foreach($company as $c)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->email}}</td>
                    <td><img src="{{url('/').'/storage/'.$c->logo }}" width="75px" height="75px"></td>
                    <td><a href="{{$c->website}}" target="_blank">{{$c->website}}</a></td>
                    <td>
                      <a href="#" class="btn btn-success" onclick="edit_item( <?= $c->id ?> ,'company_list');">Edit</a>
                      <a href="#" class="btn btn-danger" onclick="deleted_item( <?= $c->id ?> ,'company_list');">Delete
                      </a>
                    </td>
                   
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="6" style="text-align: right;">
                      {{ $company->links() }}
                    </td>
                  </tr>
                </tfoot>
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
        <form action="{{route('admin.company.update')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          {{method_field('POST')}}
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="hidden" name="id" class="form-control" id="id">
                <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
              </div>
              <!-- <div class="form-group">
                <label for="exampleInputEmail1">Logo</label>
                <div class="custom-file">
                  <input type="file" name="logo" class="custom-file-input" id="logo" aria-describedby="inputGroupFileAddon01" value="hfduh.jpg">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>  --> 
              <div class="form-group">
                <label>Logo</label> 
                <div class="row">
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="logo" id="hf_cms_covergal_picture" value="">
                  </div>
                  <div class="col-lg-6">
                    <div class="uploadform dropzone no-margin dz-clickable upload-gallery-cover" id="gallery_cover_uploader" name="gallery_cover_uploader" style="max-height: auto; min-height: auto; border: 1px solid rgba(0, 0, 0, 0.11); background: white; padding: 0px 0px;">
                      <div class="dz-default dz-message" style="margin: 6px 0;">
                        <span><i class="glyphicon glyphicon-upload"></i></span>
                      </div>            
                    </div>    
                    <div class="gallery-cover-picture text-center" style="display:none;">
                        <div class="img-div"><img src="" class="user-image" alt="" style="width: 46%;" /></div><br>
                        <div class="btn-div"><button type="button" class="btn btn-danger remove-gallery-cover">Remove image</button></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Website</label>
                <input type="name" name="website" class="form-control" id="website" placeholder="Website">
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