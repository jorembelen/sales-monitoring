<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class CommissionCount extends Component
{
    public $total;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($total)
    {
        $this->total = DB::table('commissions')->select('id')->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commission-count');
    }
}
