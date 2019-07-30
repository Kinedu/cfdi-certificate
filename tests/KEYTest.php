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

use PHPUnit\Framework\TestCase;
use Kinedu\CFDI\Certificate\KEY;

class KEYTest extends TestCase
{
    public function testConvertKeyToPem()
    {
        $keyFileName = './tests/files/CSD01_AAA010101AAA.key';
        $password = '12345678a';

        $strategy = new KEY($keyFileName, $password);

        $this->assertEquals(
            $strategy->decode(),
            file_get_contents("{$keyFileName}.pem")
        );
    }
}
