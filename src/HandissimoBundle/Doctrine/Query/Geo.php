<?php

/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 20/04/17
 * Time: 14:32
 */
namespace HandissimoBundle\Doctrine\Query;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

class Geo extends FunctionNode
{

    const EARTH_RADIUS = 6371;

    /**
     * @var \Doctrine\ORM\Query\AST\ComparisonExpression
     */
    private $latOrigin;

    /**
     * @var \Doctrine\ORM\Query\AST\ComparisonExpression
     */
    private $lngOrigin;

    private $latDestination;

    private $lngDestination;

    /**
     * @param \Doctrine\ORM\Query\Parser $parser
     *
     * @return void
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->latOrigin = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_COMMA);
        $this->lngOrigin = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_COMMA);
        $this->latDestination = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_COMMA);
        $this->lngDestination = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }


    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     *
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return sprintf(
            $this->getSqlWithPlaceholders(),
            self::EARTH_RADIUS,
            $sqlWalker->walkArithmeticPrimary($this->latOrigin),
            $sqlWalker->walkArithmeticPrimary($this->latDestination),
            $sqlWalker->walkArithmeticPrimary($this->lngDestination),
            $sqlWalker->walkArithmeticPrimary($this->lngOrigin),
            $sqlWalker->walkArithmeticPrimary($this->latOrigin),
            $sqlWalker->walkArithmeticPrimary($this->latDestination)
        );
    }


    public function getSqlWithPlaceholders()
    {
        return '%s * acos(cos(radians(%s)) * cos(radians(%s)) * cos(radians(%s) - radians(%s)) + sin(radians(%s)) * sin(radians(%s)))';
    }
}
