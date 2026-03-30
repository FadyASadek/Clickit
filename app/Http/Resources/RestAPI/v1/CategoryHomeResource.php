<?php

namespace App\Http\Resources\RestAPI\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryHomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(\Illuminate\Http\Request $request): array
    {
        $icon = (string) $this->icon;
        $isDefault = ($icon === '' || $icon === 'def.png' || $icon === 'null');
        $fallback  = 'http://127.0.0.1:8000/storage/app/public/category/2026-01-16-6969eaf409dd9.jpg';
        $iconPath  = storage_path('app/public/category/' . $icon);
        $iconUrl   = (!$isDefault && file_exists($iconPath))
            ? asset('storage/app/public/category/' . $icon)
            : $fallback;

        return [
            'id'            => (int) $this->id,
            'name'          => (string) $this->name,
            'icon'          => $iconUrl,
            'product_count' => (int) ($this->product_count ?? 0),
        ];
    }
}
