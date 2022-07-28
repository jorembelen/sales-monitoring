<?php

namespace App\Http\Livewire\Services;

use App\Models\Service;
use App\Models\ServiceSale;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesComponent extends Component
{
    use WIthPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $price, $notes, $query, $serviceId;
    public $client_id, $employee_id, $service_id, $amount, $date, $mode_of_payment, $processed_by, $commission_id;
    protected $queryString = ['query'];
    public $listeners = [
        'delete',
        'classChanged'
    ];

     public function classChanged($value, $emp)
     {
         $this->client_id = $value;
         $this->employee_id = $emp;
     }

    public function updated($property)
    {
        if ($property === 'query') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $services = Service::search($this->query)->latest()->paginate(10);
        $employees = DB::table('employees')->select('id', 'name')->get();
        $clients = DB::table('clients')->select('id', 'name')->get();
        $commissions = DB::table('commissions')->select('id', 'amount', 'type')->get();

        return view('livewire.services.services-component', compact('services', 'employees', 'clients', 'commissions'))->extends('layouts.master');
    }


    public function showCreate()
    {
        $this->dispatchBrowserEvent('show-create-form');
    }

    public function showSale(Service $service)
    {
        $this->dispatchBrowserEvent('show-sale-form');
        $this->dispatchBrowserEvent('reApplySelect2');
        $this->serviceId = $service->id;
        $this->name = $service->name;
        $this->price = $service->price;
    }

    public function addSale(Service $service)
    {
        $data = $this->validate([
            'client_id' => 'required',
            'employee_id' => 'nullable',
            'commission_id' => 'required_with:employee_id',
            'date' => 'required',
            'mode_of_payment' => 'required',
        ], [
            'client_id.required' => 'Please choose client.',
            'employee_id.required' => 'Please choose employee.',
            'commission.required_with' => 'Please choose commission.',
        ]);

        if($this->commission_id){
            $commission = DB::table('commissions')->where('id', $this->commission_id)->first();
            if($commission){
                if($commission->type === "Percentage"){
                    $data['commission'] = $service->price * $commission->amount / 100;
                }else{
                    $data['commission'] = $commission->amount;
                }
            }

            DB::beginTransaction();
            if($data) {
                $data['service_id'] = $service->id;
                $data['amount'] = $service->price;
                $data['processed_by'] = auth()->user()->name;
                // dd($data);
                ServiceSale::create($data);

                DB::commit();
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',
                    'title' => 'Success, Transaction complete!.',
                    'text' => '',
                ]);
                $this->close();
                return;
            }else{
                DB::rollBack();
                return redirect()->back();
            }

        }

    }


    public function showEdit(Service $service)
    {
        $this->dispatchBrowserEvent('show-edit-form');
        $this->serviceId = $service->id;
        $this->name = $service->name;
        $this->price = $service->price;
        $this->notes = $service->notes;
    }

    public function close()
    {
        $this->dispatchBrowserEvent('hide-form');
        $this->dispatchBrowserEvent('reApplySelect2');
        $this->resetValidation();
        $this->query = null;
        $this->name = null;
        $this->price = null;
        $this->notes = null;
        $this->client_id = null;
        $this->employee_id = null;
        $this->date = null;
        $this->mode_of_payment = null;
        $this->commission_id = null;
    }

    public function addService()
    {
        $data = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'notes' => 'nullable',
        ]);
        DB::beginTransaction();
        if($data) {
            Service::create($data);

            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success, Service was successfully created!.',
                'text' => '',
            ]);
            $this->close();
            return;
        }else{
            DB::rollBack();
            return redirect()->back();
        }

    }

    public function updateService(Service $service)
    {
        $data = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'notes' => 'nullable',
        ]);
        DB::beginTransaction();
        if($data) {
            $service->update($data);

            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success, Service was successfully updated!.',
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

    public function delete(Service $service)
    {
        $service->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Success, Service was successfully deleted!.',
            'text' => '',
        ]);
        return;
    }


}
