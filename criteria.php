<?php

include_once "app.ado/TExpression.class.php";
include_once "app.ado/TCriteria.class.php";
include_once "app.ado/TFilter.class.php";

// aqui vemos um exemplo de critério utilizando operador lógico OR
// a idade deve ser menor que 16 OU maoir que 60
$criteria = new TCriteria;
$criteria->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "\n";

// aqui vemos um exemplo de critério utilizando operador lógico AND
// juntamente com os operadores IN, (dentro do conjunto) e NOT IN (fora do conjunto)
// a idade deve estar dentro do conjunto (24, 25, 26) e deve estar fora do conjunto (10)
$criteria = new TCriteria;
$criteria->add(new TFilter('idade', 'IN', array(24, 25, 26)));
$criteria->add(new TFilter('idade', 'NOT IN', array(10)));
echo $criteria->dump();
echo "\n";

// aqui vemos um exemplo de critério utilizando operador de comparação LIKE
// o nome dever iniciar por 'pedro' ou deve iniciar por 'maria'
$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'like', 'pedro%'), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', 'like', 'maria%'), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "\n";