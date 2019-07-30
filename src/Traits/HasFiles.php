<?php

/*
 * This file is part of the cfdi-certificate project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CFDI\Certificate\Traits;

use Kinedu\CFDI\Certificate\Utils\IO;

trait HasFiles
{
    public function getOriginalRouteFile(string $file): string
    {
        return (new IO($file))->getOriginalRoute();
    }
}
