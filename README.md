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
- [Fecha Inicio de Vigencia](#fecha-inicio-de-vigencia)
- [Fecha de Expiración](#fecha-de-expiración)
- [Guardar Certificado Decodificado](#guardar-certificado-decodificado)

### Obtener Certificado Decodificado

Se pueden decodificar dos tipos de archivo creando una instancia de `Certificate`, estos pueden ser los archivos `.cer` y `.key` para obtener el resultado de dichos archivos solo es necesario mandar la ruta del archivo en la instancia y mandar a llamar el método `decode()` en el caso de los archivos `.key` es necesario mandar la contraseña como segundo parametro.

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

### Fecha Inicio de Vigencia

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

Para guardar el Certificado de Sello Digital (CSD) decodificado es necesario utilizar el método `save(string $filename)` con el nombre y la dirección donde se quiere guardar el archivo.

```php
use Kinedu\CfdiCertificate\Certificate;

$cerFile  = 'CSD01_AAA010101AAA.cer';
$keyFile  = 'CSD01_AAA010101AAA.key';
$password = '12345678a';

$cer = new Certificate($cerFile);
$cer->save('./CSD');

$key = new Certificate($keyFile, $password);
$key->save('./CSD', 'CSD01_AAA010101AAA');
```

## Licencia

CFDI Certificate esta bajo la Licencia MIT, si quieres saber más al respecto puedes ver el archivo de [Licencia](LICENSE) que se encuentra en este mismo repositorio.
