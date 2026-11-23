<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class ConfigureSpotlightSubdomains
{
    /**
     * Dedicated AI spotlight subdomain prefixes mapped by the application.
     *
     * @var array<int, string>
     */
    protected const SUBDOMAIN_PREFIXES = [
        'aiapplyreview',
        'anarareview',
        'typelessreview',
        'iapplyreview',
        'aiapply',
        'iapply',
        'anara',
        'typeless',
    ];

    /**
     * Configure default base_domain parameter and root/asset origins for spotlight subdomains.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = strtolower($request->getHost());
        $isSpotlightSubdomain = false;
        $baseDomain = $host;

        foreach (self::SUBDOMAIN_PREFIXES as $prefix) {
            $needle = $prefix.'.';
            if (str_starts_with($host, $needle) && strlen($host) > strlen($needle)) {
                $isSpotlightSubdomain = true;
                $baseDomain = substr($host, strlen($needle));
                break;
            }
        }

        if (str_starts_with($baseDomain, 'www.')) {
            $baseDomain = substr($baseDomain, 4);
        }

        if ($baseDomain === '' || filter_var($baseDomain, FILTER_VALIDATE_IP)) {
            $baseDomain = 'localhost';
        }

        URL::defaults(['base_domain' => $baseDomain]);

        if ($isSpotlightSubdomain) {
            $port = $request->getPort();
            $portSuffix = ($port && ! in_array((int) $port, [80, 443], true)) ? ':'.$port : '';
            $mainOrigin = $request->getScheme().'://'.$baseDomain.$portSuffix;

            URL::useOrigin($mainOrigin);
            URL::useAssetOrigin($request->getSchemeAndHttpHost());
            $request->route()?->forgetParameter('base_domain');
        } else {
            URL::useOrigin(null);
            URL::useAssetOrigin(null);
        }

        return $next($request);
    }
}
