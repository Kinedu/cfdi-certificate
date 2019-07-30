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

class IO
{
    /** @var string */
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

    public function getFileName(): string
    {
        $name = pathinfo($this->file);
        $name = $name['filename'];

        return $name;
    }

    public function getFileExtensionName(): string
    {
        $ext = strrchr($this->file, '.');
        $ext = substr($ext, 1);

        return $ext;
    }

    public function getOriginalRoute(): string
    {
        return $this->file;
    }
}
