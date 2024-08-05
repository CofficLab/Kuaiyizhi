<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class IdeaController extends Controller
{
    public function __construct()
    {
        Idea::query()->firstOrCreate([
            'uuid' => config('app.root_name'),
        ], [
            'title'     => 'Public Root',
            'content'   => '',
            'parent_id' => '',
            'priority'  => 0,
        ]);
    }

    public function index()
    {
        $ideas = Idea::where('parent_id', config('app.root_name'))
            ->orderBy('priority', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(100);

        return view('ideas.index', compact('ideas'));
    }

    public function show(string $id)
    {
        $idea            = Idea::findOrFail($id);
        $contentInBase64 = base64_encode($idea->content);

        return view('ideas.show', [
            'idea'            => $idea,
            'contentInBase64' => $contentInBase64,
        ]);
    }
}
