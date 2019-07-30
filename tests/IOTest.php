<?php

/*
 * This file is part of the cfdi-certificate project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CFDI\Certificate\Test;

use Kinedu\CFDI\Certificate\IO;
use PHPUnit\Framework\TestCase;

class IOTest extends TestCase
{
    protected $io;

    protected $file = './tests/files/CSD01_AAA010101AAA.key';

    public function setUp()
    {
        $this->io = new IO($this->file);
    }

    public function testExtensionFileName()
    {
        $this->assertEquals(
            $this->io->getFileExtensionName(),
            'key'
        );
    }

    public function testGetFileName()
    {
        $this->assertEquals(
            $this->io->getFileName(),
            'CSD01_AAA010101AAA'
        );
    }

    public function testGetOriginalRoute()
    {
        $this->assertEquals(
            $this->io->getOriginalRoute(),
            $this->file
        );
    }
}
