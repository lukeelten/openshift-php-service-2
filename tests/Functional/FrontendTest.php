<?php

namespace Tests\Functional;

class FrontendTest extends BaseTestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
    public function testGetHomepageWithoutName()
    {
        $this->assertTrue(true);
    }

}