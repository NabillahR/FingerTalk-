<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FingerTalkTest extends TestCase
{
    public function testIndex()
    {
        $controller = new ExampleController();
        $response = $controller->index();
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }
}
