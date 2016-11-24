<?php

namespace Bluora\LaravelResourcesLoader\Tests;

use Bluora\LaravelResourcesLoader\Resource;
use PHPUnit\Framework\TestCase;

class ResourceTest extends TestCase
{
    /**
     * Test elixir override.
     *
     * @return void
     */
    public function testElixir()
    {
        global $env;

        $res = new Resource();

        // External URL's
        $url = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png';
        $this->assertEquals($res->elixir($url), $url);

        $asset = 'style.css';
        $this->assertEquals('/asset/'.$asset, $res->elixir($asset));

        $env['APP_ASSET_SOURCE'] = 'build';
        $this->assertEquals('/build/style.123456.css', $res->elixir($asset));

        $asset = 'logo.png';
        file_put_contents(__DIR__.'/temp/'.$asset, '');
        $this->assertEquals($asset, $res->elixir($asset));
        unlink(__DIR__.'/temp/'.$asset);

        file_put_contents(__DIR__.'/temp/assets/'.$asset, '');
        $this->assertEquals('/assets/'.$asset, $res->elixir($asset));
        unlink(__DIR__.'/temp/assets/'.$asset);

        $asset = 'logo1.png';
        $this->assertEquals('', $res->elixir($asset));
    }
}
