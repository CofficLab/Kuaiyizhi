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

    public function getContent(): string {
        $content = $this->content;
        $imageCounter = 0; // 初始化计数器

        // 使用正则表达式提取 base64 图片并保存到磁盘
        preg_match_all("/<img[^>]+src=\"data:image\/([^;]+);base64,([^\"']+)\"/", $content, $matches);

        foreach ($matches[0] as $match) {
            $imageCounter++; // 增加计数器

            // 获取图片类型和 base64 数据
            $imageType = $matches[1][$imageCounter - 1];
            $base64Data = $matches[2][$imageCounter - 1];

            // 解码 base64 数据
            $imageData = base64_decode($base64Data);

            // 生成文件名和存储路径
            $fileName = $this->uuid . '-' . $imageCounter . '.' . $imageType; // 采用 x-y 格式
            $filePath = '/cache/' . $fileName; // 存储在 images 目录中
            $storePath = public_path($filePath);

            // 将图片数据写入文件
            file_put_contents($storePath, $imageData);

            // 替换 HTML 中的 img src
            $content = str_replace($match, '<img src="' . $filePath . '"', $content);
        }

        return $content;
    }


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
