<?php

namespace App\View\Components;

use App\Models\Expression;
use Illuminate\View\Component;

class ExpressionCard extends Component
{
    public Expression $expression;

    public bool $single;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($expression, $single)
    {
        $this->expression = $expression;
        $this->single = $single;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.expression-card');
    }
}
