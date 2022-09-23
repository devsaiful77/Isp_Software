@extends('layouts.admin')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->

<div class="sl-pagebody">

  <!-- list -->
  <div class="row" style="margin-top:30px">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-12">
              <h3 class="card-title card_top_title"></i>Devices Inventory Information</h3>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
              @if(Session::has('success_soft'))
              <div class="alert alert-success alertsuccess" role="alert">
                <strong>Successfully!</strong> delete brand information.
              </div>
              @endif

              @if(Session::has('success_update'))
              <div class="alert alert-success alertsuccess" role="alert">
                <strong>Successfully!</strong> update brand information.
              </div>
              @endif

              @if(Session::has('error'))
              <div class="alert alert-warning alerterror" role="alert">
                <strong>Opps!</strong> please try again.
              </div>
              @endif
            </div>
            <div class="col-md-2"></div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <!-- <table id="alltableinfo" class="table table-bordered custom_table mb-0"> -->
                <table id="datatable1" class="table responsive mb-0">
                  <thead>
                    <tr>

                      <th>SL NO.</th>
                      <th>Category Name</th>
                      <th>Sub Category Name</th>
                      <th>Brand</th>
                      <th>Stock</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>

                    @php
                    $counter = 1;
                    @endphp
                    @foreach ($devices as $stock)
                    <tr>
                      <td>{{ $counter++ }}</td>
                      <td>{{ $stock->CateName ??'' }}</td>
                      <td>{{ $stock->BranName ??'' }}</td>
                      <td>{{ $stock->SizeName ??'' }}</td>
                      <td>{{ $stock->totalQty ?? '0' }}</td>
                      <td>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end list -->



</div>




@endsection