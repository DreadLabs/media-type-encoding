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
use DreadLabs\MediaTypeEncoding\Domain\Video;

class VideoTest extends MediaTypeTest
{
    protected function mediaType(RegistrationTree $registrationTree): MediaType
    {
        return new Video($registrationTree);
    }

    protected function subject(): string
    {
        return 'mp4';
    }

    protected function designation(): string
    {
        return 'video/mp4';
    }
}
