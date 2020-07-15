<?php declare(strict_types=1);
namespace PackageFactory\Website\Application;

use PackageFactory\KristlBol\Domain\Shared\Path;
use PackageFactory\KristlBol\Domain\Tree\DirectoryInterface;
use PackageFactory\KristlBol\Domain\Tree\FileInterface;
use PackageFactory\KristlBol\Domain\Tree\NodeInterface;
use PackageFactory\KristlBol\Domain\Tree\Query;

final class RootDirectory implements DirectoryInterface
{
    public function getPath(): Path
    {
        return Path::fromString('/');
    }

    /**
     * @return \Iterator<NodeInterface>
     */
    public function findChildren(): \Iterator
    {
        yield new HomePage;
    }

    /**
     * @param Query\GetFile $fileName
     * @return FileInterface|null
     */
    public function findFile(Query\GetFile $getFileQuery): ?FileInterface
    {
        return new HomePage;
    }
}