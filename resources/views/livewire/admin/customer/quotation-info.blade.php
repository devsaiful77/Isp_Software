<div>
    @include('livewire.admin.customer.quotation-add')
    {{-- main part --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Quotation Information</h4>
                </div>
                <div class="card-body">

                    @if(Session::has('soft_success'))
                    <script type="text/javascript">
                        swal({
                            title: "Success!",
                            text: "Quotation Delete Success!",
                            icon: "success",
                            button: "OK",
                            timer: 5000,
                        });
                    </script>
                    @endif
                    @if(Session::has('soft_error'))
                    <script type="text/javascript">
                        swal({
                            title: "Opps!",
                            text: "Error! Please try again",
                            icon: "error",
                            button: "OK",
                            timer: 5000,
                        });
                    </script>
                    @endif

                    @if(Session::has('success_store'))
                    <script type="text/javascript">
                        swal({
                            title: "Successfully",
                            text: "Store New Quotataion",
                            icon: "success",
                            button: "OK",
                            timer: 5000,
                        });
                    </script>
                    @endif

                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Date</th>
                                <th>Inspector</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Cost</th>
                                <th>Paid</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sl = 1;
                            @endphp
                            @foreach($quotaions as $aqtn)

                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $aqtn->cutomerName }}</td>
                                <td>{{ $aqtn->mobileNo }}</td>
                                <td>{{ $aqtn->assignDate }}</td>
                                <td>{{ $aqtn->assignToId }}</td>
                                <td>{{ $aqtn->status == 'approve' ? 'Waiting for Inspection' : "Waiting for Connection" }}</td>
                                <td>{{ $aqtn->remarks }}</td>
                                <td>{{ $aqtn->connnectionCost }}</td>
                                <td>{{ $aqtn->paidAmount }}</td>

                                <td>

                                  <div class="action_button_wraper">
                                    <a class="action_button btn-info edit-icon" href="{{ route('customer.quotation.edit',$aqtn->cusQuotationId) }}"><i class="fas fa-edit"></i></a>

                                    <a class="action_button btn-success approve-icon" data-toggle="modal" data-target="#approveModal" wire:click="approveConfirm({{ $aqtn->cusQuotationId }})"><i class="fas fa-thumbs-up"></i></a>

                                    <a class="action_button btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" wire:click="deleteId({{ $aqtn->cusQuotationId }})" > <i class="fas fa-trash-alt"></i> </a>
                                  </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--delete modal code start -->
    <div wire:ignore.self id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header modal_header_title">
                  <h5><i class="mdi mdi-gamepad-circle"></i> Confirm Message</h5>
              </div>
              <div class="modal-body modal_card">
                  <input type="hidden" name="modal_id" id="modal_id" />
                  Are you want to sure delete this data?
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary waves-effect" wire:click.prevent="deleteQutation()">Confirm</button>
                  <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
    </div>
    {{-- main part --}}

    {{-- approve Modal --}}
    <div wire:ignore.self id="approveModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 750px!important">
          <div class="modal-content ">
              <div class="modal-header modal_header_title">
                  <h5><i class="mdi mdi-gamepad-circle"></i> Customer Summary </h5>
              </div>

              <form wire:submit.prevent="approveDone">
                <div class="modal-body modal_card">

                  <div class="form-group">
                    <label>Total Cost*</label>
                    <input type="text" class="form-control" wire:model="connnectionCost" value="{{ $connnectionCost }}">
                    @error('connnectionCost')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Total Pay*</label>
                    <input type="text" class="form-control" wire:model="paidAmount" placeholder="{{ $paidAmount }}">
                    @error('paidAmount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">Approve</button>
                    <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                </div>

              </form>

          </div>
        </div>
    </div>
    {{-- approve Modal --}}

    @section('livewire_script')
      <script type="text/javascript">
          window.livewire.on('quotation_remove',() => {
            $("#softDelModal").modal('hide');
          })
          // approve modal
          window.livewire.on('quotation_approve',() => {
            $("#approveModal").modal('hide');
          })
      </script>
    @endsection
</div>
