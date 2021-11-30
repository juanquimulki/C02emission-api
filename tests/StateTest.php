<?php

class StateTest extends TestCase
{
    public function testShouldReturnCaliforniaOnTheStatesList()
    {
        $this->json('GET', '/state')
             ->seeJson([
                'California',
             ]);
    }

    public function testShouldReturn200AndTheWholeStatesList()
    {
        $statesLen = 51;
        $content = $this->json("GET", '/state')->seeStatusCode(200)->response->decodeResponseJson();
        $result = $content["result"];
        $this->assertEquals(count($result), $statesLen);

    }
}
