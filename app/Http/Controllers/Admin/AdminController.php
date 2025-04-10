<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Numbers;
use App\Models\BlogPost;
use App\Http\Controllers\Controller;;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::whereHas('tenants', function ($query) {
            $query->where('tenant_user.role_as', 'tenantadmin');
        })->with(['tenants' => function ($query) {
            $query->where('tenant_user.role_as', 'tenantadmin')->with('domains');
        }])->get();

        // dd($users);
        return view('admin.dashboard.index', compact('users'));
    }


    // In UserController.php
    public function approveUser(User $user)
    {
        // Update the 'verified_by_admin' field to 1
        $user->verified_by_admin = 1;
        $user->save();

        // Return a success response
        return response()->json(['status' => true, 'message' => 'User approved successfully']);
    }

    public function alltenantpost()
    {
        $posts = BlogPost::get();
        // dd($users);
        return view('admin.dashboard.post', compact('posts'));
    }

    // In PostController.php
    public function getPostDetails($postId)
    {
        // Fetch the post by ID
        $post = BlogPost::find($postId);

        if ($post) {
            // Return the post details in JSON format
            return response()->json([
                'status' => true,
                'data' => [
                    'title' => $post->title,
                    'content' => $post->content,
                    'user_name' => $post->user->name,
                    'tenant_id' => $post->tenant_id
                ]
            ]);
        } else {
            // Return an error if the post is not found
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ]);
        }
    }
}
