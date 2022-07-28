
@section('title', 'Services')

<div>


    <div class="row">
        <div class="col-12">


            <div class="card">

                <div class="card-header">
                    <a class="btn btn-primary float-right mt-n1"  href="#" wire:click.prevent="showCreate"><i class="fas fa-plus-circle"></i> Add Service</a>

                </div>

                <div class="card-body">
                    <div class="col-sm-12 col-md-6 text-sm-end">
                        <div id="datatable_filter" class="dataTables_filter"><label>Search:
                            <input type="search" class="form-control form-control-sm" placeholder="Search  here ..." aria-controls="datatable" wire:model.debounce.500ms="query"></label>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ number_format($service->price, 2) }}</td>
                                    <td>{{ $service->notes }}</td>
                                    <td>
                                        <a href="#" wire:click.prevent="showEdit({{ $service->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                        <a href="#" wire:click.prevent="alertConfirm({{ $service->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                    </td>
                                    <td>
                                        <a href="#" wire:click.prevent="showSale({{ $service->id }})"><button class="btn btn-primary btn-sm">Add Sale</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('livewire.services.modal')

</div>


@push('services-js')

<script>
    var f2 = flatpickr(document.getElementById('time'), {
        enableTime: false,
        dateFormat: "Y-m-d",
    });

</script>

<script>
    window.addEventListener('show-create-form', function (event) {
        $('#create').modal('show');
    });
    window.addEventListener('show-edit-form', function (event) {
        $('#edit').modal('show');
    });
    window.addEventListener('show-sale-form', function (event) {
        $('#sale').modal('show');
    });
    window.addEventListener('hide-form', function (event) {
        $('#create').modal('hide');
        $('#edit').modal('hide');
        $('#sale').modal('hide');
    });
</script>
<script>
     $('form').submit(function() {
        @this.set('employee_id', $('#employee').val());
        @this.set('client_id', $('#client').val());
    })
    $(document).ready(function () {
        window.addEventListener('reApplySelect2', event => {
            $('#employee').select2();
            $('#client').select2();
        });
    });
</script>

@endpush
