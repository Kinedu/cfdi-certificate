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

class IO
{
    /**
     * @var string
     */
    protected $file;

    /**
     * Create a new IO instance.
     *
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getFileName() : string
    {
        $name = pathinfo($this->file);
        $name = $name['filename'];

        return $name;
    }

    /**
     * @return string
     */
    public function getFileExstensionName() : string
    {
        $ext = strrchr($this->file, '.');
        $ext = substr($ext, 1);

        return $ext;
    }

    /**
     * @return string
     */
    public function getOrginalRoute() : string
    {
        return $this->file;
    }
}
