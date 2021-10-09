@extends('admin.main')
@section('title', 'Company Create')
@section('content')

<div class="content-wrapper">       
 
  <!-- Main content -->
  <section class="content">
    @include('admin.partials.validate')


    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Company Create</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
      <form action="{{route('admin.company.store')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('POST')}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <!-- <div class="form-group">
            <label for="product_nama">logo</label>
            <div class="custom-file">
              <input type="file" name="logo" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div> -->
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
            <input type="name" name="website" class="form-control" id="exampleInputEmail1" placeholder="Enter Website">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>          
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

@endsection
