@section('title', 'Commission')

<div>


    <div class="row">
        <div class="col-12">


            <div class="card">

                <div class="card-header">
                    <a class="btn btn-primary float-right mt-n1"  href="#" wire:click.prevent="showCreate"><i class="fas fa-plus-circle"></i> Add Commission</a>

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
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($commissions as $commission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $commission->amount }}</td>
                                    <td>{{ $commission->type }}</td>
                                    <td>
                                        <a href="#" wire:click.prevent="showEdit({{ $commission->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                        <a href="#" wire:click.prevent="alertConfirm({{ $commission->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $commissions->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('livewire.com-modal')

</div>


@push('services-js')


<script>
    window.addEventListener('show-create-form', function (event) {
        $('#create').modal('show');
    });
    window.addEventListener('show-edit-form', function (event) {
        $('#edit').modal('show');
    });
    window.addEventListener('hide-form', function (event) {
        $('#create').modal('hide');
        $('#edit').modal('hide');
    });
</script>
@endpush
