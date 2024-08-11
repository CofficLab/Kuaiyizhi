<?php

namespace App\Models;

use App\Entities\ExportedNode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $table      = 'ideas';
    protected $primaryKey = 'uuid';
    protected $keyType    = 'string';

    protected $fillable = [
        'uuid',
        'title',
        'content',
        'priority',
        'parent_id',
        'is_page',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'uuid');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'uuid');
    }

    /**
     * 获取子节点，仅仅是子节点，不包括子节点的子节点
     */
    public function getChildren()
    {
        return $this->children()->orderBy('priority', 'asc')->get();
    }

    // 获取所有的子孙节点
    public function getDescendants()
    {
        return $this->getChildren()->transform(function ($child) {
            $child->children = $child->getDescendants();

            return $child;
        });
    }

    public function getParent(): Idea | null
    {
        return $this->parent;
    }

    public function getPages()
    {
        return $this->getChildren()->filter(function ($child) {
            return $child->is_page;
        });
    }

    public function getFirstChild()
    {
        return $this->getChildren()->first();
    }

    public function getFirstPage()
    {
        if ($this->is_page) {
            return $this;
        }

        return $this->getFirstChild()->getFirstPage();
    }

    public function getRoutes()
    {
        $current    = $this;
        $collection = collect();

        while ($current) {
            $collection->push($current->uuid);
            $current = $current->getParent();
        }

        return $collection;
    }

    public function getBook()
    {
        $parent = $this->getParent();

        if ($parent->getParent() == null) {
            return $this;
        }

        return $parent->getBook();
    }

    public function getBookTitle()
    {
        return $this->getRoutes()->reverse()->get(1)->title;
    }

    public function getBookUrl()
    {
        return $this->getRoutes()->reverse()->get(1)->uuid;
    }

    public function getBookUrlByTitle($title)
    {
        return $this->getRoutes()->reverse()->get(1)->uuid;
    }

    public function toExportedNode()
    {
        $exportedNode            = new ExportedNode;
        $exportedNode->uuid      = $this->uuid;
        $exportedNode->title     = $this->title;
        $exportedNode->content   = $this->content;
        $exportedNode->priority  = $this->priority;
        $exportedNode->parentId  = $this->parent_id;
        $exportedNode->createdAt = $this->created_at;
        $exportedNode->updatedAt = $this->updated_at;

        if (count($this->children) > 0) {
            foreach ($this->children as $child) {
                $exportedNode->children[] = $child->toExportedNode();
            }
        }

        return $exportedNode;
    }
}
