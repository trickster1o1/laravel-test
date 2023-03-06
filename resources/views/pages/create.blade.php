@extends('welcome')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-2">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ $action == 'create' ? route('company.store') : route('company.update', $data->id)}}" enctype="multipart/form-data" method="POST">
                @if ($action == 'update')
                  @method('PUT')  
                @endif
                @csrf
                <div class="card-body">
                    <div class="row">
                        
                  <div class="form-group col-md-6">
                    <label for="nam">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nam" placeholder="Enter Name" name="name" value="{{isset($data) ? $data->name : ''}}">
                    @error('name')
                        <span class="invalid-feedback"> {{ $message }} </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email"  value="{{isset($data) ? $data->email : ''}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="logo"  value="{{isset($data) ? $data->logo : ''}}">
                        <label class="custom-file-label" for="exampleInputFile">{{isset($data) ? $data->logo : '...'}}</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Website</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="example:https::\\www.something.com"  name="website" value="{{isset($data) ? $data->website : ''}}">
                  </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection