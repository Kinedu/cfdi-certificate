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

use Kinedu\CFDI\Certificate\Traits\HasFiles;

abstract class Certificate
{
    use HasFiles;

    abstract public function decode(): ?string;

    public function save(string $directory, string $filename)
    {
        $extension = $this->decodeExtension;

        $directory = rtrim($directory, '/').'/';
        $directory = "{$directory}{$filename}.{$extension}";

        return file_put_contents($directory, $this->decode());
    }
}
