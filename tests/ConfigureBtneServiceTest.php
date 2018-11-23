<?php

namespace Tests;

use Bitcoinnova\Bitcoinnova-Service;

class ConfigureBitcoinnova.ServiceTest extends TestCase
{
    public function testConfigureDefaultValues()
    {
        $Bitcoinnova-Service = new Bitcoinnova.Service();
        $Bitcoinnova-Service->configure([]);
        $this->assertEquals([
            'rpcHost'      => 'http://127.0.0.1',
            'rpcPort'      => 8070,
            'rpcPassword'  => 'test',
            'rpcBaseRoute' => '/json_rpc',
        ], $Bitcoinnova-Service->config());
    }

    public function testConfigureAllValues()
    {
        $Bitcoinnova-Service = new Bitcoinnova.Service();
        $Bitcoinnova-Service->configure([
            'rpcHost'      => 'https://192.168.10.10',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ]);

        $this->assertEquals([
            'rpcHost'      => 'https://192.168.10.10',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ], $Bitcoinnova-Service->config());
    }

    public function testConfigureViaConstructor()
    {
        $Bitcoinnova-Service = new Bitcoinnova.Service([
            'rpcHost'      => 'https://192.168.10.10',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ]);

        $this->assertEquals([
            'rpcHost'      => 'https://192.168.10.10',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ], $Bitcoinnova-Service->config());
    }

    public function testConfigureDoesntOverwriteOtherVariables()
    {
        $Bitcoinnova-Service = new Bitcoinnova.Service();
        $Bitcoinnova-Service->configure([
            'client' => 'should not be able to set this value',
        ]);

        $this->assertNotEquals($Bitcoinnova-Service->client(), 'should not be able to set this value');
    }
}