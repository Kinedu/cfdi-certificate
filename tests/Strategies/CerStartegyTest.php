<?php

/*
 * This file is part of the cfdi-certificate project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiCertificate\Test\Strategies;

use PHPUnit\Framework\TestCase;
use Kinedu\CfdiCertificate\Strategies\CerStrategy;

class CerStrategyTest extends TestCase
{
    protected $cerFileName = './tests/files/CSD01_AAA010101AAA.cer';

    public function testConvertCerToPem()
    {
        $strategy = new CerStrategy($this->cerFileName);

        $this->assertEquals(
            $strategy->convertToPem(),
            file_get_contents("{$this->cerFileName}.pem")
        );
    }

    public function testGetCertificateNumber()
    {
        $strategy = new CerStrategy($this->cerFileName);

        $this->assertEquals(
            $strategy->getCertificateNumber(),
            '30001000000300023708'
        );
    }

    public function testGetExpirationDate()
    {
        $strategy = new CerStrategy($this->cerFileName);

        $this->assertEquals(
            $strategy->getExpirationDate(),
            '2021-05-18 03:54:56'
        );
    }

    public function testGetInitialDate()
    {
        $strategy = new CerStrategy($this->cerFileName);

        $this->assertEquals(
            $strategy->getInitialDate(),
            '2017-05-18 03:54:56'
        );
    }
}
