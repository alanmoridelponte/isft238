<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void {
        $this->migrator->add('general.institute_name', 'Instituto Superior de Formación Técnica N°238');
        $this->migrator->add('general.institute_initialism', 'ISFT N°238');
        $this->migrator->add('general.institute_motto', 'Formamos profesionales con excelencia académica y compromiso social');
        $this->migrator->add('general.institute_address', 'Av. San Martín 1234');
        $this->migrator->add('general.institute_phone', '1234-5678');
        $this->migrator->add('general.institute_email', '');
        $this->migrator->add('general.institute_facebook', 'https://www.facebook.com/profile.php?id=100083536560544');
        $this->migrator->add('general.institute_instagram', 'https://www.instagram.com/isft238');
        $this->migrator->add('general.institute_twitter', '');
        $this->migrator->add('general.institute_youtube', '');
        $this->migrator->add('general.institute_whatsapp', 'https://wa.me/');
        $this->migrator->add('general.institute_linkedin', '');
    }

    public function down(): void {
        $this->migrator->delete('general.institute_name');
        $this->migrator->delete('general.institute_initialism');
        $this->migrator->delete('general.institute_motto');
        $this->migrator->delete('general.institute_address');
        $this->migrator->delete('general.institute_phone');
        $this->migrator->delete('general.institute_email');
        $this->migrator->delete('general.institute_facebook');
        $this->migrator->delete('general.institute_instagram');
        $this->migrator->delete('general.institute_twitter');
        $this->migrator->delete('general.institute_youtube');
        $this->migrator->delete('general.institute_whatsapp');
        $this->migrator->delete('general.institute_linkedin');
    }
};
