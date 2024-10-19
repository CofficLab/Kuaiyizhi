<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $exportedNode = $this->resource->toExportedNode();

        return [
            'uuid'      => $exportedNode->uuid,
            'title'     => $exportedNode->title,
            'priority'  => $exportedNode->priority,
            'parentId'  => $exportedNode->parentId,
            'createdAt' => $exportedNode->createdAt->toDateTimeString(),
            'updatedAt' => $exportedNode->updatedAt->toDateTimeString(),
            'content'   => $exportedNode->content,
            'routes'    => $exportedNode->routes,
            'children'  => [],
        ];
    }
}
