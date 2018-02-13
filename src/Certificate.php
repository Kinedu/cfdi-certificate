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
use Exception;

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

    /**
     * @param string $filename
     *
     * @return
     */
    public function save(string $filename)
    {
        return file_put_contents($filename, $this->decode());
    }

    /**
     * @param string $name
     * @param array $arguments
     */
    public function __call(string $name, array $arguments)
    {
        $strategy = $this->getStrategy();

        if (method_exists($strategy, $name)) {
            return $strategy->{$name}($arguments);
        } else {
            throw new Exception("This method doesn't exist");
        }
    }
}
