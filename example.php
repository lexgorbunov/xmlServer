<?php

$dom = new DOMDocument('1.0', 'utf-8');
// указываем кодировку и версию xml файла

$root = $dom->createElement('root');
// создаем корневой элемент
$root->setAttribute('date','9-12-2009');
// добавляем в корневой элемен  атрибут с датой

$new = $dom->createElement('new');
// создаем элемент new
$root->appendChild($new);
// добавляем элемент new в коневой элемент root

$node = $dom->createElement('node');
// создаем элемент node
$text = $dom->createCDATASection('qwe & asdf');
// создаем наполнение для в конструкции <![CDATA[ ... ]]>
$node->appendChild($text);
// записываем текст в элемент node
$new->appendChild($node);
// добаляем элемент node в элемент new

$node = $dom->createElement('node');
// создаем элемент node
$text = $dom->createTextNode('Текст & текст');
// создаем наполнение для в конструкции <![CDATA[ Текст & текст ]]>
$node->appendChild($text);
// записываем текст в элемент node
$new->appendChild($node);
// добаляем элемент node в элемент new

$edit = $dom->createElement('edit');
// создаем элемент edit
$root->appendChild($edit);
// добавляем элемент edit в коневой элемент root

$dom->appendChild($root);
// публикуем корневой элемент
echo $dom->saveXML();
// вывод дерева