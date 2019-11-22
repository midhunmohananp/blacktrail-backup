@includeWhen(session()->has('logoutMessage'),'partials.alerts.flash',['flashMessage' => {{ trans('flash.logout_success') }} ]);
