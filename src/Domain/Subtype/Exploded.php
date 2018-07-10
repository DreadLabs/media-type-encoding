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

final class Exploded extends Subtype
{
    /**
     * @var string
     */
    private $delimiter;

    /**
     * @var array
     */
    private $names;

    public function __construct(string $delimiter)
    {
        $this->delimiter = $delimiter;
    }

    public function designated(string $facetedName): Subtype
    {
        $type = clone $this;
        $type->names = explode($this->delimiter, $facetedName);

        return $type;
    }

    public function names(): array
    {
        return $this->names;
    }
}
