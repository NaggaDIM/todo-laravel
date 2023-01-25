<?php

namespace App\Http\Resources;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Task */
class TaskResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'status'        => $this->status->name,
            'description'   => $this->description,
        ];
    }
}
