<?php
// carrega as classe necessárias
function autoload($class)
{
  include_once "app.ado/{$class}.class.php";
}

spl_autoload_register("autoload");

// cria um filtro por data (string)
$filter1 = new TFilter('data', '=', '2007-06-02');
echo $filter1->dump();
echo "<br>\n";

// cria um filtro por salario (integer)
$filter2 = new TFilter('salario', '>', 3000);
echo $filter2->dump();
echo "<br>\n";

// cria um filtro por sexo (array)
$filter3 = new TFilter('sexo', 'IN', array('M', 'F'));
echo $filter3->dump();
echo "<br>\n";

// cria um filtro por contrato (NULL)
$filter4 = new TFilter('contrato', 'IS NOT', NULL);
echo $filter4->dump();
echo "<br>\n";

// cria um filtro por ativo (boolean)
$filter5 = new TFilter('ativo', '=', TRUE);
echo $filter5->dump();
echo "<br>\n";