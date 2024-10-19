<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChildResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid'      => $this->resource->uuid,
            'title'     => $this->resource->title,
            'priority'  => $this->resource->priority,
            'parentId'  => $this->resource->parent_id,
            'createdAt' => $this->resource->created_at->toDateTimeString(),
            'updatedAt' => $this->resource->updated_at->toDateTimeString(),
            'content'   => $this->resource->content,
            'children'  => [],
        ];

    }
}
