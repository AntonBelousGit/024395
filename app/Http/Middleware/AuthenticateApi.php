<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateApi extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        $token = $request->query('api_token');

        if (empty($token)) {
            $token = $request->input('api_token');
        }
        if (empty($token)) {
            $token = $request->bearerToken();
        }
        if (in_array($token,config('apiTokens'))) return;

        $this->unauthenticated($request,$guards);
    }
}
