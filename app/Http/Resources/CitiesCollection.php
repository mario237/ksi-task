<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @see \App\Models\City
 * @method entries()
 */
class CitiesCollection extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this['name'],
            'sentiments' => $this->entries()->pluck('sentiment')
        ];
    }
}
