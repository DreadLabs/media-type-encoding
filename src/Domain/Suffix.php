<?php
declare(strict_types=1);

/*
 * This file is part of the `dreadlabs/media-type-encoding` package.
 *
 * (c) 2017,2018 Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace DreadLabs\MediaTypeEncoding\Domain;

abstract class Suffix
{
    final public static function none(): Suffix
    {
        return new class extends Suffix {
            public function __toString(): string
            {
                return '';
            }
        };
    }

    abstract public function __toString(): string;
}
