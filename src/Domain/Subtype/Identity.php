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

namespace DreadLabs\MediaTypeEncoding\Domain\Subtype;

use DreadLabs\MediaTypeEncoding\Domain\Subtype;

final class Identity extends Subtype
{
    /**
     * @var array
     */
    private $names;

    public function designated(string $facetedName): Subtype
    {
        $subtype = clone $this;
        $subtype->names = [$facetedName];

        return $subtype;
    }

    public function names(): array
    {
        return $this->names;
    }
}
