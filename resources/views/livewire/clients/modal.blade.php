    <!-- create modal content -->
    <div id="create" class="modal fade" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Add Client</h3>
                    <button type="button" class="close" wire:click.prevent="close">×</button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" wire:submit.prevent="addClient">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Client Name</label>
                            <div class="col-md-11 ml-3">
                                <input type="text" class="form-control" wire:model.defer="name">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Date of Birth</label>
                            <div class="col-md-11 ml-3">
                                <input type="date" class="form-control" wire:model.defer="dob">
                                @error('dob')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Contact Number</label>
                            <div class="col-md-11 ml-3">
                                <input type="number" class="form-control" wire:model.defer="contact">
                                @error('contact')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Email</label>
                            <div class="col-md-11 ml-3">
                                <input type="email" class="form-control" wire:model.defer="email">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Address</label>
                            <div class="col-md-11 ml-3">
                                <input type="text" class="form-control" wire:model.defer="address">
                                @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="addClient" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="addClient, close">
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
                    <h3 class="modal-title" id="myModalLabel">Update {{ $name }}</h3>
                    <button type="button" class="close" wire:click.prevent="close">×</button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" wire:submit.prevent="updateClient('{{ $clientId }}')">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Client Name</label>
                            <div class="col-md-11 ml-3">
                                <input type="text" class="form-control" wire:model.defer="name">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Date of Birth</label>
                            <div class="col-md-11 ml-3">
                                <input type="date" class="form-control" wire:model.defer="dob">
                                @error('dob')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Contact Number</label>
                            <div class="col-md-11 ml-3">
                                <input type="number" class="form-control" wire:model.defer="contact">
                                @error('contact')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Email</label>
                            <div class="col-md-11 ml-3">
                                <input type="email" class="form-control" wire:model.defer="email">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Address</label>
                            <div class="col-md-11 ml-3">
                                <input type="text" class="form-control" wire:model.defer="address">
                                @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="updateClient" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="updateClient, close">
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
