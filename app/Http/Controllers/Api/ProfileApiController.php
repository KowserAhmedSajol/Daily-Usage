<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class ProfileApiController extends Controller
{
    public function changeCover(Request $request)
    {
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverPath = $cover->store('profile/cover_images', 'public');
            $coverFilename = basename($coverPath);
            $profile = Profile::where('user_id', $user->id)->first();
            if ($profile) {
                if ($profile->cover_image) {
                    Storage::disk('public')->delete('profile/cover_images/' . $profile->cover_image);
                }
                $profile->cover_image = $coverFilename;
                $profile->save();
            } else {
                return response()->json(['message' => 'Profile not found'], 404);
            }

            return response()->json(['message' => 'Cover photo updated successfully', 'cover_image' => $coverFilename]);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }
}
