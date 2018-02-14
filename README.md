# ![Kinedu](https://raw.githubusercontent.com/Kinedu/cfdi-certificate/gh-pages/assets/img/logo.png)

[![Travis](https://img.shields.io/travis/Kinedu/cfdi-certificate.svg?style=flat-square)](https://travis-ci.org/Kinedu/cfdi-certificate)
[![StyleCI](https://styleci.io/repos/118187006/shield?branch=master)](https://styleci.io/repos/118187006)
[![Quality Score](https://img.shields.io/scrutinizer/g/Kinedu/cfdi-certificate.svg?style=flat-square)](https://scrutinizer-ci.com/g/Kinedu/cfdi-certificate)
[![Total Downloads](https://poser.pugx.org/kinedu/cfdi-certificate/downloads?format=flat-square)](https://packagist.org/packages/kinedu/cfdi-certificate)
[![License](https://img.shields.io/github/license/kinedu/cfdi-certificate.svg?style=flat-square)](https://packagist.org/packages/kinedu/cfdi-certificate)

## Instalación

Instalar el paquete mediante [Composer](https://getcomposer.org/).

```shell
composer require kinedu/cfdi-certificate
```

## Uso

- [Obtener Certificado Decodificado](#obtener-certificado-decodificado)
- [Número de Certificado](#número-de-certificado)
- [Fecha de Expiración](#fecha-de-expiración)
- [Guardar Certificado Decodificado](#guardar-certificado-decodificado)

### Obtener Certificado Decodificado

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

### Número de Certificado

```php
use Kinedu\CfdiCertificate\Certificate;

$cerFile = 'CSD01_AAA010101AAA.cer';

$cer = new Certificate($cerFile);
$cer->getNoCertificado();
```

```php
use Kinedu\CfdiCertificate\Certificate;

$cerFile = 'CSD01_AAA010101AAA.cer';

$cer = new Certificate($cerFile);
$cer->getInitialDate();
```

### Fecha de Expiración

```php
use Kinedu\CfdiCertificate\Certificate;

$cerFile = 'CSD01_AAA010101AAA.cer';

$cer = new Certificate($cerFile);
$cer->getExpirationDate();
```

### Guardar Certificado Decodificado

```php
use Kinedu\CfdiCertificate\Certificate;

$cerFile  = 'CSD01_AAA010101AAA.cer';
$keyFile  = 'CSD01_AAA010101AAA.key';
$password = '12345678a';

$cer = new Certificate($cerFile);
$cer->save('./CSD/CSD01_AAA010101AAA.cer.pem');

$key = new Certificate($keyFile, $password);
$key->save('./CSD/CSD01_AAA010101AAA.key.pem');
```

## Licencia

CFDI Certificate esta bajo la Licencia MIT, si quieres saber más al respecto puedes ver el archivo de [Licencia](LICENSE) que se encuentra en este mismo repositorio.
