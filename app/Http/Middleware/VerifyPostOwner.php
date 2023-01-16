<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class VerifyPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $postId = $request->segments()[3];
        $post= Post::findOrFail($postId);

        if (!auth()->user()->isAdmin() && $post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
