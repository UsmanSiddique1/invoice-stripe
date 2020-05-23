<i style="cursor: pointer;" class="fas fa-user-edit" data-toggle="modal" data-target="#needyedit-{{$service->id}}"></i>

<div class="modal fade" id="needyedit-{{$service->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-dark">Edit Service <strong>{{$service->name}}</strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form action="{{route('update_service')}}" method="post">
                        @csrf
                        <input type="text" name="id" value="{{$service->id}}" hidden="">
                            <div class="form-group">
                                <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <label class="text-dark">Service Name</label>
                                    <input type="text" name="name" placeholder="{{$service->name}}" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label class="text-dark">Cost</label>
                                    <input type="text" name="price" placeholder="{{$service->price}}" class="form-control">
                                </div>
                                
                                
                            </div>
                        </div>
                    
             
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update Service</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>