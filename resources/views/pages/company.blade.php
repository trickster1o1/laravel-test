@extends('welcome')
@section('content')
    <div class="content-wrapper pt-2">
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <a class="btn btn-secondary mr-2" title="Add" href="{{Route('company.create')}}">+</a>Companies</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th style="width:5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$companies)
                                            <span>No Company Registered Yet!</span>
                                        @else
                                            @foreach ($companies as $company)
                                                <tr>
                                                    <td>{{$company->name}}</td>
                                                    <td><a class="btn btn-primary" title="Update" href="{{Route('company.edit', $company->id)}}">U</a>
                                                    <button class="btn btn-danger" title="Delete">D</button></td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

        </section>
    </div>
@endsection