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
              <form action="{{ $action == 'create' ? route($type.'.store') : route($type.'.update', $data->id)}}" enctype="multipart/form-data" method="POST">
                @if ($action == 'update')
                  @method('PUT')  
                @endif
                @csrf
                <div class="card-body">
                    <div class="row">
                        
                  @if ($type == 'company')    
                    <div class="form-group col-md-6">
                      <label for="nam">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="nam" placeholder="Enter Name" name="name" value="{{isset($data) ? $data->name : ''}}">
                      @error('name')
                          <span class="invalid-feedback"> {{ $message }} </span>
                      @enderror
                    </div>
                  @endif
                  @if ($type == 'employee')
                          
                    <div class="form-group col-md-6">
                      <label for="fnam">First Name</label>
                      <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="fnam" placeholder="Enter First Name" name="first_name" value="{{isset($data) ? $data->first_name : ''}}">
                      @error('first_name')
                          <span class="invalid-feedback"> {{ $message }} </span>
                      @enderror
                    </div>
                        
                    <div class="form-group col-md-6">
                      <label for="lnam">Last Name</label>
                      <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="lnam" placeholder="Enter Last Name" name="last_name" value="{{isset($data) ? $data->last_name : ''}}">
                      @error('last_name')
                          <span class="invalid-feedback"> {{ $message }} </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label for="pno">Phone Number</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" id="pno" placeholder="Enter Phone Number" name="phone" value="{{isset($data) ? $data->phone : ''}}">
                      @error('phone')
                          <span class="invalid-feedback"> {{ $message }} </span>
                      @enderror
                    </div>

                    <div class="form-group col-md-6">
                      <label>Company</label>
                      <select class="form-control select2  @error('company') is-invalid @enderror" name="company" style="width: 100%;">
                        @if ($action == 'create')
                          <option selected="selected" value="">- Select -</option>                          
                        @endif
                        @foreach ($companies as $company)
                            <option value={{$company->id}} @if($action == 'update' && $company->id == $data->company->id) selected='selected' @endif>{{$company->name}}</option>
                        @endforeach
                      </select>
                      @error('company')
                          <span class="invalid-feedback"> {{ $message }} </span>
                      @enderror
                    </div>
                  @endif

                  {{-- common field --}}
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" name="email"  value="{{isset($data) ? $data->email : ''}}">
                    @error('email')
                      <span class="invalid-feedback"> {{ $message }} </span>
                    @enderror
                  </div>
                  @if ($type == 'company')
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
                  @endif
                  
                  
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