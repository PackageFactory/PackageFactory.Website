<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\SiteHeader;

use PackageFactory\ComponentEngine\Parser\Ast\Module\Module;
use PackageFactory\ComponentEngine\Parser\Lexer\Tokenizer;
use PackageFactory\ComponentEngine\Parser\Lexer\TokenStream;
use PackageFactory\ComponentEngine\Parser\Source\Source;
use PackageFactory\ComponentEngine\Runtime\Context;
use PackageFactory\ComponentEngine\Runtime\Evaluation\Module\OnModule;
use PackageFactory\ComponentEngine\Runtime\Runtime;
use PackageFactory\VirtualDOM\Model\ComponentInterface;
use PackageFactory\VirtualDOM\Model\VisitorInterface;

final class SiteHeader implements ComponentInterface
{
    /**
     * @var string
     */
    private $urlToHomePage;

    /**
     * @param string $urlToHomePage
     */
    private function __construct(string $urlToHomePage)
    {
        $this->urlToHomePage = $urlToHomePage;
    }

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self('/');
    }

    /**
     * @return string
     */
    public function getUrlToHomePage(): string
    {
        return $this->urlToHomePage;
    }

    /**
     * @return void
     */
    public function render(VisitorInterface $visitor): void
    {
        $source = Source::fromFile(__DIR__ . DIRECTORY_SEPARATOR . 'SiteHeader.afx');
        $tokenizer = Tokenizer::fromSource($source);
        $stream = TokenStream::fromTokenizer($tokenizer);
        $module = Module::fromTokenStream($stream);
        $runtime = Runtime::default()->withContext(
            Context::fromArray([
                'props' => $this
            ])
        );

        $visitor->onElement(OnModule::evaluate($runtime, $module));
    }
}