<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
            'id'           => $this->id,
            'role_name'    => $this->role_name,
            'full_name'    => $this->full_name,
            'email'        => $this->email,
            'phone_number' => $this->phone_number,
            'created_at'   => $this->created_at,
        ];
    }
}
