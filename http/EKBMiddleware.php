<?php

namespace eKuaiBao\http;

use eKuaiBao\apiCache\Token;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Uri;


class EKBMiddleware
{
    public static function auth(Token $token): callable
    {
        return Middleware::mapRequest(function (RequestInterface $request) use ($token) {
            return $request->withUri(Uri::withQueryValue($request->getUri(), 'accessToken', $token->get()['accessToken']));
        });
    }
    public static function response(): callable
    {
        return Middleware::mapResponse(function (ResponseInterface $response) {
                return new Response(
                $response->getStatusCode(),
                $response->getHeaders(),
                $response->getBody(),
                $response->getProtocolVersion(),
                $response->getReasonPhrase()
            );
        });
    }
}

