<?php

namespace App\Http\Livewire\Employees;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeesComponent extends Component
{
    use WIthPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $designation, $query, $employeeId;
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
        $employees = Employee::search($this->query)->latest()->paginate(10);

        return view('livewire.employees.employees-component', compact('employees'))->extends('layouts.master');
    }

    public function showCreate()
    {
        $this->dispatchBrowserEvent('show-create-form');
    }

    public function showEdit(Employee $employee)
    {
        $this->dispatchBrowserEvent('show-edit-form');
        $this->employeeId = $employee->id;
        $this->name = $employee->name;
        $this->designation = $employee->designation;
        $this->notes = $employee->notes;
    }

    public function close()
    {
        $this->dispatchBrowserEvent('hide-form');
        $this->resetValidation();
        $this->name = null;
        $this->designation = null;
        $this->query = null;
    }

    public function addEmployee()
    {
        $data = $this->validate([
            'name' => 'required',
            'designation' => 'nullable',
        ]);
        DB::beginTransaction();
        if($data) {
            $this->table = false;
            Employee::create($data);

            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success, employee was successfully created!.',
                'text' => '',
            ]);
            $this->close();
            return;
        }else{
            DB::rollBack();
            return redirect()->back();
        }

    }

    public function updateEmployee(Employee $employee)
    {
        $data = $this->validate([
            'name' => 'required',
            'designation' => 'nullable',
        ]);
        DB::beginTransaction();
        if($data) {
            $this->table = false;
            $employee->update($data);

            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success, employee was successfully updated!.',
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

    public function delete(Employee $employee)
    {
        $employee->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Success, employee was successfully deleted!.',
            'text' => '',
        ]);
        return;
    }

}
