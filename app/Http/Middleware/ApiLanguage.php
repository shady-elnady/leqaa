<?php

namespace App\Http\Middleware;

use App\Models\Locale;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class ApiLanguage
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response|RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language = $request->header('Accept-Language');

        if (is_null($language)) {
            return $this->jsonResponse(
                success: false,
                message: __('auth.language_not_provided'),
                status: 400
            );
        }

        if (!Locale::pluck('locale_code')->contains($language)) {
            $language = config('app.fallback_locale');
        }

        App::setLocale($language);

        return $next($request);
    }
}
