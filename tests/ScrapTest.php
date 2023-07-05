<?php

use Adelktr\OpenSourceTd3\Scrap;
use PHPUnit\Framework\TestCase;

class ScrapTest extends TestCase
{
    public function testFetchAllBikes()
    {
        $scrap = new Scrap();
        $this->assertIsArray($scrap->fetchAllBikes());
    }

    public function testFetchAllA2Bikes()
    {
        $scrap = new Scrap();
        $this->assertIsArray($scrap->fetchAllA2Bikes());
    }
}
