# ![Kinedu](https://raw.githubusercontent.com/Kinedu/cfdi-certificate/gh-pages/assets/img/logo.png)

[![Travis](https://img.shields.io/travis/Kinedu/cfdi-certificate.svg?style=flat-square)](https://travis-ci.org/Kinedu/cfdi-certificate)
[![StyleCI](https://styleci.io/repos/118187006/shield?branch=master)](https://styleci.io/repos/118187006)
[![Quality Score](https://img.shields.io/scrutinizer/g/Kinedu/cfdi-certificate.svg?style=flat-square)](https://scrutinizer-ci.com/g/Kinedu/cfdi-certificate)
[![Total Downloads](https://poser.pugx.org/kinedu/cfdi-certificate/downloads?format=flat-square)](https://packagist.org/packages/kinedu/cfdi-certificate)
[![License](https://img.shields.io/github/license/kinedu/cfdi-certificate.svg?style=flat-square)](https://packagist.org/packages/kinedu/cfdi-certificate)

## Installation

```shell
composer require kinedu/cfdi-certificate
```

## Use
```php
use Kinedu\CfdiCertificate\Certificate;

$cerFile  = 'CSD01_AAA010101AAA.cer';
$keyFile  = 'CSD01_AAA010101AAA.key';
$password = '12345678a';

$cer = new Certificate($cerFile);
$cer->decode();

$key = new Certificate($keyFile, $password);
$key->decode();
```

```php
use Kinedu\CfdiCertificate\Certificate;

$cerFile = 'CSD01_AAA010101AAA.cer';

$cer = new Certificate($cerFile);
$cer->save('./CSD/CSD01_AAA010101AAA.cer.pem');
```

## License

CFDI Certificate is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
