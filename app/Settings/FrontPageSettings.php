<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class FrontPageSettings extends Settings {

    public static function group(): string {
        return 'general';
    }
}
