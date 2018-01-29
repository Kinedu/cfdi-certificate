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

class CerStartegyTest extends TestCase
{
    public function testConvertCerToPem()
    {
        $cerFileName = './tests/files/CSD01_AAA010101AAA.cer';

        $strategy = new CerStrategy($cerFileName);

        $this->assertEquals(
            $strategy->convertToPem(),
            file_get_contents("{$cerFileName}.pem")
        );
    }
}
