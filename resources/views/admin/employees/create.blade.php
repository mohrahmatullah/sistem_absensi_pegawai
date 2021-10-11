@extends('admin.main')
@section('title', 'Employees Create')
@section('content')

<div class="content-wrapper">       
 
  <!-- Main content -->
  <section class="content">
    @include('admin.partials.validate')


    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Employees Create</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
      <form action="{{route('admin.employees.store')}}" method="post">
      {{csrf_field()}}
      {{method_field('POST')}}
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nik</label>
                <input type="name" name="nik" class="form-control" id="exampleInputEmail1" placeholder="Enter Nik">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">First name</label>
                <input type="name" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Last name</label>
                <input type="name" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Company</label>
                <select name="company_id" class="form-control selectpicker">
                  @foreach($company as $c)
                  <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
                <!-- <input type="name" name="company" class="form-control" id="exampleInputEmail1" placeholder="Enter Company"> -->
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="name" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="name" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
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
