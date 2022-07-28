<?php

namespace App\Http\Livewire;

use App\Models\Commission;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CommissionComponent extends Component
{
    use WIthPagination;
    protected $paginationTheme = 'bootstrap';
    public $amount, $type, $query, $commissionId;
    protected $queryString = ['query'];
    public $listeners = [
        'delete'
    ];

    public function updated($property)
    {
        if ($property === 'query') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $commissions = Commission::search($this->query)->latest()->paginate(10);

        return view('livewire.commission-component', compact('commissions'))->extends('layouts.master');
    }

    public function showCreate()
    {
        $this->dispatchBrowserEvent('show-create-form');
    }

    public function showEdit(Commission $commission)
    {
        $this->dispatchBrowserEvent('show-edit-form');
        $this->commissionId = $commission->id;
        $this->amount = $commission->amount;
        $this->type = $commission->type;
    }

    public function close()
    {
        $this->dispatchBrowserEvent('hide-form');
        $this->resetValidation();
        $this->amount = null;
        $this->type = null;
        $this->query = null;
    }

    public function addCommission()
    {
        $data = $this->validate([
            'amount' => 'required',
            'type' => 'required',
        ]);
        DB::beginTransaction();
        if($data) {
            $this->table = false;
            Commission::create($data);

            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success, commission was successfully created!.',
                'text' => '',
            ]);
            $this->close();
            return;
        }else{
            DB::rollBack();
            return redirect()->back();
        }

    }

    public function updateCommission(Commission $commission)
    {
        $data = $this->validate([
            'amount' => 'required',
            'type' => 'required',
        ]);
        DB::beginTransaction();
        if($data) {
            $this->table = false;
            $commission->update($data);

            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success, commission was successfully updated!.',
                'text' => '',
            ]);
            $this->close();
            return;
        }else{
            DB::rollBack();
            return redirect()->back();
        }

    }

    public function alertConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'type' => 'warning',
            'text' => 'Are you sure? Please confirm to proceed.',
            'id' => $id
        ]);
    }

    public function delete(Commission $commission)
    {
        $commission->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Success, commission was successfully deleted!.',
            'text' => '',
        ]);
        return;
    }

}
