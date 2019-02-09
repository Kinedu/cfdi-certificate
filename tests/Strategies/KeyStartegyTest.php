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
use Kinedu\CfdiCertificate\Strategies\KeyStrategy;

class KeyStrategyTest extends TestCase
{
    public function testConvertKeyToPem()
    {
        $keyFileName = './tests/files/CSD01_AAA010101AAA.key';
        $password = '12345678a';

        $strategy = new KeyStrategy($keyFileName, $password);

        $this->assertEquals(
            $strategy->convertToPem(),
            file_get_contents("{$keyFileName}.pem")
        );
    }
}
