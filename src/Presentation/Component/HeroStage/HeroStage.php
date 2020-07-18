<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\HeroStage;

use PackageFactory\ComponentEngine\Parser\Ast\Module\Module;
use PackageFactory\ComponentEngine\Parser\Lexer\Tokenizer;
use PackageFactory\ComponentEngine\Parser\Lexer\TokenStream;
use PackageFactory\ComponentEngine\Parser\Source\Source;
use PackageFactory\ComponentEngine\Runtime\Context;
use PackageFactory\ComponentEngine\Runtime\Evaluation\Module\OnModule;
use PackageFactory\ComponentEngine\Runtime\Runtime;
use PackageFactory\VirtualDOM\Model\ComponentInterface;
use PackageFactory\VirtualDOM\Model\VisitorInterface;

final class HeroStage implements ComponentInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @param string $title
     */
    private function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param string $title
     */
    public static function create(string $title): self
    {
        return new self($title);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return void
     */
    public function render(VisitorInterface $visitor): void
    {
        $source = Source::fromFile(__DIR__ . DIRECTORY_SEPARATOR . 'HeroStage.afx');
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