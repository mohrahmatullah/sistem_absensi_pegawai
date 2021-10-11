@extends('frontend.main')
@section('title', 'Home')
@section('content')

<div class="container">
  <div class="row mt-5">
    <div class="col-lg-3">
      
    </div>
    <div class="col-lg-6">
      @include('frontend.partials.validate')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      
    </div>
    <div class="col-lg-6">
      <form class="mt-5 border border-secondary" style="padding: 25px 26px;" action="{{route('create')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">NIK</label>
          <select class="form-select" aria-label="Default select example" name="nik">
            <option selected>Select</option>
            @foreach($employees as $e)
            <option value="{{ $e->nik }}">{{ $e->nik }} - {{ $e->first_name }} {{ $e->last_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Real time</label><br>
          <label for="exampleFormControlInput1" class="form-label">{{ date('Y-m-d H:i:s', strtotime('now')) }}</label>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Enter</button>
      </form>
    </div>
  </div>
  
</div>

@endsection