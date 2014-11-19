<?php
class BorrowM extends MY_Model {
    function __construct() {
        parent::__construct();
    }
    function getList($conditions, $isAll, $userid) {
        $sql = "select b.*, u.name as operator_name from borrow b, a_user u where b.is_removed='0' ";
        //var_dump($conditions);
        if (isset($conditions)) {
            foreach ($conditions as $key => $value) {
                if (!is_array($value)) {
                    $sql .= $value == "" ? "" : "and b.$key like '%$value%' ";
                }
            }
        }
        $sql .= $isAll ? "" : "and b.operator=$userid ";
        $sql .= "and b.operator=u.id ";
        if ((isset($conditions['contact']['name'])  && $conditions['contact']['name'] != '') || 
            (isset($conditions['contact']['phone']) && $conditions['contact']['phone'] != '')) {
            $sqlContact = "and b.id in (select borrow_id from borrow_contact where 1=1 ";
            if (isset($conditions['contact']['name'])) {
                $sqlContact .= "and name like '%".$conditions['contact']['name'] . "%'";
            }
            if (isset($conditions['contact']['phone'])) {
                $sqlContact .= "and phone like '%".$conditions['contact']['phone'] . "%'";
            }
            $sqlContact .= ") ";
            $sql .= $sqlContact;
        }
        //echo $sql;
        return $this->querySql($sql);
    }  
    function getListByStatus($conditions, $status) {
        $sql = "select b.*, u.name as operator_name from borrow b, a_user u where b.is_removed='0' ";
        //var_dump($conditions);
        if (isset($conditions)) {
            foreach ($conditions as $key => $value) {
                if (!is_array($value)) {
                    $sql .= $value == "" ? "" : "and b.$key like '%$value%' ";
                }
            }
        }
        //$sql .= "and b.status='$status' ";
        $sql .= "and b.operator=u.id ";
        if ($status != '新客户') {
            $sql .= "and b.id in (select borrow_id from borrow_audit ba where ba.status='$status') ";
        }
        if ((isset($conditions['contact']['name'])  && $conditions['contact']['name'] != '') || 
            (isset($conditions['contact']['phone']) && $conditions['contact']['phone'] != '')) {
            $sqlContact = "and id in (select borrow_id from borrow_contact where 1=1 ";
            if (isset($conditions['contact']['name'])) {
                $sqlContact .= "and name like '%".$conditions['contact']['name'] . "%'";
            }
            if (isset($conditions['contact']['phone'])) {
                $sqlContact .= "and phone like '%".$conditions['contact']['phone'] . "%'";
            }
            $sqlContact .= ") ";
            $sql .= $sqlContact;
        }
        //echo $sql;
        return $this->querySql($sql);
    }  
    function get($id) {
        $sql  = "select b.*, rp.provinceName, rc.cityName, rco.countyName, u.name as operator ";
        $sql .= ", bt.rate as typeRate, bt2.name as typeName, bt2.code as typeCode ";
        $sql .= "from (borrow b, region_province rp, region_city rc, region_county rco, a_user u) ";
        $sql .= "left join (borrow_type bt, borrow_type bt2)  on (bt.parent=bt2.id and b.type=bt.id) ";
        $sql .= "where b.id=$id and b.province=rp.id and b.city=rc.id and b.county=rco.id and b.operator=u.id ";
        // echo $sql;
        return $this->queryOneSql($sql);
    } 
    function getColumns($id) {
        $sql  = "select b.* from borrow b where id=$id";
        return $this->queryOneSql($sql);
    } 
    function update($id, $borrow) {
        return $this->updateOne('borrow', $borrow, $id);
    }
    function insert($borrow) {
        return $this->insertOne('borrow', $borrow);
    }
    function delete($id) {
        $sql = "delete from borrow where id=$id";
        return $this->updateSql($sql);
    }

    function getRequestList() {
        $sql  = "select b.*, bt._id, case bt.pass_status when 0 then '未审核' when 1 then '通过' else '未通过' end as pass_status ";
        $sql .= "from borrow b, borrow_request bt where b.is_removed='0' and bt.id=b.id ";
        //var_dump($conditions);
        if (isset($conditions)) {
            foreach ($conditions as $key => $value) {
                if (!is_array($value)) {
                    $sql .= $value == "" ? "" : "and b.$key like '%$value%' ";
                }
            }
        }
        if ((isset($conditions['contact']['name'])  && $conditions['contact']['name'] != '') || 
            (isset($conditions['contact']['phone']) && $conditions['contact']['phone'] != '')) {
            $sqlContact = "and b.id in (select borrow_id from borrow_contact where 1=1 ";
            if (isset($conditions['contact']['name'])) {
                $sqlContact .= "and b.name like '%".$conditions['contact']['name'] . "%'";
            }
            if (isset($conditions['contact']['phone'])) {
                $sqlContact .= "and b.phone like '%".$conditions['contact']['phone'] . "%'";
            }
            $sqlContact .= ") ";
            $sql .= $sqlContact;
        }
        //echo $sql;
        return $this->querySql($sql);
    }  
    function getRequest($_id) {
        $sql  = "select b.*, rp.provinceName, rc.cityName, rco.countyName, u.name as operator ";
        $sql .= ", bt.rate as typeRate, bt2.name as typeName, bt2.code as typeCode ";
        $sql .= "from (borrow_request b, region_province rp, region_city rc, region_county rco, a_user u) ";
        $sql .= "left join (borrow_type bt, borrow_type bt2)  on (bt.parent=bt2.id and b.type=bt.id) ";
        $sql .= "where b._id=$_id and b.province=rp.id and b.city=rc.id and b.county=rco.id and b.operator=u.id ";
        //echo $sql;
        return $this->queryOneSql($sql);
    }  
    function getRequestColumns($_id) {
        $sql  = "select b.* from borrow_request b where _id=$_id";
        return $this->queryOneSql($sql);
    } 
    /*function getRequestList($_id) {
        $sql  = "select b.*, rp.provinceName, rc.cityName, rco.countyName, u.name as operator ";
        //echo $sql;
        return $this->queryOneSql($sql);
    }*/
    function isRequest($id) {
        $sql  = "select _id from borrow_request where id=$id ";
        $data = $this->queryOneSql($sql);
        if (empty($data)) {
            return false;
        } 
        return $data['_id'];
    }
    function insertRequest($borrow) {
        return $this->insertOne('borrow_request', $borrow);
    }
    function updateRequest($_id, $borrow) {
        return $this->updateOne('borrow_request', $borrow, $_id, '_id');
    }
    function deleteRequest($_id) {
        $sql = "delete from borrow_request where _id=$_id";
        return $this->updateSql($sql);
    }

    function getDistincBorrowerCount() {
        $sql  = "select distinct name, idcard from borrow";
        $data = $this->querySql($sql);
        return sizeof($data);
    }
    function sameBorrowerCnt($borrow) {
        $name   = $borrow->name;
        $idcard = $borrow->idcard;
        $sql = "select count(id) as cnt from borrow where name='$name' and idcard='$idcard' ";
        $data = $this->queryOneSql($sql);
        return $data['cnt'];
    }
    function getNumber($borrow) {
        $name   = $borrow->name;
        $idcard = $borrow->idcard;
        $sql = "select number from borrow where name='$name' and idcard='$idcard' ";
        $data = $this->queryOneSql($sql);
        return $data['number'];
    }
}
?>