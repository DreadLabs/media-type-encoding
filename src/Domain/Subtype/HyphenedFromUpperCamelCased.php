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

final class HyphenedFromUpperCamelCased extends Subtype
{
    /**
     * @var Subtype
     */
    private $subtype;

    public function __construct(Subtype $subtype)
    {
        $this->subtype = $subtype;
    }

    public function designated(string $facetedName): Subtype
    {
        $type = clone $this;
        $type->subtype = $this->subtype->designated($facetedName);

        return $type;
    }

    public function names(): array
    {
        return array_map([$this, 'hyphenate'], $this->subtype->names());
    }

    private function hyphenate(string $name): string
    {
        return preg_replace_callback('/([A-Z])/', [$this, 'lowercase'], lcfirst($name));
    }

    private function lowercase(array $matches): string
    {
        return sprintf('-%s', strtolower($matches[1]));
    }
}
