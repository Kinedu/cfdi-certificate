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
     * File to decode.
     *
     * @var string
     */
    protected $file;

    /**
     * Password to the decode the file.
     *
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $strategy;

    /**
     * Create a new certificate instance.
     *
     * @param string $file
     * @param string $password
     * @param string $strategy
     */
    public function __construct(string $file, string $password = null, string $strategy = null)
    {
        $this->file = new IO($file);
        $this->password = $password;
        $this->strategy = $strategy;
    }

    /**
     * @return CerStrategy|KeyStrategy|null
     */
    protected function getStrategy()
    {
        switch ($this->getFileExstensionName()) {
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
    public function decode(): string
    {
        $strategy = $this->getStrategy();
        $pem = $strategy->convertToPem();

        return $pem;
    }

    /**
     * @param string $directory
     * @param string $filename
     *
     * @return integer|bool
     */
    public function save(string $directory, string $filename = null)
    {
        $filename  = $filename ?? $this->file->getFileName();
        $extension = $this->getFileExstensionName();

        $directory = rtrim($directory, '/').'/';
        $directory = "{$directory}{$filename}.{$extension}.pem";

        return file_put_contents($directory, $this->decode());
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

    /**
     * @return string
     */
    protected function getFileExstensionName()
    {
        return $this->strategy ?? $this->file->getFileExstensionName();
    }
}
