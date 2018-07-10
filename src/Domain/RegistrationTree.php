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

final class RegistrationTree
{
    /**
     * @var string
     */
    private $prefix;

    /**
     * @var Subtype
     */
    private $subtype;

    /**
     * @var string
     */
    private $delimiter;

    public static function standard(Subtype $subtype): RegistrationTree
    {
        return new self('', $subtype, '-');
    }

    public static function vendor(Subtype $subtype): RegistrationTree
    {
        return new self('vnd.', $subtype, '.');
    }

    public static function personal(Subtype $subtype): RegistrationTree
    {
        return new self('prs.', $subtype, '.');
    }

    public static function vanity(Subtype $subtype): RegistrationTree
    {
        return self::personal($subtype);
    }

    public static function unregistered(Subtype $subtype): RegistrationTree
    {
        return new self('x.', $subtype, '.');
    }

    private function __construct(string $prefix, Subtype $subtype, string $delimiter)
    {
        $this->prefix = $prefix;
        $this->subtype = $subtype;
        $this->delimiter = $delimiter;
    }

    public function designated(string $value): RegistrationTree
    {
        $tree = clone $this;
        $tree->subtype = $this->subtype->designated($value);

        return $tree;
    }

    public function __toString(): string
    {
        return sprintf('%s%s', $this->prefix, implode($this->delimiter, $this->subtype->names()));
    }
}
