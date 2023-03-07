@extends('welcome')
@section('title')
    - Employee
@endsection
@section('content')
    <div class="content-wrapper pt-2">
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <a class="btn btn-secondary mr-2" title="Add" href="{{Route('employee.create')}}">+</a>Employees</h3>

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
                                            <th>Company</th>
                                            <th style="width:5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!count($employees))
                                            <tr><td colspan="100%" align="center">No Company Registered Yet!</td></tr>
                                        @else
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                                    <td>{{$employee->company->name}}</td>
                                                    <td>
                                                        <a class="btn btn-primary" title="Update" href="{{Route('employee.edit', $employee->id)}}"><i class="fas fa-edit"></i></a>
                                                        <form action="{{route('employee.destroy', $employee->id)}}" method="POST" style="display:inline-block;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
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
