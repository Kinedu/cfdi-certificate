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

class KEY extends Certificate
{
    /** @var string */
    protected $keyFile;

    /** @var string */
    protected $password;

    /** @var string */
    public $decodeExtension = 'key.pem';

    public function __construct(string $keyFile, string $password)
    {
        $this->keyFile = $this->getOriginalRouteFile($keyFile);

        $this->password = $password;
    }

    public function decode(): ?string
    {
        return shell_exec(sprintf(
            "openssl pkcs8 -inform DER -in %s -passin pass:%s",
            $this->keyFile,
            $this->password
        ));
    }
}
