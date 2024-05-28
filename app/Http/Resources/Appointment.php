<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Appointment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => strtoupper($this->reason),
            'start' => $this->begin,
            'end' => $this->end,
            'end' => $this->end,
            'session' => $this->session,
            'color' => $this->color,
            'textColor' => $this->textColor,
            'user_id' => $this->user_id,
        ];
    }
}
