<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('blog.backend.tags.index',compact(
            'tags',
            ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $tag = Tag::where('title',$request->title)->first();
        if($tag == null)
        {
            $tag = Tag::create([
                'uuid' => Str::uuid(),
                'title' => $request->title,
                'is_active' => 1,
                'created_by' => Auth::id(),
            ]);
            return redirect()->route('tags.index')->withSuccess('Tag has been Created successfully!');
        }else{
            return redirect()->route('tags.index')->withSuccess('This Tag Already Exist!');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $tag = Tag::find($id);
        if ($tag) {
            $tag->delete();
        }
        return redirect()->route('tags.index')->withSuccess('Tag has been Destroyed successfully!');
    }

    public function toggleStatus($uuid)
    {
        $tag = Tag::where('uuid',$uuid)->first();
        if ($tag->is_active == 1) {
            $tag->is_active = 0;
            $tag->update();
        }elseif($tag->is_active == 0)
        {
            $tag->is_active = 1;
            $tag->update();   
        }
        
        return redirect()->route('tags.index')->withSuccess('Tag Status has been Updated successfully!');

    }
}
