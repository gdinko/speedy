<?php

namespace Gdinko\Speedy;

use Gdinko\Speedy\Exceptions\SpeedyException;
use Illuminate\Support\Facades\Http;

trait MakesHttpRequests
{
    public function get($url)
    {
        return $this->request('get', $url);
    }

    public function post($url, array $data = [], $wantBody = false)
    {
        return $this->request('post', $url, $data, $wantBody);
    }

    public function put($url, array $data = [])
    {
        return $this->request('put', $url, $data);
    }

    public function request($verb, $url, $data = [], $wantBody = false)
    {
        $response = Http::withBasicAuth($this->user, $this->pass)
            ->timeout($this->timeout)
            ->baseUrl($this->baseUrl)
            ->{$verb}($url, $data)
            ->throw(function ($response, $e) {
                throw new SpeedyException(
                    $e->getMessage(),
                    $e->getCode(),
                    $response->json()
                );
            });

        if ($wantBody) {
            return $response->body();
        }

        return $response->json();
    }
}
