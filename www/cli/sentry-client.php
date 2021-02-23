<?php

require_once dirname(__DIR__) . '/_sitespecific/site-settings.php'; // Change to location of settings file
require_once dirname(__DIR__) . '/plugins/system/kernelsentry/vendor/autoload.php';
$settings_class = new SiteConfig(); // Change class name to match the class name in your settings file

Sentry\init(
    [
        'dsn'         => $settings_class->sentry_dsn,
        'environment' => $settings_class->sentry_environment
    ]
);
