<?php

require_once('vendor/autoload.php');

use Kinedu\CFDI\Certificate\Certificate;

$certificate = new Certificate('file', 'password', 'strategy');
