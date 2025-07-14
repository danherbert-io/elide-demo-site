<?php

namespace App\Http\Requests;

use App\Enums\UserTitle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateUserProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'title' => [
                'nullable', new Enum(UserTitle::class),
            ],
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Because the form submission is coming from any page that is showing the user profile dialog+form, the
        // referrer Laravel wants to send back to by default is not the right page. We want to send the request
        // back to the endpoint which provides the dialog+form.
        return route('user.profile-update');
    }
}
