@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3 col-12">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ count($total_users) }}</h3>

              <p>Total Member</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('memberlist') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-md-offset-2 col-12 right">
                <div class="box-body">
                  <div class="form-group input-group input-group-sm ">
                      <input type="text" id="user_data" data-id="user_id" class="form-control custom-input">
                      <span class="input-group-btn">
                           <button data-toggle="modal" id="onSubmit" data-target="#add_point" type="submit" class="btn btn-info  bg-green user_btn btn-lg custom-add-member-button">Add Point</button>
                      </span>


                      <span class="input-group-btn">
                        <button data-toggle="modal" id="onDeleteSubmit" data-target="#delete_point" type="submit" class="btn btn-info bg-red user_btn btn-lg custom-add-member-button">Purge Point</button>
                      </span>
                  </div>
            </div>


        </div>

        


      </div>


      <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Point owner list </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Point</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user )
                          <tr>
                            <td><a href="#">{{ $user->id }}</a></td>
                            <td>{{ $user->first_name }}  {{ $user->last_name }}</td>
                            <td>0{{ $user->phone_number }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->total_point }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
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



      <div class="modal fade" id="add_point" style="display: none;">
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
                                    <form action="{{ route('point_store')}}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-row">
                                                <div class="col-md-6">

                                                  <div class="form-row">

                                                    <div class="col-md-10">
                                                      <div class="position-relative form-group"><label for="member_id" class="">Member ID</label>
                                                        <input name="member_id" id="member_id"  placeholder="Member Id" type="nuumber" class="mb-2 form-control-lg form-control" required>
                                                    </div>
                                                  </div>
                                                    <div class="col-md-10">
                                                        <div class="position-relative form-group"><label for="shopping" class="">Shopping Amount</label>
                                                            <input name="shopping" id="shopping" placeholder="Shopping Amount" type="nuumber" class="mb-2 form-control-lg form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="position-relative form-group"><label for="point" class="">Point </label>
                                                            <p name="point" id="point" placeholder="Shopping Amount"  type="number" class="mb-2 form-control-lg form-control"></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                      <button name="submit" id="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block custom-submit">Submit</button>
                                                    </div>
                                                </div>

                                                </div>

                                                <div class="col-md-6">
                                                
                                                  <div class="position-relative  member_info_from">
                                                    <label for="member_name" >Member Name : </label> 
                                                    <label class="member_info" id="member_name" for="member_name"></label>
                                                  </div>

                                                  <div class="position-relative  member_info_from">
                                                    <label for="member_phone_number" >Phone Number : </label> 
                                                    <label class="member_info" id="member_phone_number" for="member_phone_number"></label>
                                                  </div>

                                                   <div class="position-relative  member_info_from">
                                                    <label for="member_card" >Card Number : </label> 
                                                    <label class="member_info" id="member_card" for="member_card"></label>
                                                  </div>

                                                  <div class="position-relative  member_info_from">
                                                    <label for="member_email" >Email Address : </label> 
                                                    <label class="member_info" id="member_email" for="member_email"></label>
                                                  </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
            </div>
        </div>
      </div>


      <div class="modal fade" id="delete_point" style="display: none;">
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
                                    <form action="{{ route('home_update')}}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-row">
                                                <div class="col-md-6">

                                                  <div class="form-row">

                                                    <div class="col-md-10">
                                                      <div class="position-relative form-group"><label for="member_id_update" class="">Member ID</label>
                                                        <input name="member_id_update" id="member_id_update"  placeholder="Member ID" type="nuumber" class="mb-2 form-control-lg form-control" required>
                                                    </div>
                                                  </div>
                                                    <div class="col-md-10">
                                                        <div class="position-relative form-group"><label for="shopping_update" class="">Shopping Amount</label>
                                                            <input name="shopping_update" id="shopping_update" placeholder="Shopping Amount" type="nuumber" class="mb-2 form-control-lg form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="position-relative form-group"><label for="delete_point_data" class="">Point </label>
                                                            <p name="delete_point_data" id="delete_point_data" placeholder="Point" class="mb-2 form-control-lg form-control"></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                      <div class="position-relative form-group"><label for="total_amount_data" class="">Total Amount </label>
                                                            <p name="total_amount_data" id="total_amount_data" placeholder="Point" class="mb-2 form-control-lg form-control"></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                      <button name="submit" id="update_submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block custom-submit">Submit</button>
                                                    </div>
                                                </div>

                                                </div>


                                                <div class="col-md-6">
                                                 

                                                  <div class="position-relative  member_info_from">
                                                    <label for="member_name_update" >Member Name : </label> 
                                                    <p name="shopping_update" id="member_name_update" placeholder="Member Name" type="text" class="mb-2 form-control-lg form-control" required></p>
                                                  </div>

                                                  <div class="position-relative  member_info_from">
                                                    <label for="member_phone_number_update" >Phone Number : </label> 
                                              
                                                    <p name="member_phone_number_update" id="member_phone_number_update" placeholder="Phone Number" type="text" class="mb-2 form-control-lg form-control" required></p>
                                                  </div>

                                                   <div class="position-relative  member_info_from">
                                                    <label for="member_card_update" >Card Number : </label> 
                                                    {{-- <label class="member_info" id="member_card_update" for="member_card"></label> --}}
                                                    <p name="member_card_update" id="member_card_update" placeholder="Card Number" type="text" class="mb-2 form-control-lg form-control" required></p>
                                                  </div>

                                                  <div class="position-relative  member_info_from">
                                                    <label for="member_email_update" >Email Address : </label> 
                                                    {{-- <label class="member_info" id="member_email_update" for="member_email"></label> --}}
                                                    <p name="member_card_update" id="member_email_update" placeholder="Email Address" type="text" class="mb-2 form-control-lg form-control" required></p>
                                                  </div>

                                                  <div class="alert alert-danger alert-dismissible" id="Point_alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                                    Your Point bellow 500, You can't use point;
                                                  </div>




                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
            </div>
        </div>
      </div>
    
    
    
    
    
    
    <script>

      let userData;

    $('#shopping').change(function() {
            var paid_to_you = $(this).val();
            if(paid_to_you > 0){
                paid_to_you = parseInt(paid_to_you);
                var mf = paid_to_you/100;
                $('#point').text(Math.floor(mf));
            }
    });

    $(document).on('click','#onSubmit',function(e){
        let dataID = document.getElementById("user_data").value;
        let space = " ";
        let o_number = '0';
        fetch('/home/'+dataID)
        .then((response) => {
          return response.json();
        })
        .then((userData) => {
          console.log(userData);
          $("#member_id").val(userData['id']);
          $('#member_name').text(userData['first_name'] +  space  + userData['last_name']);
          $('#member_email').text(userData['email']);
          $('#member_phone_number').text(o_number + userData['phone_number']);
          $('#member_card').text(userData['card_number']);
        });

    });


    $(document).on('click','#onDeleteSubmit',function(e){
        let dataID = document.getElementById("user_data").value;
        let space = " ";
        let o_number = '0';
        fetch('/home/update/'+dataID)
        .then((response) => {
          return response.json();
        })
        .then((updateUser) => {
          console.log(updateUser);
          $("#member_id_update").val(updateUser['0']['id']);
          $('#member_name_update').text(updateUser['0']['first_name'] +  space  + updateUser['0']['last_name']);
          $('#member_email_update').text(updateUser['0']['email']);
          $('#member_phone_number_update').text(o_number + updateUser['0']['phone_number']);
          $('#member_card_update').text(updateUser['0']['card_number']);
          $('#delete_point_data').text(updateUser['0']['total_point']);

          if(updateUser['0']['total_point'] <= 500){
            $('#update_submit').attr('disabled','disabled');
            $('#Point_alert').show();
            
          }else{
            $('#Point_alert').hide();
          }

          userData = updateUser['0']['total_point']
        });

    });


    $('#shopping_update').change(function() {
            var paid_to_you = $(this).val();
            if(paid_to_you > 0){
                paid_to_you = parseInt(paid_to_you);
                var mf = paid_to_you - userData;
                $('#total_amount_data').text(Math.floor(mf));
            }
    });



  





   




    </script>
@endsection
