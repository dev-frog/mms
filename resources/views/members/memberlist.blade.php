@extends('layouts.app')

@section('content')

<div class="row">
    <div class="card col-lg-12">
        <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered data-table" id="member-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Card Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</div>


@if(session()->has('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    Success Point has been added to the databases.
</div>
@endif

@if(session()->has('failed'))
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-ban"></i> Alert!</h4>
There is error, Point is not added to  databases;
</div>
@endif










  <div class="modal fade" id="modal-default" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">

                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form class="" action="{{ route('point_store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="member_id" class="">Member ID</label>
                                                    <input name="member_id" id="member_id" placeholder="Member Id" type="nuumber" class="mb-2 form-control-lg form-control" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="shopping" class="">Shopping Amount</label>
                                                    <input name="shopping" id="shopping" placeholder="Shopping Amount" type="nuumber" class="mb-2 form-control-lg form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="point" class="">Point </label>
                                                    <p name="point" id="point" placeholder="Shopping Amount"  type="number" class="mb-2 form-control-lg form-control"></p>
                                                </div>
                                            </div>
                                        </div>


                                        <button name="submit" id="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block custom-submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
        </div>

    </div>
  </div>





<script type="text/javascript">


       $('#member-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('memberlist') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'first_name', name: 'first_name'},
              {data: 'last_name', name: 'last_name'},
              {data: 'phone_number', name: 'phone_number'},
              {data: 'email', name: 'email'},
              {data: 'card_number', name: 'card_number'},
              {data: 'action', name:'action',
              orderable: true,
              searchable: true},
          ]
      });
    //   editButton


    $(document).on('click','.editButton',function(e){
        var userID = $(this).attr("data-id");
        $("#member_id").val(userID);
    });



    $('#shopping').change(function() {
        var paid_to_you = $(this).val();
        if(paid_to_you > 0){
            paid_to_you = parseInt(paid_to_you);
            var mf = paid_to_you/100;
            $('#point').text(Math.floor(mf));
            // $('#total_fee').text(mf + paid_to_you);
        }
    });






  </script>








@endsection


