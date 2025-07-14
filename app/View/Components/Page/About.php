<?php

namespace App\View\Components\Page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class About extends Component
{
    public string $content;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->content = Cache::remember(
            'page.about',
            app()->isProduction() ? now()->addYear() : 0,
            function () {
                $file = resource_path('content/page/about.md');

                return Str::markdown(file_exists($file)
                    ? file_get_contents($file)
                    : '(about content missing)'
                );
            }
        );
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.about');
    }
}
