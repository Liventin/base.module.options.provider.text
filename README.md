# base.module.options.provider.text

<table>
<tr>
<td>
<a href="https://github.com/Liventin/base.module">Bitrix Base Module</a>
</td>
</tr>
</table>

install | update

```
"require": {
    "liventin/base.module.options.provider.text": "dev-main"
}
"repositories": [
    {
      "type": "vcs",
      "url": "git@github.com:liventin/base.module.options.provider.text"
    }
]
```
redirect (optional)
```
"extra": {
  "service-redirect": {
    "liventin/base.module.options.provider.text": "module.name",
  }
}
```
PhpStorm Live Template
```php
<?php

namespace ${MODULE_PROVIDER_CAMMAL_CASE}\\${MODULE_CODE_CAMMAL_CASE}\Options;


use Bitrix\Main\ObjectNotFoundException;
use Bitrix\Main\SystemException;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionException;
use ${MODULE_PROVIDER_CAMMAL_CASE}\\${MODULE_CODE_CAMMAL_CASE}\Service\Container;
use ${MODULE_PROVIDER_CAMMAL_CASE}\\${MODULE_CODE_CAMMAL_CASE}\Service\Options\Option;
use ${MODULE_PROVIDER_CAMMAL_CASE}\\${MODULE_CODE_CAMMAL_CASE}\Service\Options\OptionsService;
use ${MODULE_PROVIDER_CAMMAL_CASE}\\${MODULE_CODE_CAMMAL_CASE}\Src\Options\Providers\TextProvider;

class OptionSampleText implements Option
{

    public static function getId(): string
    {
        return 'sample_option_text';
    }

    public static function getName(): string
    {
        return 'Пример текстовой опции';
    }

    public static function getType(): string
    {
        return 'text';
    }

    public static function getTabId(): string
    {
        return TabMain::getId();
    }

    public static function getSort(): int
    {
        return 100;
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws ObjectNotFoundException
     * @throws ReflectionException
     * @throws SystemException
     */
    public static function getParams(): array
    {
        /** @var OptionsService ${DS}srvOptions */
        ${DS}srvOptions = Container::get(OptionsService::SERVICE_CODE);
        /** @var TextProvider ${DS}provider */
        ${DS}provider = ${DS}srvOptions->getProvider(self::getType());
        return ${DS}provider
            ->getParamsToArray();
    }
}
```