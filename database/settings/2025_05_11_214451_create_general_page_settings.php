<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void {
        $this->migrator->add('general.institute_name', 'Instituto Superior de Formación Técnica N°238');
        $this->migrator->add('general.institute_initialism', 'ISFT N°238');
        $this->migrator->add('general.institute_motto', 'Formamos profesionales con excelencia académica y compromiso social');
        $this->migrator->add('general.institute_address', 'Av. San Martín 1234');
        $this->migrator->add('general.institute_business_hours', 'Lunes a Viernes: 8:00 - 20:00');
        $this->migrator->add('general.institute_maps_iframe', 'https://www.openstreetmap.org/export/embed.html?bbox=-57.498525381088264%2C-37.82192316510236%2C-57.49404609203339%2C-37.820037469785895&amp;layer=mapnik&amp;marker=-37.82098032346613%2C-57.49628573656082');
        $this->migrator->add('general.institute_maps_external_link', 'https://www.openstreetmap.org/?mlat=-37.820980&amp;mlon=-57.496286#map=19/-37.820980/-57.496286');
        $this->migrator->add('general.institute_phone', '1234-5678');
        $this->migrator->add('general.institute_email', '');
        $this->migrator->add('general.institute_facebook', 'https://www.facebook.com/profile.php?id=100083536560544');
        $this->migrator->add('general.institute_instagram', 'https://www.instagram.com/isft238');
        $this->migrator->add('general.institute_youtube', '');
        $this->migrator->add('general.institute_whatsapp', 'https://wa.me/');
    }

    public function down(): void {
        $this->migrator->delete('general.institute_name');
        $this->migrator->delete('general.institute_initialism');
        $this->migrator->delete('general.institute_motto');
        $this->migrator->delete('general.institute_address');
        $this->migrator->delete('general.institute_business_hours');
        $this->migrator->delete('general.institute_maps_iframe');
        $this->migrator->delete('general.institute_maps_external_link');
        $this->migrator->delete('general.institute_phone');
        $this->migrator->delete('general.institute_email');
        $this->migrator->delete('general.institute_facebook');
        $this->migrator->delete('general.institute_instagram');
        $this->migrator->delete('general.institute_youtube');
        $this->migrator->delete('general.institute_whatsapp');
    }
};
