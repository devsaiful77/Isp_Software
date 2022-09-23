<div>
    {{-- main part --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">

                <div class="card-body">
                    <form wire:submit.prevent="quotationSubmit" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Customer Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" wire:model="quotationCustomerName" class="form-control" placeholder="Customer Name" value="{{ old('quotationCustomerName') }}">
                                @error('quotationCustomerName')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Customer Mobile No<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" wire:model="quoatationMobileNo" class="form-control" placeholder="Customer Mobile No" value="{{ old('quoatationMobileNo') }}">
                                @error('quoatationMobileNo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Package </label>
                            <div class="col-md-7">
                                <select class="form-control" wire:model="packageId">
                                    <option value="">------ Select Here ------</option>
                                    @foreach($packages as $apackage)
                                    <option value="{{ $apackage->packageId }}">{{ $apackage->packageName }}</option>
                                    @endforeach
                                </select>
                                @error('packageId')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Comments</label>
                            <div class="col-md-7">
                                <input type="text" wire:model="remarks" class="form-control" placeholder="Comments" value="{{ old('remarks') }}">
                                @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>



                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Inspection By <span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" wire:model="inspectionById">
                                    <option value=""> ------ Select Here ------ </option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('inspectionById')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- main part --}}
</div>
