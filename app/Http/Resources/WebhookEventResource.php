<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WebhookEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'event' => $this->event_name,
            'status' => $this->status,
            'provider_event_id' => $this->provider_event_id,

            'endpoint' => [
                'id' => $this->endpoint->id ?? null,
                'name' => $this->endpoint->name ?? null,
                'key' => $this->endpoint->webhook_key ?? null,
            ],

            'received_at' => $this->received_at,
            'created_at' => $this->created_at,
        ];
    }
}
