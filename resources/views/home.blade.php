@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Billers Area</h5>
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

                    <form action="{{route('add_biller')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" name="biller" class="form-control">
                                </div>
                                 <div class="col-md-6">
                                    <a href="{{route('add_biller')}}"><button type="submit" class="btn btn-secondary">Add New Biller</button></a>
                                </div>
                                
                            </div>
                        </div>
                    </form>

                <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Sr#</th>
                      <th scope="col">Biller</th>                      
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($all_biller as $key => $biller)
                    <tr>
                      <th scope="row">{{++$key}}</th>
                      <td>{{$biller->biller}}</td>
                     
                      <td><a href="{{url('biller/'. $biller->id)}}"><button class="btn btn-warning">Delete</button></a></td>

                      @endforeach
                    </tr>                  
                  </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Payers</div>

                <div class="card-body">
                   
                <table id="example1" class="table table-bordered table-striped">
               
                  <thead>
                    <tr>
                      <th scope="col">Sr#</th>
                      <th scope="col">Name</th>                      
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Zipcode</th>                       
                      <th scope="col">Account Number</th>
                      <th scope="col">EX#</th>
                      <th scope="col">Invoice#</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($all_payer as $key => $payer)
                    <tr>
                      <th scope="row">{{++$key}}</th>
                      <td>{{$payer->name}}</td>
                      <th scope="col">{{$payer->email}}</th>                      
                      <th scope="col">{{$payer->phone}}</th>
                      <th scope="col">{{$payer->zipcode}}</th>
                      <td>{{$payer->billing_account_number}}</td>
                      <td>{{$payer->EX}}</td>
                      <td>{{$payer->Invoice}}</td>
                    </tr> 
                    @endforeach                 
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
