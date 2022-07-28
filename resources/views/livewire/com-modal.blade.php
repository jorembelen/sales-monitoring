    <!-- create modal content -->
    <div id="create" class="modal fade" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Add Commission</h3>
                    <button type="button" class="close" wire:click.prevent="close">×</button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" wire:submit.prevent="addCommission">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Amount</label>
                            <div class="col-md-11 ml-3">
                                <input type="number" class="form-control" wire:model.defer="amount">
                                @error('amount')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Type</label>
                            <div class="col-md-11 ml-3">
                                <select wire:model.defer="type" class="form-control">
                                    <option value="Percentage">Percentage</option>
                                    <option value="Fixed">Fixed</option>
                                </select>
                                @error('type')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="addCommission" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="addCommission, close">
                            <button  class="btn btn-dark waves-effect waves-light" type="submit">Submit</button>
                            <a href="#" class="btn btn-danger waves-effect" wire:click.prevent="close">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    <!-- create modal content -->
    <div id="edit" class="modal fade" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Update</h3>
                    <button type="button" class="close" wire:click.prevent="close">×</button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" wire:submit.prevent="updateCommission('{{ $commissionId }}')">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Amount</label>
                            <div class="col-md-11 ml-3">
                                <input type="number" class="form-control" wire:model.defer="amount">
                                @error('amount')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Type</label>
                            <div class="col-md-11 ml-3">
                                <select wire:model.defer="type" class="form-control">
                                    <option value="{{ $type }}">{{ $type }}</option>
                                    <option value="Percentage">Percentage</option>
                                    <option value="Fixed">Fixed</option>
                                </select>
                                @error('type')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="updateCommission" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="updateCommission, close">
                            <button  class="btn btn-dark waves-effect waves-light" type="submit">Submit</button>
                            <a href="#" class="btn btn-danger waves-effect" wire:click.prevent="close">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
