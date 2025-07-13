<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\View\Components\Page;
use Elide\Htmx;


class AboutController extends Controller
{
    public function __invoke()
    {
        return Htmx::render(Page\About::class)->title('About');
    }
}
