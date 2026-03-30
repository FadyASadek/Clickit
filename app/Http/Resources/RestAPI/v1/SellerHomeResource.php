<?php

namespace App\Http\Resources\RestAPI\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerHomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(\Illuminate\Http\Request $request): array
    {
        $fallback = 'http://127.0.0.1:8000/storage/app/public/category/2026-01-16-6969eaf409dd9.jpg';

        // Use the model's storageLink-based accessor; it returns a string URL or null/array
        $imageFullUrl = $this->image_full_url;
        $imageUrl = (is_string($imageFullUrl) && !empty($imageFullUrl))
            ? $imageFullUrl
            : $fallback;

        return [
            'id'             => (int) $this->id,
            'name'           => (string) $this->name,
            'image'          => $imageUrl,
            'products_count' => (int) ($this->products_count ?? 0),
        ];
    }
}
