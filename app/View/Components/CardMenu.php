<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardMenu extends Component
{
    /**
     * Create a new component instance.
     */

    public $image;
    public $title;
    public $description;
    public $onclick;



    public function __construct($image,$title, $description='', $onclick='')
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->onclick = $onclick;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-menu');
    }
}
