<?php

declare(strict_types=1);


namespace App\Services;

use App\Enums\UserTitle;

class UserProfileService
{
    public function setName(string $name): static
    {
        session()->put('user.name', trim($name));
        return $this;
    }

    public function setTitle(null|UserTitle $title): static
    {
        session()->put('user.title', $title?->value);
        return $this;
    }

    public function name(): null|string
    {
        return session('user.name');
    }

    public function title(): null|UserTitle
    {
        $title = session('user.title');
        return $title ? UserTitle::tryFrom($title) : null;
    }
}
