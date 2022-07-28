<?php

namespace App\Http\Livewire\Clients;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ClientComponent extends Component
{
    use WIthPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $dob, $address, $contact, $email, $query, $clientId;
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
        $clients = Client::search($this->query)->latest()->paginate(10);

        return view('livewire.clients.client-component', compact('clients'))->extends('layouts.master');
    }

    public function showCreate()
    {
        $this->dispatchBrowserEvent('show-create-form');
    }

    public function showEdit(Client $client)
    {
        $this->dispatchBrowserEvent('show-edit-form');
        $this->clientId = $client->id;
        $this->name = $client->name;
        $this->dob = $client->dob;
        $this->address = $client->address;
        $this->contact = $client->contact;
        $this->email = $client->email;
    }

    public function close()
    {
        $this->dispatchBrowserEvent('hide-form');
        $this->resetValidation();
        $this->name = null;
        $this->dob = null;
        $this->address = null;
        $this->contact = null;
        $this->email = null;
        $this->query = null;
    }

    public function addClient()
    {
        $data = $this->validate([
            'name' => 'required',
            'address' => 'required',
            'dob' => 'nullable',
            'contact' => 'nullable',
            'email' => 'nullable',
        ]);
        DB::beginTransaction();
        if($data) {
            $this->table = false;
            Client::create($data);

            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success, client was successfully created!.',
                'text' => '',
            ]);
            $this->close();
            return;
        }else{
            DB::rollBack();
            return redirect()->back();
        }

    }

    public function updateClient(Client $client)
    {
        $data = $this->validate([
            'name' => 'required',
            'address' => 'required',
            'dob' => 'nullable',
            'contact' => 'nullable',
            'email' => 'nullable',
        ]);
        DB::beginTransaction();
        if($data) {
            $this->table = false;
            $client->update($data);

            DB::commit();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success, client was successfully updated!.',
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

    public function delete(Client $client)
    {
        $client->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Success, client was successfully deleted!.',
            'text' => '',
        ]);
        return;
    }

}
