<?php
class IndexM extends MY_Model {

    function __construct() {
        parent::__construct();
    }
    function indexQuery() {
	    $sqlItem = "select c.name as c_name, f.id, f.title, f.path, f.c_id ".
		    "from food_category c, food f ".
			"where c.id=f.c_id and f.state='0' and del='0' ".
		    "order by f.c_id";
        $rItem = $this->querySql($sqlItem);
		$i = 0;
		$j = 0;
		$c_id = 0;
		foreach ($rItem as $row){
		    if ($c_id != $row['c_id']) {
			    $c_id = $row['c_id'];
				$i++;
				$j = 0;
			}
			$data['category'][$i]['c_name'] = $row['c_name'];
			$data['category'][$i]['c_id'] = $row['c_id'];
			$data['item'][$i][$j]['id'] = $row['id'];
			$data['item'][$i][$j]['title'] = $row['title'];
			$data['item'][$i][$j]['path'] = $row['path'];
			$j++;
	    }
		return $data;
	}
}
?>