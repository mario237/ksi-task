<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @see \App\Models\Entry */
class EntriesCollection extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'message' => $this['message'],
            'sentiment' => $this['sentiment']
        ];
    }
}
