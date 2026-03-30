<?php

namespace App\Http\Resources\RestAPI\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(\Illuminate\Http\Request $request): array
    {
        $image     = (string) $this->image;
        $isDefault = ($image === '' || $image === 'def.png' || $image === 'null');
        $fallback  = 'http://127.0.0.1:8000/storage/app/public/category/2026-01-16-6969eaf409dd9.jpg';
        $imagePath = storage_path('app/public/brand/' . $image);
        $imageUrl  = (!$isDefault && file_exists($imagePath))
            ? asset('storage/app/public/brand/' . $image)
            : $fallback;

        return [
            'id'    => (int) $this->id,
            'name'  => (string) $this->name,
            'image' => $imageUrl,
        ];
    }
}
