<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

$date = date('Y');

$GLOBALS['ecsHeader'] = <<<EOF
mate theme for Contao Open Source CMS

Copyright (C) $date pdir / digital agentur <develop@pdir.de>

@package    contao-themes-net/mate-theme-bundle
@link       https://github.com/contao-themes-net/mate-theme-bundle
@license    pdir contao theme licence
@author     Mathias Arzberger <develop@pdir.de>
@author     Philipp Seibt <develop@pdir.de>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__.'/vendor/contao/easy-coding-standard/config/set/contao.php');

    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::LINE_ENDING, "\n");

    $services = $containerConfigurator->services();
    $services
        ->set(HeaderCommentFixer::class)
        ->call('configure', [[
            'header' => $GLOBALS['ecsHeader'],
        ]])
    ;
};
