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

namespace DreadLabs\MediaTypeEncoding\Domain\Suffix;

use DreadLabs\MediaTypeEncoding\Domain\Suffix;

final class Json extends Suffix
{
    public function __toString(): string
    {
        return '+json';
    }
}
