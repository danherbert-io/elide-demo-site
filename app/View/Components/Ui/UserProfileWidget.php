<?php

namespace App\View\Components\Ui;

use App\Services\UserProfileService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserProfileWidget extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly UserProfileService $userProfile
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.user-profile-widget');
    }
}
