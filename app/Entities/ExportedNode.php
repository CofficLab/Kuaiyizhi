<?php

namespace App\Entities;

use App\Models\Idea;
use Illuminate\Support\Facades\Log;

class ExportedNode
{
    public $id;
    public $title   = "";
    public $content = "";
    // 上级节点的uuid的数组
    public $routes   = [];
    public $children = [];

    public function appendChild($child = null)
    {
        $this->children[] = $child;
    }

    static public function fromJsonString($jsonString = ""): self
    {
        $data = json_decode($jsonString, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception(json_last_error_msg());
        }

        if (!isset($data['title'])) {
            Log::debug("缺少title字段\n", $data);
        } else {
            Log::debug("从JSON字符串转换成Node对象->" . $data['title']);
        }

        $node          = new self;
        $node->uuid    = $data['uuid'] ?? "";
        $node->title   = $data['title'] ?? "";
        $node->content = $data['content'] ?? "";

        if (count($data['children']) > 0) {
            foreach ($data['children'] as $child) {
                $node->appendChild(self::fromJsonString(json_encode($child)));
            }
        }

        return $node;
    }

    public function save(string $parentId = "")
    {
        $node            = new Idea();
        $node->uuid      = $this->uuid;
        $node->title     = $this->title;
        $node->content   = $this->content;
        $node->parent_id = $parentId;
        $node->priority  = 1;
        $node->save();

        foreach ($this->children as $child) {
            $child->save($this->uuid);
        }
    }

    public function toArray(): array
    {
        return [
            'uuid'     => $this->uuid,
            'title'    => $this->title,
            'routes'   => $this->routes,
            'content'  => $this->content,
            'children' => $this->children,
        ];
    }
}
