<?php

/*
 * This file is part of the cfdi-certificate project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CFDI\Certificate;

class CER extends Certificate
{
    /** @var string */
    protected $cerFile;

    /** @var integer */
    protected $chunkLength = 64;

    /** @var string */
    public $decodeExtension = 'cer.pem';

    public function __construct(string $cerFile)
    {
        $this->cerFile = file_get_contents(
            $this->getOriginalRouteFile($cerFile)
        );
    }

    public function decode(): string
    {
        $prefix = "-----BEGIN CERTIFICATE-----\n";
        $suffix = "-----END CERTIFICATE-----\n";

        $pem = base64_encode($this->cerFile);
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
        return openssl_x509_parse($this->decode());
    }

    protected function dateFormat(string $date): string
    {
        return date('Y-m-d H:i:s', $date);
    }
}
