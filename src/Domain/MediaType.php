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

abstract class MediaType
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var RegistrationTree
     */
    private $tree;

    /**
     * @var Suffix
     */
    private $suffix;

    /**
     * @var Parameters
     */
    private $parameters;

    protected function __construct(string $type, RegistrationTree $tree)
    {
        $this->type = $type;
        $this->tree = $tree;
        $this->suffix = Suffix::none();
        $this->parameters = new Parameters();
    }

    public function withSuffix(Suffix $suffix): MediaType
    {
        $mediaType = clone $this;
        $mediaType->suffix = $suffix;

        return $mediaType;
    }

    public function withParameter(Parameter $parameter): MediaType
    {
        $mediaType = clone $this;
        $mediaType->parameters = $mediaType->parameters->withParameter($parameter);

        return $mediaType;
    }

    public function designated(string $value): MediaType
    {
        $mediaType = clone $this;
        $mediaType->tree = $this->tree->designated($value);

        return $mediaType;
    }

    public function __toString(): string
    {
        return sprintf(
            '%s/%s%s%s',
            $this->type,
            (string)$this->tree,
            (string)$this->suffix,
            (string)$this->parameters
        );
    }
}
