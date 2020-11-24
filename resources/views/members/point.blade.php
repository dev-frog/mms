@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Add Point</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Point</li>
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
                            <form class="" action="{{ route('point_store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="member_id" class="">Member ID</label>
                                            <input name="member_id" id="member_id" placeholder="Mobile Number" type="nuumber" class="mb-2 form-control-lg form-control" required>
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
    </div>

<script>

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
