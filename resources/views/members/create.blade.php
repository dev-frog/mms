@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Create Member</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Member</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Success Member has been added to the databases.
        </div>
    @endif

    @if(session()->has('failed'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        There is error, Member is not added to  databases;
      </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                <li class="nav-item">
                    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                        <span>Member From</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form class="" action="{{ route('store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="first_name" class="">First Name</label>
                                            <input name="first_name" id="first_name" placeholder="First Name" type="text" class="mb-2 form-control-lg form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="last_name" class="">Last Name</label>
                                            <input name="last_name" id="last_name" placeholder="Last Name" type="text" class="mb-2 form-control-lg form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="phone_number" class="">Mobile Number</label>
                                            <input name="phone_number" id="phone_number" placeholder="Mobile Number" type="nuumber" class="mb-2 form-control-lg form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="emailaddress" class="">Email Address</label>
                                            <input name="email" id="emailaddress" placeholder="Email Address" type="email" class="mb-2 form-control-lg form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="card_number" class="">Card Number</label>
                                            <input name="card_number" id="card_number" placeholder="Card Number" type="nuumber" class="mb-2 form-control-lg form-control" required>
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
    </div>


@endsection
