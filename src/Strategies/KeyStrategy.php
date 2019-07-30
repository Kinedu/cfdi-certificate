<?php

/*
 * This file is part of the cfdi-certificate project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CFDI\Certificate\Strategies;

class KeyStrategy
{
    /**
     * File to decode.
     *
     * @var string
     */
    protected $file;

    /**
     * Password to decode the file.
     *
     * @var string
     */
    protected $password;

    /**
     * Create a new key strategy instance.
     *
     * @param string $file
     * @param string $password
     */
    public function __construct(string $file, string $password)
    {
        $this->file = $file;

        $this->password = $password;
    }

    public function decode(): string
    {
        return shell_exec(sprintf(
            "openssl pkcs8 -inform DER -in %s -passin pass:%s",
            $this->file,
            $this->password
        ));

        return $pem;
    }
}
