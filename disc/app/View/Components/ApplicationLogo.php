<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ApplicationLogo extends Component
{

    public $width;
    
    public $height;
    
    public $viewBox;
    
    
    public $zoomAndPan;
    
    public $id;

    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $width = 250,
        $height = 200,
        $viewBox = '725 865',
        $id = null,
        $class = null,
        $zoomAndPan = "magnify"
    )
    {
        $this->width = $width;
        $this->height = $height;
        $this->viewBox = $viewBox;
        $this->zoomAndPan = $zoomAndPan;
        $this->id = $id ?? '';
        $this->class = $class ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.application-logo');
    }
}
