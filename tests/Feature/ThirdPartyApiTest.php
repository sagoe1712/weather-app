<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ThirdPartyApiTest extends TestCase
{

    protected $thirdPartyUrl = 'https://api.weatherbit.io/v2.0/current?';

    protected $apiKey = 'ed25b21bc1e34d79915eab85fcd91c3f';

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testThirdPartyApi()
    {

        $data = [];
        $data['lat'] = 38.123;
        $data['lon'] = -78.543;
        $data['key'] = 'ed25b21bc1e34d79915eab85fcd91c3f';

        $response = Http::get($this->thirdPartyUrl, $data);

        $this->assertTrue($response->successful());
    }
}
