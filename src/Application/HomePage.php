<?php declare(strict_types=1);
namespace PackageFactory\Website\Application;

use PackageFactory\KristlBol\Domain\Shared\ContentInterface;
use PackageFactory\KristlBol\Domain\Shared\Path;
use PackageFactory\KristlBol\Domain\Tree\FileInterface;
use PackageFactory\KristlBol\Infrastructure\Shared\Content\StringContent;

final class HomePage implements FileInterface
{
    public function getPath(): Path
    {
        return Path::fromString('/index.html');
    }

    public function findContent(): ContentInterface
    {
        return StringContent::fromString('Hello World!');
    }
}