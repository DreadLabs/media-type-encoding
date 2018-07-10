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

class Parameter
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;

    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public static function none(): Parameter
    {
        return new class extends Parameter {
            public function __construct()
            {
            }

            public function __toString(): string
            {
                return '';
            }
        };
    }

    public function __toString(): string
    {
        return sprintf('; %s=%s', $this->key, $this->value);
    }
}
