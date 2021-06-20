<?php
/**
 * Classe TExpression
 * Classe abstrata para gerenciar expressões.
 */
abstract class TExpression
{
  const AND_OPERATOR = 'AND';
  const OR_OPERATOR = 'OR';

  abstract public function dump();
}

?>