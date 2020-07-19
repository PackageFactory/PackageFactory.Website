<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Link;

use PackageFactory\ComponentEngine\Parser\Ast\Module\Module;
use PackageFactory\ComponentEngine\Parser\Lexer\Tokenizer;
use PackageFactory\ComponentEngine\Parser\Lexer\TokenStream;
use PackageFactory\ComponentEngine\Parser\Source\Source;
use PackageFactory\ComponentEngine\Runtime\Context;
use PackageFactory\ComponentEngine\Runtime\Evaluation\Module\OnModule;
use PackageFactory\ComponentEngine\Runtime\Runtime;
use PackageFactory\VirtualDOM\Model\ComponentInterface;
use PackageFactory\VirtualDOM\Model\VisitorInterface;

final class Link implements ComponentInterface
{
    /**
     * @var string
     */
    private $href;

    /**
     * @var LinkTarget
     */
    private $target;

    /**
     * @var LinkRelationShip
     */
    private $rel;

    /**
     * @var ComponentInterface
     */
    private $content;

    /**
     * @param string $href
     * @param LinkTarget $target
     * @param LinkRelationShip $rel
     * @param ComponentInterface $content
     */
    private function __construct(
        string $href,
        LinkTarget $target,
        LinkRelationShip $rel,
        ComponentInterface $content
    ) {
        $this->href = $href;
        $this->target = $target;
        $this->rel = $rel;
        $this->content = $content;
    }

    /**
     * @param string $href
     * @param ComponentInterface $content
     * @return self
     */
    public static function internal(string $href, ComponentInterface $content): self
    {
        return new self(
            $href,
            LinkTarget::self(),
            LinkRelationship::create(),
            $content
        );
    }

    /**
     * @param string $href
     * @param ComponentInterface $content
     * @return self
     */
    public static function external(string $href, ComponentInterface $content): self
    {
        return new self(
            $href,
            LinkTarget::blank(),
            LinkRelationship::create()
                ->withExternal()
                ->withNoopener()
                ->withNoreferrer(),
            $content
        );
    }

    /**
     * @return null|string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @return LinkTarget
     */
    public function getTarget(): LinkTarget
    {
        return $this->target;
    }

    /**
     * @return LinkRelationShip
     */
    public function getRel(): LinkRelationShip
    {
        return $this->rel;
    }

    /**
     * @return ComponentInterface
     */
    public function getContent(): ComponentInterface
    {
        return $this->content;
    }

    /**
     * @param VisitorInterface $visitor
     * @return void
     */
    public function render(VisitorInterface $visitor): void
    {
        $source = Source::fromFile(__DIR__ . DIRECTORY_SEPARATOR . 'Stage.afx');
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