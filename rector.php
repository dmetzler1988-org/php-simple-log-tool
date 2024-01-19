<?php

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return static function (RectorConfig $rectorConfig): void {
    // register single rule
    $rectorConfig->rule(TypedPropertyFromStrictConstructorRector::class);

    // here we can define, what sets of rules will be applied
    // tip: use "SetList" class to autocomplete sets with your IDE
    $rectorConfig->sets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::TYPE_DECLARATION,
        SetList::CODING_STYLE,
        SetList::EARLY_RETURN,
        SetList::GMAGICK_TO_IMAGICK,
        SetList::INSTANCEOF,
        SetList::NAMING,
        SetList::PRIVATIZATION,
        SetList::STRICT_BOOLEANS,
        SetList::PHP_83
    ]);
};
