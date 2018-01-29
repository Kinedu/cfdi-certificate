<?php

/*
 * This file is part of the cfdi-certificate project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiCertificate\Strategies;

class KeyStrategy
{
    /**
     * File to decode.
     *
     * @var
     */
    protected $file;

    /**
     * @var string
     */
    protected $password;

    /**
     * Create a new key strategy instance.
     *
     * @param $file
     * @param string $password
     */
    public function __construct($file, string $password)
    {
        $this->file = $file;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function convertToPem() : string
    {
        $pem = shell_exec("openssl pkcs8 -inform DER -in {$this->file} -passin pass:{$this->password}");

        return $pem;
    }
}
