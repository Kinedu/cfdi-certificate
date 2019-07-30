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

use Kinedu\Traits\HasFiles;

class PfxStrategy
{
    use HasFiles;

    /** @var string */
    protected $keyFile;

    /** @var string */
    protected $cerFile;

    /** @var string */
    protected $password;

    /** @var string */
    protected $extension = 'pfx';

    /**
     * Create a new pfx strategy instance.
     *
     * @param array $params
     * @param string $keyFile
     * @param string $cerFile
     * @param string $password
     */
    public function __construct(array $params)
    {
        $this->keyFile = $keyFile;

        $this->cerFile = $cerFile;
        $this->password = $this->getParam($params, 3);
    }

    public function decode()
    {
        return shell_exec(sprintf(
            'openssl pkcs12 -export -in %s -inkey %s -passout pass:%s',
            $this->cerFile,
            $this->keyFile,
            $this->password
        ));
    }
}
