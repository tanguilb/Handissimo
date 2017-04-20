<?php

namespace HandissimoBundle\Doctrine\Query;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

class Geo extends FunctionNode
{
    /**
     * @var \Doctrine\ORM\Query\AST\ComparisonExpression
     */
    private $latitude;

    /**
     * @var \Doctrine\ORM\Query\AST\ComparisonExpression
     */
    private $longitude;
    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     *
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        //return sprintf()
    }

    /**
     * @param \Doctrine\ORM\Query\Parser $parser
     *
     * @return void
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->latitude = $parser->ComparisonExpression();
        $parser->match(Lexer::T_COMMA);
        $this->longitude = $parser->ComparisonExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}