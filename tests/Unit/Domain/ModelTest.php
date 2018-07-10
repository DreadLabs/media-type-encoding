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
use DreadLabs\MediaTypeEncoding\Domain\Model;
use DreadLabs\MediaTypeEncoding\Domain\RegistrationTree;

class ModelTest extends MediaTypeTest
{
    protected function mediaType(RegistrationTree $registrationTree): MediaType
    {
        return new Model($registrationTree);
    }

    protected function subject(): string
    {
        return 'x3d-vrml';
    }

    protected function designation(): string
    {
        return 'model/x3d-vrml';
    }
}
