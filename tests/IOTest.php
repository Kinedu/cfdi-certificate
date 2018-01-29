<?php

/*
 * This file is part of the cfdi-certificate project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiCertificate\Test;

use PHPUnit\Framework\TestCase;
use Kinedu\CfdiCertificate\IO;

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
            $this->io->getFileExstensionName(),
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

    public function testGetOrginalRoute()
    {
        $this->assertEquals(
            $this->io->getOrginalRoute(),
            $this->file
        );
    }
}
