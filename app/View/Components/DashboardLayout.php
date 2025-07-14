<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardLayout extends Component
{
    public string $title;
    public array $breadcrumb;
    public string $backgroundColor;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $breadcrumb, $backgroundColor = 'bg-slate-100')
    {
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.dashboard');
    }
}
