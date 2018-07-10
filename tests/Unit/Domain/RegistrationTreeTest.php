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

use DreadLabs\MediaTypeEncoding\Domain\RegistrationTree;
use DreadLabs\MediaTypeEncoding\Domain\Subtype\Exploded;
use PHPUnit\Framework\TestCase;

class RegistrationTreeTest extends TestCase
{
    /**
     * @test
     */
    public function it_supports_rfc_6838_standard_tree_prefix()
    {
        $tree = RegistrationTree::standard(new Exploded('\\'));

        $designatedTree = $tree->designated('foo\\bar');

        self::assertSame('foo-bar', (string)$designatedTree);
    }

    /**
     * @test
     * @dataProvider tree
     */
    public function it_supports_rfc_6838_tree_prefixes(RegistrationTree $tree, string $prefix)
    {
        self::assertSame(sprintf('%sfoo.bar', $prefix), (string)$tree->designated('foo\\bar'));
    }

    public function tree(): array
    {
        return [
            'vendor' => [RegistrationTree::vendor(new Exploded('\\')), 'vnd.'],
            'personal or vanity #1' => [RegistrationTree::personal(new Exploded('\\')), 'prs.'],
            'personal or vanity #2' => [RegistrationTree::vanity(new Exploded('\\')), 'prs.'],
            'unregistered' => [RegistrationTree::unregistered(new Exploded('\\')), 'x.'],
        ];
    }
}
