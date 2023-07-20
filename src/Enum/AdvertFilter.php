<?php

declare(strict_types=1);

namespace App\Enum;

final class AdvertFilter
{
    public const TITLE = 'title';
    public const MIN_PRICE = 'minPrice';
    public const MAX_PRICE = 'maxPrice';

    /**
     * @return array<string>
     */
    public static function getAllowedQueryParams(): array
    {
        return [
          self::TITLE,
          self::MIN_PRICE,
          self::MAX_PRICE,
        ];
    }
}
