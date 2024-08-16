<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChildResource;
use App\Http\Resources\IdeaCollection;
use App\Http\Resources\IdeaResource;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class IdeaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::query()
            ->orderBy(request('order_by', 'priority'), request('order_direction', 'asc'))
            ->paginate(request('per_page', 10));

        return IdeaResource::collection($ideas);
    }

    public function count()
    {
        $count = Idea::query()->count();

        return response()->json([
            'count' => $count,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idea = Idea::create($request->all());
        return new IdeaResource($idea);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $ideas = Idea::query()->where("uuid", $uuid)->paginate();

        if ($ideas->isEmpty()) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        return IdeaResource::collection($ideas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $idea = Idea::find($id);

        if (!$idea) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        $idea->update($request->all());

        return response()->json([
            'message' => 'Updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $idea = Idea::find($id);

        if (!$idea) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        $idea->delete();
        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }

    /**
     * 获取一个节点的子节点
     *
     * @return IdeaCollection
     */
    public function children(Request $request, string $id)
    {
        // Log::debug("getChildren for $id");

        $ideas = Idea::where('parent_id', $id)
            ->orderBy('priority', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(request('per_page', 1000));

        return ChildResource::collection($ideas);
    }

    public function deleteMany(Request $request)
    {
        Idea::whereIn('uuid', $request->ids)->delete();

        return response()->json([
            'message' => 'done',
        ]);
    }

    /**
     * 将一个节点同步到数据库
     */
    public function sync(Request $request, string $id)
    {
        Idea::query()->updateOrCreate([
            'uuid' => $id,
        ], [
            'title'     => $request->title ?? "",
            'content'   => $request->content ?? "",
            'parent_id' => $this->getParentId($request),
            'priority'  => $request->priority ?? 0,
        ]);

        return response()->json([
            'message' => 'Synced successfully',
        ]);
    }

    private function getParentId(Request $request)
    {
        if (!$request->parent_id) {
            return config('app.root_name');
        }

        if (in_array($request->parent_id, ["remote_root", "private_root", "public_root", config('app.root_name')])) {
            return config('app.root_name');
        }

        return $request->parent_id;
    }
}
