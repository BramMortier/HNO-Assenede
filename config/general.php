<?php

use craft\config\GeneralConfig;
use craft\helpers\App;

return GeneralConfig::create()
    ->defaultWeekStartDay(1)
    ->omitScriptNameInUrls()
    ->preloadSingles()
    ->allowAdminChanges(App::env('CRAFT_ALLOW_ADMIN_CHANGES') ?? false)
    ->disallowRobots(App::env('CRAFT_DISALLOW_ROBOTS') ?? false)
    ->preventUserEnumeration(true)
    ->sendPoweredByHeader(false)
    ->asyncCsrfInputs(true)
    ->errorTemplatePrefix('_pages/errors/')
    ->loginPath('auth/login')
    ->logoutPath('dashboard/auth/logout')
    ->activateAccountSuccessPath('dashboard/auth/login')
    ->invalidUserTokenPath('dashboard/auth/login')
    ->setPasswordRequestPath('dashboard/auth/resetPassword')
    ->verifyEmailSuccessPath('dashboard/auth/login')
    ->verifyEmailPath('dashboard/auth/verifyEmail')
    ->postLoginRedirect('dashboard/pages/general')
    ->postLogoutRedirect('')
    ->aliases([
        '@web' => App::env('PRIMARY_SITE_URL'),
        '@webroot' => dirname(__DIR__) . '/web',
    ])
    ->errorTemplatePrefix('_pages/errors/')
;
