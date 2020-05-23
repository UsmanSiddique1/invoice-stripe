<i style="cursor: pointer;" class="fas fa-user-edit" data-toggle="modal" data-target="#needyedit-{{$biller->id}}"></i>

<div class="modal fade" id="needyedit-{{$biller->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Biller <strong>{{$biller->name}}</strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form action="{{route('update_biller')}}" method="post">
                        @csrf
                        <input type="text" name="id" value="{{$biller->id}}" hidden="">
                            <div class="form-group">
                                <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <label class="text-dark">Biller Name</label>
                                    <input type="text" name="biller" placeholder="{{$biller->biller}}" class="form-control">
                                </div>
                                
                                
                            </div>
                        </div>
                    
             
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update Needy</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>