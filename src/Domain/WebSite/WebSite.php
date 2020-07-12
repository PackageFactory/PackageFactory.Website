<?php declare(strict_types=1);
namespace PackageFactory\Website\Domain\WebSite;

final class WebSite
{
    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     */
    private function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return self
     */
    public static function packageFactoryOrg(): self
    {
        return new self('https://github.com/PackageFactory');
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array<mixed>
     */
    public function getAsJsonLD(): array
    {
        return [
            '@context' => 'http://schema.org',
            '@type' => 'WebSite',
            'url' => $this->url,
        ];
    }
}