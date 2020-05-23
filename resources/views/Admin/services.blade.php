@extends('layouts.mastertable')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Services Area</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
           
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header justify-content-center">
                    <h5 class="float-left">Services</h5>
                    @if(Session::has('msg'))                    
                    <div class=" float-right alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{Session::get('msg')}}

                    </div>
                    @endif

                    <div class="clear-fix"></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('addservice')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <div class="row justify-content-center">
                                <div class="col-md-4">

                                    <input type="text" name="name" class="form-control" placeholder="Enter Service Name">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="price" class="form-control" placeholder="Enter Service Cost">
                                </div>
                                 <div class="col-md-4">
                                    <button type="submit" class="btn btn-secondary">Add New Service</button>
                                </div>
                                
                            </div>
                        </div>
                    </form>

                <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Sr#</th>
                      <th scope="col">name</th>                      
                      <th scope="col">price</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($service as $key => $service)
                    <tr>
                      <td scope="row">{{++$key}}</th>
                      <td>{{$service->name}}</td>
                      <td>{{$service->price}}</td>
                      <td><a href="{{url('service/'. $service->id)}}"><i style="cursor: pointer;" class="fas fa-trash text-light"></i></a> | @include('Modals.editService')</td>


                      @endforeach
                    </tr>                  
                  </tbody>
                </table>
                </div>
            </div>
        </div>
       
    </div>
      </div>

    </section>

  </div>

  @endsection