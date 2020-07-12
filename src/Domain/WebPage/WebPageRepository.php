<?php declare(strict_types=1);
namespace PackageFactory\Website\Domain\WebPage;

final class WebPageRepository
{
    /**
     * @return WebPage
     */
    public function findHomePage(): WebPage
    {
        return WebPage::create(
            Url::create('/'),
            'Homepage',
            'Homepage for package-factory.org',
            new \DateTimeImmutable(),
            new \DateTimeImmutable(),
            new \DateTimeImmutable()
        );
    }
}