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

namespace DreadLabs\MediaTypeEncoding\Tests\Unit\Domain;

use DreadLabs\MediaTypeEncoding\Domain\MediaType;
use DreadLabs\MediaTypeEncoding\Domain\RegistrationTree;
use DreadLabs\MediaTypeEncoding\Domain\Subtype\Identity;
use PHPUnit\Framework\TestCase;

abstract class MediaTypeTest extends TestCase
{
    /**
     * @var RegistrationTree
     */
    private $registrationTree;

    /**
     * @test
     */
    public function it_can_be_designated_from_a_string_for_a_top_level_type()
    {
        $mediaType = $this->mediaType($this->registrationTree);

        $designatedMediaType = $mediaType->designated($this->subject());

        self::assertEquals($this->designation(), (string)$designatedMediaType);
    }

    protected function setUp()
    {
        $this->registrationTree = RegistrationTree::standard(new Identity());
    }

    abstract protected function mediaType(RegistrationTree $registrationTree): MediaType;

    abstract protected function subject(): string;

    abstract protected function designation(): string;
}
