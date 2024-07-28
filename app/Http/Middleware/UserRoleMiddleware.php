<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $role): Response
  {
    if (auth()->user()->role != $role) {
      if (auth()->user()->role == 'company') {
        return redirect()->route('company.dashboard');
      }
      if (auth()->user()->role == 'candidate') {
        return redirect()->route('candidate.dashboard');
      }
    }
    return $next($request);
  }
}
