<?php

namespace App\Http\Controllers;


use App\Models\Example;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //
    public function index()
    {
        $examples = Example::all();
        // dd($examples);
        return view('examples.index', compact('examples'));
    }

    // Show create form
    public function create()
    {
        return view('examples.create');
    }

    // Store new record
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Example::create($request->only('name'));

        return redirect()->route('examples.index')->with('success', 'Example created successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $example = Example::findOrFail($id);
        return view('examples.edit', compact('example'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $example = Example::findOrFail($id);
        $example->update($request->only('name'));

        return redirect()->route('examples.index')->with('success', 'Example updated successfully');
    }

    // Soft delete
    public function destroy($id)
    {
        $example = Example::findOrFail($id);
        $example->delete();

        return redirect()->route('examples.index')->with('success', 'Example moved to trash');
    }

    // Show trash items
    public function trash()
    {
        $examples = Example::onlyTrashed()->get();
        return view('examples.trash', compact('examples'));
    }

    // Restore from trash
    public function restore($id)
    {
        Example::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('examples.trash')->with('success', 'Example restored successfully');
    }

    // Permanent delete
    public function forceDelete($id)
    {
        Example::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('examples.trash')->with('success', 'Example permanently deleted');
    }
}
