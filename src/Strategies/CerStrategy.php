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
    protected $chunkLength = 64;

    /**
     * Create a new cer strategy instance.
     *
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = file_get_contents($file);
    }

    /**
     * Convert .cer to .pem
     *
     * @return string
     */
    public function convertToPem(): string
    {
        $prefix = "-----BEGIN CERTIFICATE-----\n";
        $suffix = "-----END CERTIFICATE-----\n";

        $pem = base64_encode($this->file);
        $pem = chunk_split($pem, $this->chunkLength, "\n") ;
        $pem = $prefix.$pem.$suffix;

        return $pem;
    }

    public function getCertificateNumber(): string
    {
        $data = $this->parseCertificate();
        $data = str_split($data['serialNumberHex'], 2);

        $serialNumber = null;

        for ($i = 0; $i < sizeof($data); $i++) {
            $serialNumber .= substr($data[$i], 1);
        }

        return $serialNumber;
    }

    public function getExpirationDate(): string
    {
        $data = $this->parseCertificate();

        return $this->dateFormat($data['validTo_time_t']);
    }

    public function getInitialDate(): string
    {
        $data = $this->parseCertificate();

        return $this->dateFormat($data['validFrom_time_t']);
    }

    protected function parseCertificate(): array
    {
        return openssl_x509_parse($this->convertToPem());
    }

    protected function dateFormat(string $date): string
    {
        return date('Y-m-d H:i:s', $date);
    }
}
