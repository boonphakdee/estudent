
<?php
class Users extends \Phalcon\Mvc\Model
{
public function getItems()
{
	$items = array("Captain","Tanwa","porpeang");
	return $items;
}
}