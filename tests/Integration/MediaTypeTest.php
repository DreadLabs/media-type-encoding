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

namespace DreadLabs\MediaTypeEncoding\Tests\Integration;

use DreadLabs\MediaTypeEncoding\Domain\Application;
use DreadLabs\MediaTypeEncoding\Domain\Parameter;
use DreadLabs\MediaTypeEncoding\Domain\RegistrationTree;
use DreadLabs\MediaTypeEncoding\Domain\Subtype\Exploded;
use DreadLabs\MediaTypeEncoding\Domain\Subtype\HyphenedFromUpperCamelCased;
use DreadLabs\MediaTypeEncoding\Domain\Suffix\Json;
use PHPUnit\Framework\TestCase;

class MediaTypeTest extends TestCase
{
    /**
     * @test
     */
    public function designate_a_php_class_name_with_suffix_and_parameters()
    {
        $type = (new Application(RegistrationTree::personal(new HyphenedFromUpperCamelCased(new Exploded('\\')))))
            ->withParameter(new Parameter('version', '1.0'))
            ->withParameter(new Parameter('id', '00000000346b085b000000007f397654'))
            ->withSuffix(new Json());

        $designatedType = $type->designated(str_replace(__NAMESPACE__, 'Acme', self::class));

        self::assertEquals(
            'application/prs.acme.media-type-test+json; version=1.0; id=00000000346b085b000000007f397654',
            (string)$designatedType
        );
    }

    /**
     * @test
     */
    public function readme_example()
    {
        $mediaType = new Application(RegistrationTree::personal(new HyphenedFromUpperCamelCased(new Exploded('\\'))));
        $withParameter = $mediaType->withParameter(new Parameter('version', '1.0'));
        $withSuffix = $withParameter->withSuffix(new Json());

        self::assertEquals('application/prs.acme.example.class+json; version=1.0', (string)$withSuffix->designated('Acme\\Example\\Class'));
    }
}
