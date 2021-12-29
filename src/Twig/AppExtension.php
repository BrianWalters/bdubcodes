<?php

namespace App\Twig;

use App\Controller\AdminController;
use Symfony\Component\Asset\Packages;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function __construct(private Packages $asset)
    {
    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('fileHref', [$this, 'fileHref']),
        ];
    }

    public function getFunctions(): array
    {
        return [
//            new TwigFunction('function_name', [$this, 'doSomething']),
        ];
    }

    public function fileHref(string $value): string
    {
        return $this->asset->getUrl(AdminController::FILE_DIR . '/' . $value);
    }
}
