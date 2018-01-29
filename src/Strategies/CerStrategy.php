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

class CerStrategy
{
    /**
     * File to decode.
     *
     * @var
     */
    protected $file;

    /**
     * Chunk length.
     *
     * @var integer
     */
    protected $chunklen = 64;

    /**
     * Create a new cer strategy instance.
     *
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Convert .cer to .pem
     *
     * @return string
     */
    public function convertToPem()
    {
        $prefix = "-----BEGIN CERTIFICATE-----\n";
        $suffix = "-----END CERTIFICATE-----\n";

        $pem = base64_encode($this->file);
        $pem = chunk_split($pem, $this->chunklen, "\n") ;
        $pem = $prefix.$pem.$suffix;

        return $pem;
    }
}
