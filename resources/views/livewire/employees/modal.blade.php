    <!-- create modal content -->
    <div id="create" class="modal fade" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Add Employee</h3>
                    <button type="button" class="close" wire:click.prevent="close">×</button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" wire:submit.prevent="addEmployee">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Employee Name</label>
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
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Designation</label>
                            <div class="col-md-11 ml-3">
                                <input type="text" class="form-control" wire:model.defer="designation">
                                @error('designation')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="addEmployee" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="addEmployee, close">
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

                    <form class="form-horizontal" wire:submit.prevent="updateEmployee('{{ $employeeId }}')">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Employee Name</label>
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
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Designation</label>
                            <div class="col-md-11 ml-3">
                                <input type="text" class="form-control" wire:model.defer="designation">
                                @error('designation')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="updateEmployee" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="updateEmployee, close">
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
