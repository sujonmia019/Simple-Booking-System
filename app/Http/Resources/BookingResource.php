<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $service = $this->service;

        return [
            'id'      => $this->id,
            'service' => $service ? [
                'id'   => $service->id,
                'name' => $service->name,
            ] : null,
            'booking_date' => $this->booking_date,
            'status'       => BOOKING_STATUS[$this->status] ?? $this->status,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at
        ];
    }
}
