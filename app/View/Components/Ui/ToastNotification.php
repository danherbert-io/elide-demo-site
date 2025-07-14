<?php

namespace App\View\Components\Ui;

use Closure;
use Elide\Contracts\ComponentSpecifiesSwapStrategy;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToastNotification extends Component implements ComponentSpecifiesSwapStrategy
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $message,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.toast-notification');
    }

    public function swapStrategy(): string
    {
        return 'beforeend:#toast-notifications';
    }
}
