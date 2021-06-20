<?php
/**
 * Classe TFilter
 * Esta classe provê uma interface para definição de filtros de seleção
 */
class TFilter extends TExpression
{
  private $variable;
  private $operator;
  private $value;

  /**
   * Método __construct()
   * instancia um novo filtro
   * @param $variable = variavel
   * @param $operator = operador(>,<)
   * @param $value = valor a ser comparado
   */
  public function __construct($variable, $operator, $value)
  {
    $this->variable = $variable;
    $this->operator = $operator;
    // transforma o valor de acordo com certas regras
    // antes de atribuir à propriedade $this->value
    $this->value = $this->transform($value);
  }

  /**
   * Método transform()
   * recebe um valor e faz as modificações necessárias
   * para ele ser interpretado pelo banco de dados
   * podendo ser um integer/string/boolean ou array.
   * @param $value = valor a ser transformado
   */
  private function transform($value)
  {
    // caso seja um array
    if (is_array($value))
    {
      // percorre os valores do array
      foreach ($value as $x)
      {
        // se for um inteiro
        if (is_integer($x)) {
          $foo[] = $x;
        }
        else if (is_string($x))
        {
          $foo[] = "'$x'";
        }
      }
      // converte o array em string separada por ','
      $result = '(' . implode(',', $foo) . ')';
    }
    // caso seja uma string
    else if (is_string($value))
    {
      // adiciona aspas
      $result = "'$value'";
    }
    // caso seja valor nulo
    else if (is_null($value))
    {
      // armazena null
      $result = null;
    }
    // caso seja booleano
    else if (is_bool($value))
    {
      $result = $value ? 'TRUE' : 'FALSE';
    }
    else
    {
      $result = $value;
    }
    // retorna o valor
    return $result;
  }

  /**
   * método dump()
   * retorna o filtro em forma de expressão
   */
  public function dump()
  {
    // concatena a expressão
    return "{$this->variable} {$this->operator} {$this->value}";
  }
}

?>