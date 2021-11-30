<?php

class EmissionTest extends TestCase
{
    public function testShouldReturnCorrectCaliforniaValue()
    {
        $this->json('GET', '/emission/California/2003/2006')
             ->seeJson([
                'value' => "8.3 million",
             ]);
    }

    public function testShouldReturn404ForUnexistingEndpoint()
    {
        // unexisting endpoint
        $this->json("GET", '/emission')->seeStatusCode(404);

    }

    public function testShouldReturn500ForUnexistingState()
    {
        // unexisting state
        $this->json("GET", '/emission/Unknown/1980/2018')->seeStatusCode(500);

    }
}
