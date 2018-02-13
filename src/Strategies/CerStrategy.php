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
     * @var string
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
        $this->file = file_get_contents($file);
    }

    /**
     * Convert .cer to .pem
     *
     * @return string
     */
    public function convertToPem() : string
    {
        $prefix = "-----BEGIN CERTIFICATE-----\n";
        $suffix = "-----END CERTIFICATE-----\n";

        $pem = base64_encode($this->file);
        $pem = chunk_split($pem, $this->chunklen, "\n") ;
        $pem = $prefix.$pem.$suffix;

        return $pem;
    }

    /**
     * @return string
     */
    public function getNoCertificado()
    {
        $data = $this->parseCertificate();
        $data = str_split($data['serialNumberHex'], 2);

        for ($i = 0; $i < sizeof($data); $i++) {
            $serialNumber .= substr($data[$i], 1);
        }

        return $serialNumber;
    }

    /**
     * @return array
     */
    protected function parseCertificate()
    {
        return openssl_x509_parse($this->convertToPem());
    }
}
