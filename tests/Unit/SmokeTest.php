<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SmokeTest extends TestCase
{
    public function testRulesetAvailable(): void
    {
        $this->assertFileExists(dirname(__DIR__, 2) . '/phpcs.xml.dist');
    }
}

