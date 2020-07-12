<?php declare(strict_types=1);
namespace PackageFactory\Website\Domain\WebPage;

final class Url
{
    public static function create(string $path): string
    {
        return 'https://package-factory.org' . $path;
    }
}