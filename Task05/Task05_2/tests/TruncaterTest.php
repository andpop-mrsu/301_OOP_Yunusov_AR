<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testDefaultTruncate()
    {
        $truncater = new Truncater();
        $this->assertEquals("Юнусов Айдар Ренатович", $truncater->truncate("Юнусов Айдар Ренатович"));
    }

    public function testCustomLength()
    {
        $truncater = new Truncater();
        $this->assertEquals("Юнусов Айд...", $truncater->truncate("Юнусов Айдар Ренатович", ['length' => 10]));
    }

    public function testLongerThanDefault()
    {
        $truncater = new Truncater();
        $this->assertEquals("Юнусов Айдар Ренатович", $truncater->truncate("Юнусов Айдар Ренатович", ['length' => 50]));
    }

    public function testNegativeLength()
    {
        $truncater = new Truncater();
        $this->assertEquals("", $truncater->truncate("Юнусов Айдар Ренатович", ['length' => -10]));
    }

    public function testCustomSeparator()
    {
        $truncater = new Truncater();
        $this->assertEquals("Юнусов Айд*", $truncater->truncate("Юнусов Айдар Ренатович", ['length' => 10, 'separator' => '*']));
    }

    public function testCustomSeparatorDefaultLength()
    {
        $truncater = new Truncater();
        $this->assertEquals("Юнусов Айдар Ренатович", $truncater->truncate("Юнусов Айдар Ренатович", ['separator' => '*']));
    }
}