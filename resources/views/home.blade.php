@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
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

        <div class="col-lg-4 col-12 right">
            <div class="box-body">
                <div class="form-group input-group input-group-sm">
                    <input type="text" id="user_data" data-id="user_id" class="form-control">
                    <span class="input-group-btn">
                        <button data-toggle="modal" data-target="#add_point" type="submit" class="btn btn-info btn-flat user_btn">Submit</button>
                    </span>
                </div>
            </div>


        </div>

        <div class="col-lg-4 col-12 right">
            <button class="info-box bg-red btn btn-block btn-danger btn-lg custom-add-member-button" data-toggle="modal" data-target="#purge_point">Purge Point</button>
        </div>


      </div>


      <div class="row">
          <div class="col-md-8">
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



          {{-- left --}}
          <div class="col-md-4">
            <div class="col-sm-12 custom-padding">
                <div class="position-relative p-3 bg-gray" style="height: 180px">
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-danger text-xl">
                      hightest
                    </div>
                  </div>
                   <h6>Name : minju rul</h6>
                   <h6>Phone Number: 01799305582</h6>
                   <h6>Email : minjurulhaque.pro@gmail.com</h6>
                   <h6>Card Number : 12131231321312</h6>
                </div>
              </div>

              <div class="col-sm-12 custom-padding">
                <div class="position-relative p-3 bg-gray" style="height: 180px">
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-warning text-lg">
                      Second
                    </div>
                  </div>
                   <h6>Name : minju rul</h6>
                   <h6>Phone Number: 01799305582</h6>
                   <h6>Email : minjurulhaque.pro@gmail.com</h6>
                   <h6>Card Number : 12131231321312</h6>
                </div>
              </div>
          </div>

      </div>



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
                                        <form class="" action="{{ route('point_store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="member_id" class="">Member ID</label>
                                                        <input name="member_id" id="member_id" type="nuumber" class="mb-2 form-control-lg form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="email" class="">Member ID</label>
                                                        <input name="email" id="email"  type="email" class="mb-2 form-control-lg form-control" required>
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



      <script>


    // $(document).on('click','.user_btn',function(e){
    //     var dataID = document.getElementById("user_data").value;
    //     $.ajax({
    //         method:'GET',
    //         url:'/point/' + dataID

    //     });

    // });

    $('#member_id').change(function() {
        var dataID = document.getElementById("user_data").value;
        $.ajax({
            method:'GET',
            url:'/point/' + dataID

        });

    });





    </script>
@endsection
