<?php
namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord {
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array {
        $data['created_by'] = Auth::user()->id;
        return $data;
    }
}
