@extends('layouts.mastertable')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Customers</h1>
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
          <div class="col-md-12">
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
                      <th scope="col">Status</th>
                      <th scope="col">Service Name</th>
                      <th scope="col">Service Price</th>
                      <th scope="col">Amount</th>                
                      <th scope="col">zip</th>
                      <th scope="col">city</th>                      
                      <th scope="col">state</th>   
                      <th scope="col">Account Number</th>
                      <th scope="col">EX#</th>
                      <th scope="col">Invoice#</th>
                      <th scope="col">Total Amount</th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($all_customers as $key => $customer)
                    <tr>
                      <th scope="row">{{++$key}}</th>
                      <td>{{$customer->name}}</td>
                      <th scope="col">{{$customer->email}}</th>                      
                      <th scope="col">{{$customer->phone}}</th>
                      <th scope="col"><span class="badge badge-primary">{{$customer->status}}</span></th>
                      <th scope="col">{{$customer->service_name}}</th>
                      <th scope="col">${{$customer->service_price}}</th>
                      <th scope="col">${{$customer->amount}}</th>
                      <th scope="col">{{$customer->zip}}</th>
                      <th scope="col">{{$customer->city}}</th>
                      <th scope="col">{{$customer->state}}</th>
                      <td>{{$customer->billing_account_number}}</td>
                      <td>{{$customer->EX}}</td>
                     
                      <td>{{$customer->Invoice}}</td>
                      <th scope="col"><span class="badge badge-secondary">${{$customer->total_amount}}</span></th>
                  
                    </tr> 
                    @endforeach                 
                  </tbody>
                  <tfoot>
                    <tr>
                      <th scope="col">Sr#</th>
                      <th scope="col">Name</th>                      
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Status</th>
                      <th scope="col">Service Name</th>
                      <th scope="col">Service Price</th>
                      <th scope="col">Amount</th>                
                      <th scope="col">zip</th>
                      <th scope="col">city</th>                      
                      <th scope="col">state</th>                       
                      <th scope="col">Account Number</th>
                      <th scope="col">EX#</th>
                      <th scope="col">Invoice#</th>
                      <th scope="col">Total Amount</th>
                      
                      
                    </tr>
                  </tfoot>
                </table>
                </div>
            </div>
          </div>
         
        </div>
      </div>

    </section>

  </div>

  @endsection