<?php

namespace App\View\Components;

use Illuminate\View\Component;

class since extends Component
{
    public $year;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($year)
    {
        $this->year = $year;
    }

    public function yearNum()
    {
        $endYears = (int)substr($this->year,-1);
        if (!$endYears || ($endYears >= 5 && $endYears <= 9)) return $this->year.' лет';
        elseif ($endYears >= 2 && $endYears <= 4) return $this->year.' года';
        else return $this->year.' год';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.since');
    }
}
