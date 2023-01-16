<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use Closure;
use Illuminate\Http\Request;

class VerifyCommentOwner
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
        $commentId = $request->segments()[3];
        $comment = Comment::findOrFail($commentId);

        if (!auth()->user()->isAdmin() && $comment->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
