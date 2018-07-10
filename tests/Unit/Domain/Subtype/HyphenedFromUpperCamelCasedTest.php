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

namespace DreadLabs\MediaTypeEncoding\Tests\Unit\Domain\Subtype;

use DreadLabs\MediaTypeEncoding\Domain\Subtype\Exploded;
use DreadLabs\MediaTypeEncoding\Domain\Subtype\HyphenedFromUpperCamelCased;
use PHPUnit\Framework\TestCase;

class HyphenedFromUpperCamelCasedTest extends TestCase
{
    /**
     * @test
     */
    public function it_designates_a_list_of_faceted_subtype_names_decorating_another_subtype()
    {
        $input = 'AcmeInc\\APackage\\ClassName';

        $subtype = new HyphenedFromUpperCamelCased(new Exploded('\\'));

        self::assertSame(['acme-inc', 'a-package', 'class-name'], $subtype->designated($input)->names());
    }
}
