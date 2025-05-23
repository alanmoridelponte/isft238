<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings {

    public string $institute_name;
    public string $institute_initialism;
    public string $institute_motto;
    public string $institute_address;
    public string $institute_business_hours;
    public string $institute_maps_iframe;
    public string $institute_maps_external_link;
    public string $institute_phone;
    public string $institute_email;
    public string $institute_whatsapp;
    public string $institute_facebook;
    public string $institute_instagram;
    public string $institute_youtube;

    public static function group(): string {
        return 'general';
    }

}
