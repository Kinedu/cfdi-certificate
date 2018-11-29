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
use Kinedu\CfdiCertificate\Certificate;

class CertificateTest extends TestCase
{
    public function testDecodeCerFile()
    {
        $cerFile = './tests/files/CSD01_AAA010101AAA.cer';
        $cerDecodeFile = './tests/files/CSD01_AAA010101AAA.cer.pem';

        $cer = new Certificate($cerFile);

        $this->assertEquals(
            $cer->decode(),
            file_get_contents($cerDecodeFile)
        );
    }

    public function testDecodeKeyFile()
    {
        $keyFile = './tests/files/CSD01_AAA010101AAA.key';
        $keyDecodeFile = './tests/files/CSD01_AAA010101AAA.key.pem';
        $password = '12345678a';

        $key = new Certificate($keyFile, $password);

        $this->assertEquals(
            $key->decode(),
            file_get_contents($keyDecodeFile)
        );
    }
}
