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

final class Parameters
{
    /**
     * @var Parameter[]
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters[] = Parameter::none();
    }

    public function withParameter(Parameter $parameter): Parameters
    {
        $parameters = clone $this;
        $parameters->parameters[] = $parameter;

        return $parameters;
    }

    public function __toString(): string
    {
        return implode('', array_map(function (Parameter $parameter) {
            return (string)$parameter;
        }, $this->parameters));
    }
}
