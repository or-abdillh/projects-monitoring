<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $header;
    public $username;
    public function __construct($header)
    {
        $this->header = $header;
        $this->username = Auth::user()->name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard');
    }
}
