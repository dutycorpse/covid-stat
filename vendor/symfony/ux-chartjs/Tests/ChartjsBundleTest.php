<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Symfony\UX\Chartjs;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Kernel;
use Tests\Symfony\UX\Chartjs\Kernel\EmptyAppKernel;
use Tests\Symfony\UX\Chartjs\Kernel\FrameworkAppKernel;
use Tests\Symfony\UX\Chartjs\Kernel\TwigAppKernel;

/**
 * @author Titouan Galopin <galopintitouan@gmail.com>
 *
 * @internal
 */
class ChartjsBundleTest extends TestCase
{
    public function provideKernels()
    {
        yield 'empty' => [new EmptyAppKernel('test', true)];
        yield 'framework' => [new FrameworkAppKernel('test', true)];
        yield 'twig' => [new TwigAppKernel('test', true)];
    }

    /**
     * @dataProvider provideKernels
     */
    public function testBootKernel(Kernel $kernel)
    {
        $kernel->boot();
        $this->assertArrayHasKey('ChartjsBundle', $kernel->getBundles());
    }
}
