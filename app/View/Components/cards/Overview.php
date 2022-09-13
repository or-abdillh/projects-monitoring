<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;

class Overview extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $content; 
    public $number;
    public $icon;
    public function __construct($content, $icon, $number)
    {
        //
        $this->content = $content;
        $this->icon = $icon;
        $this->number = $number;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.overview');
    }
}
