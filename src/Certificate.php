<?php

/*
 * This file is part of the cfdi-certificate project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiCertificate;

use Kinedu\CfdiCertificate\Strategies\CerStrategy;
use Kinedu\CfdiCertificate\Strategies\KeyStrategy;
use Kinedu\CfdiCertificate\IO;

class Certificate
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $password;

    /**
     * Create a new certificate instance.
     *
     * @param string $file
     * @param string $password
     */
    public function __construct(string $file, string $password = null)
    {
        $this->file = new IO($file);
        $this->password = $password;
    }

    /**
     * @return CerStrategy|KeyStrategy|null
     */
    protected function getStrategy()
    {
        switch ($this->file->getFileExstensionName()) {
            case 'cer':
                $strategy = new CerStrategy(
                    $this->file->getOrginalRoute()
                );
            break;

            case 'key':
                $strategy = new KeyStrategy(
                    $this->file->getOrginalRoute(),
                    $this->password
                );
            break;
        }

        return $strategy;
    }

    /**
     * @return string
     */
    public function decode() : string
    {
        $strategy = $this->getStrategy();
        $pem = $strategy->convertToPem();

        return $pem;
    }
}
