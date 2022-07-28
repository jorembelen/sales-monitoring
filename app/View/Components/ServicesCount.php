<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ServicesCount extends Component
{
    public $total;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($total)
    {
        $this->total = DB::table('services')->select('id')->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.services-count');
    }
}
