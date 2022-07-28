    <!-- create modal content -->
    <div id="create" class="modal fade" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Add Service</h3>
                    <button type="button" class="close" wire:click.prevent="close">×</button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" wire:submit.prevent="addService">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Service Name</label>
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
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Price</label>
                            <div class="col-md-11 ml-3">
                                <input type="number" class="form-control" wire:model.defer="price">
                                @error('price')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Notes</label>
                            <div class="col-md-11 ml-3">
                                <textarea wire:model.defer="notes" class="form-control" cols="30" rows="3"></textarea>
                                @error('notes')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="addService" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="addService, close">
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



    <!-- edit modal content -->
    <div id="edit" class="modal fade" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Update {{ $name }}</h3>
                    <button type="button" class="close" wire:click.prevent="close">×</button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" wire:submit.prevent="updateService('{{ $serviceId }}')">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Service Name</label>
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
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Price</label>
                            <div class="col-md-11 ml-3">
                                <input type="number" class="form-control" wire:model.defer="price">
                                @error('price')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Notes</label>
                            <div class="col-md-11 ml-3">
                                <textarea wire:model.defer="notes" class="form-control" cols="30" rows="3"></textarea>
                                @error('notes')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="updateService" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="updateService, close">
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


    <!-- sale modal content -->
    <div id="sale" class="modal fade" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Add Sale for: {{ $name }}</h3> <br>
                    <button type="button" class="close" wire:click.prevent="close">×</button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Amount: {{ number_format($price, 2) }}</h3>

                    <form class="form-horizontal" wire:submit.prevent="addSale('{{ $serviceId }}')">


                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Client Name</label>
                            <div class="col-md-11 ml-3">
                                <div wire:ignore>
                                    <select wire:change="$emit('classChanged', $event.target.value)" id="client" class="form-control">
                                        <option value="">Choose Client ...</option>
                                        @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('client_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Employees Name</label>
                            <div class="col-md-11 ml-3">
                                <div wire:ignore>
                                    <select wire:change="$emit('classChanged', $event.target.emp)" id="employee" class="form-control select2">
                                        <option value="">Choose Employee ...</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('employee_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Commission</label>
                            <div class="col-md-11 ml-3">
                                <div wire:ignore>
                                    <select wire:model="commission_id" class="form-control">
                                        <option value="">Choose commission ...</option>
                                        @foreach ($commissions as $commission)
                                        <option value="{{ $commission->id }}">{{ $commission->amount }} - {{ $commission->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('commission_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Mode of Payment</label>
                            <div class="col-md-11 ml-3">
                                    <select wire:model="mode_of_payment" class="form-control">
                                        <option value="">Choose Mode of Payment ...</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Payable">Payable</option>
                                    </select>
                                @error('mode_of_payment')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Date</label>
                            <div class="col-md-11 ml-3">
                                <div wire:ignore>
                                    <input type="text" class="form-control flatpickr flatpickr-input active" id="time" wire:model.defer="date" placeholder="choose date">
                                </div>
                                @error('date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div wire:loading wire:target="addSale" class="progress-bar progress-bar-striped progress-bar-animated" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <div wire:loading wire:target="close" class="progress-bar progress-bar-striped progress-bar-animated mb-2" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Cancelling . . .</div>

                        <div wire:loading.remove wire:target="addSale, close">
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
