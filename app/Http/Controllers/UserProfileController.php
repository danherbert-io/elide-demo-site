<?php

namespace App\Http\Controllers;

use App\Enums\UserTitle;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Services\UserProfileService;
use App\View\Components\Ui\ToastNotification;
use App\View\Components\Ui\UserProfileDialog;
use App\View\Components\Ui\UserProfileForm;
use App\View\Components\Ui\UserProfileWidget;
use Elide\Http\HtmxResponse;

class UserProfileController extends Controller
{
    public function __construct(
        protected UserProfileService $userProfileService
    ) {}

    public function dialog()
    {
        // The user profile form is presented in a dialog and does not have a dedicated page. Here we return
        // just the partials to show the dialog with the form. The `UserProfileDialog` component defines its
        // own swap strategy, which appends it to the end of the page.

        // When there's no `_old_input` in the session the request has not come from a form submission - we
        // return both the dialog and the form. When `_old_input` is present, it has come from a form submission
        // and we want to return just the form.
        $partials = ! session()->has('_old_input')
            ? [UserProfileDialog::class, UserProfileForm::class]
            : [UserProfileForm::class];

        return (new HtmxResponse)
            ->usingPartials(fn () => $partials)
            ->reswap('none');
    }

    public function update(UpdateUserProfileRequest $request)
    {
        $validated = $request->validated();

        $this->userProfileService->setName($validated['name']);
        $this->userProfileService->setTitle(UserTitle::tryFrom($validated['title']));

        // Return a response which includes an updated user profile widget, a toast notification, and
        // also deletes the user dialog.
        return (new HtmxResponse)
            ->usingPartials(fn () => [
                UserProfileWidget::class,
                new ToastNotification('Your profile has been updated'),
            ])
            ->retarget('#user-dialog')
            ->reswap('delete');
    }
}
