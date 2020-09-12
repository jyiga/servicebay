<?php
//This class is used to highly interface with the data / Database.
class Model
{
    //Template.
    public $model;
    public $_tableColumn;
    public $_conn; //sql Executor object
    private $_table;

    function __construct()
    {

        $this->_conn = new SqlExecutor();
        $this->_model = get_class($this);
        //$this->_table = strtolower($this->_model)."s";
        $this->_table = strtolower($this->_model);
        $query = $this->_conn->hookUp->prepare("Describe " . $this->_table);
        $query->execute();
        $this->_tableColumn = $query->fetchAll(PDO::FETCH_COLUMN);
    }

    public function __view()
    {
        $data2 = array();
        $data = array();
        $page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        $rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        $offset = ($page - 1) * $rows;

        //$sql="SELECT * FROM  ".$this->_table;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $sql = Director::buildSql($builder);
        //$this->_conn->setQuery($sql);

        $data["total"] = $this->_conn->sqlCount($sql);
        $sql = $sql . " limit $offset,$rows ";
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql) as $row) {
            array_push($data2, $row);
        }

        $data["rows"] = $data2;
        return $data;
    }

    public function __viewFind($id = 0)
    {
        $data2 = array();
        $data = array();
        $page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        $rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        $offset = ($page - 1) * $rows;

        //$sql="SELECT * FROM  ".$this->_table;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        if ($id != 0) {
            $builder->setCriteria($this->_tableColumn[0] . "='" . $id . "'");
        }

        $sql = Director::buildSql($builder);
        //$this->_conn->setQuery($sql);

        $data["total"] = $this->_conn->sqlCount($sql);
        $sql2 = $sql . " limit $offset,$rows ";
        error_log(date('Y m d :g:i:s:a ') . $sql2 . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql2) as $row) {
            array_push($data2, $row);
        }

        $data["rows"] = $data2;
        return $data;
    }

    public function __viewCriteria($criteria,$bind=null)
    {
        $data2=array();
        $data=array();
        $page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        $rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        $offset = ($page-1)*$rows;

        //$sql="SELECT * FROM  ".$this->_table;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $builder->setCriteria($criteria);
        $sql=Director::buildSql($builder);
        //$this->_conn->setQuery($sql);

        $data["total"]=$this->_conn->sqlCount($sql);
        $sql2=$sql." limit $offset,$rows ";
        error_log(date('Y m d :g:i:s:a ').$sql2."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'data.log') ;
        if($bind==null)
        {

        
            foreach($this->_conn->getResultSet($sql2) as $row)
            {
                array_push($data2,$row);
            }
        }else{
            
            foreach($this->_conn->getResultSetBind($sql2,$bind) as $row)
            {
                array_push($data2,$row);
            }
        }

        $data["rows"]=$data2;
        return $data;
    }
    //generate json with the footer information.
    public function __viewWithFooter($sql, $total, $title, $titleColumn)
    {
        $data2 = array();
        $data = array();
        $totalAmount = 0;
        $page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        $rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        $offset = ($page - 1) * $rows;

        //$sql="SELECT * FROM  ".$this->_table;
        //$builder = new SelectBuilder();
        //$builder->setTable($this->_table);
        //$builder->setCriteria();
        //$sql=Director::buildSql($builder);
        //$this->_conn->setQuery($sql);

        $data["total"] = $this->_conn->sqlCount($sql);
        $sql2 = $sql . " limit $offset,$rows ";
        error_log(date('Y m d :g:i:s:a ') . $sql2 . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql2) as $row) {
            $totalAmount = $totalAmount + $row[$total];
            $row[$total] = number_format($row[$total], 2);
            array_push($data2, $row);
        }

        $data["rows"] = $data2;
        $footer = array();
        $footer[$titleColumn] = $title;
        $footer[$total] = number_format($totalAmount, 2);
        $data3 = array();
        array_push($data3, $footer);
        $data['footer'] = $data3;
        //array_push($data2,$footer);

        return $data;
    }
    //generating a footer
    //generate json with the footer information.
    public function __viewWithFooterVat($sql, $total, $title, $titleColumn, $vatVal)
    {
        //$total,$title,$titleColumn
        $data2 = array();
        $data = array();
        $totalAmount = 0;
        $vatAmount = 0;
        // the header

        $page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        $rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        $offset = ($page - 1) * $rows;

        //$sql="SELECT * FROM  ".$this->_table;
        //$builder = new SelectBuilder();
        //$builder->setTable($this->_table);
        //$builder->setCriteria();
        //$sql=Director::buildSql($builder);
        //$this->_conn->setQuery($sql);

        $data["total"] = $this->_conn->sqlCount($sql);
        $sql2 = $sql . " limit $offset,$rows ";
        error_log(date('Y m d :g:i:s:a ') . $sql2 . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql2) as $row) {
            $totalAmount = $totalAmount + $row[$total];

            $vatAmount = $vatAmount + (intval($row[$total]) * floatval($row['taxed']));
            $row[$total] = number_format($row[$total], 2);
            array_push($data2, $row);
        }

        $data["rows"] = $data2;
        $data3 = array();
        //create the footer from the array.
        $footer = array();
        $footer[$titleColumn] = "Subtotal";
        $footer[$total] = number_format($totalAmount, 2);
        array_push($data3, $footer);

        if ($vatAmount > 0) {
            $footer[$titleColumn] = "VAT";
            $footer[$total] = number_format($vatAmount, 2);
            array_push($data3, $footer);

            $footer[$titleColumn] = "Grand Total";
            $footer[$total] = number_format(($vatAmount + $totalAmount), 2);
            array_push($data3, $footer);
        }


        $data['footer'] = $data3;
        //array_push($data2,$footer);

        return $data;
    }
    // the header information in  the invoice
    public function __viewWithFooterVatHeaderChange($sql3, $sql, $total, $title, $titleColumn, $vatVal)
    {
        //$total,$title,$titleColumn
        $data2 = array();
        $data = array();
        $totalAmount = 0;
        $vatAmount = 0;
        $subtotal = 0;
        // the header

        $page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        $rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        $offset = ($page - 1) * $rows;

        //$sql="SELECT * FROM  ".$this->_table;
        //$builder = new SelectBuilder();
        //$builder->setTable($this->_table);
        //$builder->setCriteria();
        //$sql=Director::buildSql($builder);
        //$this->_conn->setQuery($sql);

        $data["total"] = $this->_conn->sqlCount($sql);

        // error_log(date('Y m d :g:i:s:a ').$sql."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'data.log') ;
        foreach ($this->_conn->getResultSet($sql3) as $row3) {
            $headerId = $row3['id'];

            $dataArray = array();
            $dataArray['id'] = '.';
            $dataArray['itemDescrpiton'] = $row3['headerDescription'];
            $dataArray['unitPrice'] = '.';
            $dataArray['quantity'] = '.';
            $dataArray['taxed'] = '.';
            $dataArray['day'] = '.';
            $dataArray['invoiceId'] = '.';
            $dataArray['headerId'] = '.';

            array_push($data2, $dataArray);

            //foreach ($this->_conn->getResultSet($sql3) as $row) {
            $sql2 = $sql . " and headerId='" . $headerId . "'";

            foreach ($this->_conn->getResultSet($sql2) as $row) {
                $totalAmount = $totalAmount + $row[$total];
                $vatAmount = $vatAmount + (intval($row[$total]) * floatval($row['taxed']));
                $subtotal = $subtotal + floatval($row[$total]);
                $row[$total] = number_format($row[$total], 2);
                array_push($data2, $row);
            }
            //}
            $dataArray = array();
            $dataArray['id'] = '.';
            $dataArray['itemDescrpiton'] = '.';
            $dataArray['unitPrice'] = '.';
            $dataArray['quantity'] = '.';
            $dataArray['taxed'] = '.';
            $dataArray['day'] = 'Subtotal';
            $dataArray['total'] = $subtotal;
            $dataArray['invoiceId'] = '.';
            $dataArray['headerId'] = '.';
            $subtotal = 0;

            array_push($data2, $dataArray);
        }
        //


        $sqlOutOut = $sql . " and (headerId=0 or headerId is null) ";

        foreach ($this->_conn->getResultSet($sqlOutOut) as $row) {
            $totalAmount = $totalAmount + $row[$total];
            $vatAmount = $vatAmount + (intval($row[$total]) * floatval($row['taxed']));
            $row[$total] = number_format($row[$total], 2);
            array_push($data2, $row);
        }

        $data["rows"] = $data2;
        $data3 = array();
        //create the footer from the array.
        $footer = array();
        $footer[$titleColumn] = "Subtotal";
        $footer[$total] = number_format($totalAmount, 2);
        array_push($data3, $footer);

        if ($vatAmount > 0) {
            $footer[$titleColumn] = "VAT";
            $footer[$total] = number_format($vatAmount, 2);
            array_push($data3, $footer);

            $footer[$titleColumn] = "Grand Total";
            $footer[$total] = number_format(($vatAmount + $totalAmount), 2);
            array_push($data3, $footer);
        }

        $data['footer'] = $data3;
        //array_push($data2,$footer);
        return $data;
    }

    public function __viewWithFooterVatHeaderForArray($sql3, $sql, $total, $title, $titleColumn, $vatVal)
    {
        //$total,$title,$titleColumn
        $data2 = array();
        $data = array();
        $totalAmount = 0;
        $vatAmount = 0;
        $subtotal = 0;
        // the header

        $page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        $rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        $offset = ($page - 1) * $rows;

        //$sql="SELECT * FROM  ".$this->_table;
        //$builder = new SelectBuilder();
        //$builder->setTable($this->_table);
        //$builder->setCriteria();
        //$sql=Director::buildSql($builder);
        //$this->_conn->setQuery($sql);

        $data["total"] = $this->_conn->sqlCount($sql);

        // error_log(date('Y m d :g:i:s:a ').$sql."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'data.log') ;
        foreach ($this->_conn->getResultSet($sql3) as $row3) {
            $headerId = $row3['id'];

            $dataArray = array();
            $dataArray['id'] = ' ';
            $dataArray['itemName'] = ' ';
            $dataArray['itemDescrpiton'] = $row3['headerDescription'];
            $dataArray['unitPrice'] = ' ';
            $dataArray['quantity'] = ' ';
            $dataArray['taxed'] = ' ';
            $dataArray['day'] = ' ';
            $dataArray['invoiceId'] = ' ';
            $dataArray['headerId'] = ' ';
            $dataArray['total'] = ' ';

            array_push($data2, $dataArray);

            //foreach ($this->_conn->getResultSet($sql3) as $row) {
            $sql2 = $sql . " and headerId='" . $headerId . "'";

            foreach ($this->_conn->getResultSet($sql2) as $row) {
                $totalAmount = $totalAmount + $row[$total];
                $vatAmount = $vatAmount + (intval($row[$total]) * floatval($row['taxed']));
                $subtotal = $subtotal + floatval($row[$total]);
                $row[$total] = number_format($row[$total], 2);
                $row['unitPrice'] = number_format($row['unitPrice'], 2);
                $row['itemDescrpiton'] = $row['itemName'] . ' \n ' . $row['itemDescrpiton'];
                array_push($data2, $row);
            }
            //}
            $dataArray = array();
            $dataArray['id'] = ' ';
            $dataArray['itemName'] = ' ';
            $dataArray['itemDescrpiton'] = ' ';
            $dataArray['unitPrice'] = ' ';
            $dataArray['quantity'] = ' ';
            $dataArray['taxed'] = ' ';
            $dataArray['day'] = 'Subtotal';
            $dataArray['total'] = number_format($subtotal, 2);
            $dataArray['invoiceId'] = ' ';
            $dataArray['headerId'] = ' ';
            $subtotal = 0;

            array_push($data2, $dataArray);
        }
        //


        $sqlOutOut = $sql . " and (headerId=0 or headerId is null) ";

        foreach ($this->_conn->getResultSet($sqlOutOut) as $row) {
            $totalAmount = $totalAmount + $row[$total];
            $vatAmount = $vatAmount + (intval($row[$total]) * floatval($row['taxed']));
            $row[$total] = number_format($row[$total], 2);
            $row['unitPrice'] = number_format($row['unitPrice'], 2);
            $row['itemDescrpiton'] = $row['itemName'] . ' \n ' . $row['itemDescrpiton'];
            array_push($data2, $row);
        }

        $data["rows"] = $data2;
        $data3 = array();
        //create the footer from the array.
        $footer = array();
        $footer['id'] = ' ';
        $footer['itemName'] = ' ';
        $footer['itemDescrpiton'] = ' ';
        $footer['unitPrice'] = ' ';
        $footer['quantity'] = ' ';
        $footer['taxed'] = ' ';
        $footer[$titleColumn] = "Subtotal";
        $footer[$total] = number_format($totalAmount, 2);
        $footer['invoiceId'] = ' ';
        $footer['headerId'] = ' ';
        //$footer[$titleColumn]="Subtotal";
        //$footer[$total]=number_format($totalAmount,2);
        array_push($data2, $footer);


        if ($vatAmount > 0) {
            $footer['id'] = ' ';
            $footer['itemName'] = ' ';
            $footer['itemDescrpiton'] = ' ';
            $footer['unitPrice'] = ' ';
            $footer['quantity'] = ' ';
            $footer['tax'] = ' ';
            $footer[$titleColumn] = "VAT 18%";
            $footer[$total] = number_format($vatAmount, 2);
            $footer['invoiceId'] = ' ';
            $footer['headerId'] = ' ';

            //$footer[$titleColumn]="VAT";
            //$footer[$total]=number_format($vatAmount,2);
            array_push($data2, $footer);


            $footer['id'] = ' ';
            $footer['itemName'] = ' ';
            $footer['itemDescrpiton'] = ' ';
            $footer['unitPrice'] = ' ';
            $footer['quantity'] = ' ';
            $footer['taxed'] = ' ';
            $footer[$titleColumn] = "Grand Total";
            $footer[$total] = number_format(($vatAmount + $totalAmount), 2);
            $footer['invoiceId'] = ' ';
            $footer['headerId'] = ' ';

            array_push($data2, $footer);
        } else {
            $footer['id'] = ' ';
            $footer['itemName'] = ' ';
            $footer['itemDescrpiton'] = ' ';
            $footer['unitPrice'] = ' ';
            $footer['quantity'] = ' ';
            $footer['tax'] = ' ';
            $footer[$titleColumn] = "VAT 18%";
            $footer[$total] = 'NIL';
            $footer['invoiceId'] = ' ';
            $footer['headerId'] = ' ';

            //$footer[$titleColumn]="VAT";
            //$footer[$total]=number_format($vatAmount,2);
            array_push($data2, $footer);


            $footer['id'] = ' ';
            $footer['itemName'] = ' ';
            $footer['itemDescrpiton'] = ' ';
            $footer['unitPrice'] = ' ';
            $footer['quantity'] = ' ';
            $footer['taxed'] = ' ';
            $footer[$titleColumn] = "Grand Total";
            $footer[$total] = number_format(($vatAmount + $totalAmount), 2);
            $footer['invoiceId'] = ' ';
            $footer['headerId'] = ' ';

            array_push($data2, $footer);
        }

        $data['footer'] = $data3;
        //array_push($data2,$footer);
        return $data2;
    }

    public function __viewSql($sql,$bind=null)
    {
        $data2=array();
        $data=array();
        $page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        $rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        $offset = ($page-1)*$rows;

        //$sql="SELECT * FROM  ".$this->_table;
        //$builder = new SelectBuilder();
        //$builder->setTable($this->_table);
        //$sql=Director::buildSql($builder);
        //$this->_conn->setQuery($sql);

        $data["total"]=$this->_conn->sqlCount($sql);
        $sql2=$sql." limit $offset,$rows ";
        error_log(date('Y m d :g:i:s:a ').$sql2."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'data.log') ;
        if($bind==null)
        {

        
            foreach($this->_conn->getResultSet($sql2) as $row)
            {
                array_push($data2,$row);
            }
        }else{
            
            foreach($this->_conn->getResultSetBind($sql2,$bind) as $row)
            {
                array_push($data2,$row);
            }
        }

        $data["rows"]=$data2;
        return $data;
    }

    public function __resultSet($sql = null)
    {
        $data2 = array();
        $data = array();
        //$page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        //$rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        //$offset = ($page-1)*$rows;

        //$sql="SELECT * FROM  ".$this->_table;
        if (is_null($sql)) {
            $builder = new SelectBuilder();
            $builder->setTable($this->_table);
            $sql = Director::buildSql($builder);
        }

        //$this->_conn->setQuery($sql);

        //$data["total"]=$this->_conn->sqlCount($sql);
        //$sql2=$sql;
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql) as $row) {
            array_push($data2, $row);
        }

        //$data["rows"]=$data2;
        return $data2;
    }

    public function resultSet($sql = null)
    {
        $data2 = array();
        $data = array();
        //$page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        //$rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        //$offset = ($page-1)*$rows;

        //$sql="SELECT * FROM  ".$this->_table;
        if (is_null($sql)) {
            $builder = new SelectBuilder();
            $builder->setTable($this->_table);
            $sql = Director::buildSql($builder);
        }

        //$this->_conn->setQuery($sql);

        //$data["total"]=$this->_conn->sqlCount($sql);
        //$sql2=$sql;
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

        //$data["rows"]=$data2;
        return $this->_conn->getResultSet($sql);
    }


    public function __save()
    {
        try {
            if (sizeof($this->_tableColumn) > 0) {
                $builder = new InsertBuilder();
                $builder->setTable($this->_table);

                for ($i = 0; $i < sizeof($this->_tableColumn); $i++) {
                    $name = 'get' . $this->_tableColumn[$i];

                    if (!is_null($this->{$name}())) {
                        $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                    }
                }
                $this->_conn->setQuery(Director::buildSql($builder));
                error_log(date('Y m d :g:i:s:a ') . Director::buildSql($builder) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
                //error_log(''.date('Y m d :g:i:s:a ').' data submit to db',3,ROOT.DS.'tmp'.DS.'logs'.DS.'data.log') ;

                $this->_conn->execute_query2($builder->getValues());
                //echo $this->__lastId();
                //$this->{'set'.$this->_tableColumn[0]}($this->__lastId());
                return (array('success' => true));
            }
        } catch (Exception $e) {

            error_log($e->getTraceAsString() . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sqlerror.log');
            return (array('msg' => $e->getMessage()));
        }
    }
    public function __saveReturnId()
    {
        try {
            if (sizeof($this->_tableColumn) > 0) {
                $builder = new InsertBuilder();
                $builder->setTable($this->_table);

                for ($i = 0; $i < sizeof($this->_tableColumn); $i++) {
                    $name = 'get' . $this->_tableColumn[$i];

                    if (!is_null($this->{$name}())) {
                        $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                    }
                }
                $this->_conn->setQuery(Director::buildSql($builder));
                error_log(date('Y m d :g:i:s:a ') . Director::buildSql($builder) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

                return ($this->_conn->execute_query4($builder->getValues()));
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sqlerror.log');
        }
    }

    //
    public function __saveUnquie($criteria,$bind=null)
    {
        try {
            if (sizeof($this->_tableColumn) > 0) {
                $builder = new InsertBuilder();
                $builder->setTable($this->_table);

                for ($i = 0; $i < sizeof($this->_tableColumn); $i++) {
                    $name = 'get' . $this->_tableColumn[$i];

                    if (!is_null($this->{$name}())) {
                        $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                    }
                }

                $this->_conn->setQuery(Director::buildSql($builder));
                error_log(date('Y m d :g:i:s:a ') . Director::buildSql($builder) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

                if ($this->_countDefined($criteria,$bind) > 0) {
                    $this->__findCriteria($criteria,$bind);
                    return $this->__update();
                } else {
                    $id=$this->_conn->execute_query4($builder->getValues());
                    $criteria=$this->_tableColumn[0]."='".$id."'";
                    $this->__findCriteria($criteria,$bind);
                    return array('success'=>true);

                    //return ($this->_conn->execute_query4($builder->getValues()));
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sqlerror.log');
        }
    }


    public function __update()
    {
        try {
            if (sizeof($this->_tableColumn) > 0) {
                $builder = new UpdateBuilder();
                $builder->setTable($this->_table);

                for ($i = 0; $i < sizeof($this->_tableColumn); $i++) {
                    $name = 'get' . $this->_tableColumn[$i];
                    if ($i == 0) {

                        if (!is_null($this->{$name}())) {
                            $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                            $builder->setCriteria(" where " . $this->_tableColumn[$i] . " = :param" . $i);
                        }
                    } else {

                        if (!is_null($this->{$name}())) {
                            $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                        }
                    }
                }

                $this->_conn->setQuery(Director::buildSql($builder));
                error_log(date('Y m d :g:i:s:a ') . Director::buildSql($builder) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

                return $this->_conn->execute_query2($builder->getValues());
            }
        } catch (Exception $e) {
            error_log(date('Y m d :g:i:s:a ') . ":" . $e->getMessage(), 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sqlerror.log');
        }
    }


    public function __updateCriteria($criteria)
    {
        try {
            if (sizeof($this->_tableColumn) > 0) {
                $builder = new UpdateBuilder();
                $builder->setTable($this->_table);

                for ($i = 0; $i < sizeof($this->_tableColumn); $i++) {
                    $name = 'get' . $this->_tableColumn[$i];
                    if ($i == 0) {

                        if (!is_null($this->{$name}())) {
                            $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                            //$builder->setCriteria(" where " . $this->_tableColumn[$i] . " = :param" . $i);
                        }
                    } else {

                        if (!is_null($this->{$name}())) {
                            $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                        }
                    }
                }


                $builder->setCriteria(" where " . $criteria);
                $this->_conn->setQuery(Director::buildSql($builder));
                error_log(date('Y m d :g:i:s:a ') . Director::buildSql($builder) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

                return $this->_conn->execute_query2($builder->getValues());
            }
        } catch (Exception $e) {
            error_log(date('Y m d :g:i:s:a ') . ":" . $e->getMessage(), 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sqlerror.log');
        }
    }




    // Make it work.
    public function __updateBasedOn($col, $val, $criteria = null, $operator = null)
    {
        try {
            $criteriaString = "";
            if (sizeof($this->_tableColumn) > 0) {
                $builder = new UpdateBuilder();
                $builder->setTable($this->_table);

                /*for ($i = 0; $i < sizeof($this->_tableColumn); $i++)
                {
                    $name = 'get' . $this->_tableColumn[$i];
                    if($i==0)
                    {
                        //$builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                        //$builder->setCriteria("where ".$this->_tableColumn[$i]." = :param".$i);
                    }else
                    {

                        if(!is_null($this->{$name}()))
                        {
                            $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                        }
                    }

                }*/

                for ($j = 0; sizeof($col); $j++) {
                    if (!is_null($criteria)) {
                        $builder->addColumnAndData($col[$j], $val[$j]);
                        if ($j = 0) {
                            $criteriaString .= "Where " . $col[$j] . $operator[$j] . " :param" . $j;
                        }

                        //$builder->setCriteria("where ".$this->_tableColumn[$i]." = :param".$i);
                    }
                }
                $builder->setCriteria("where " . $criteria);
                $this->_conn->setQuery(Director::buildSql($builder));
                error_log(date('Y m d :g:i:s:a ') . Director::buildSql($builder) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

                return $this->_conn->execute_query2($builder->getValues());
            }
        } catch (Exception $e) {
            error_log($e->getMessage(), 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sqlerror.log');
        }
    }


    public function __delete()
    {
        try {
            if (sizeof($this->_tableColumn) > 0) {
                $builder = new DeleteBuilder();
                $builder->setTable($this->_table);

                for ($i = 0; $i < sizeof($this->_tableColumn); $i++) {
                    $name = 'get' . $this->_tableColumn[$i];
                    if ($i == 0) {
                        $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                        $builder->setCriteria("where " . $this->_tableColumn[$i] . " = :param" . $i);
                    }
                }

                $this->_conn->setQuery(Director::buildSql($builder));
                error_log(date('Y m d :g:i:s:a ') . Director::buildSql($builder) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

                return $this->_conn->execute_query2($builder->getValues());
            }
        } catch (Exception $e) {
            error_log($e->getMessage(), 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sqlerror.log');
        }
    }

    public function __deleteCriteria($criteria)
    {
        try {
            if (sizeof($this->_tableColumn) > 0) {
                $builder = new DeleteBuilder();
                $builder->setTable($this->_table);

                // for ($i = 0; $i < sizeof($this->_tableColumn); $i++)
                //{
                //do the
                //$name = 'get' . $this->_tableColumn[$i];
                /*if($i==0)
                    {
                        $builder->addColumnAndData($this->_tableColumn[$i], $this->{$name}());
                        //$builder->setCriteria("where ".$this->_tableColumn[$i]." = :param".$i);
                    }*/

                //}
                $builder->setCriteria(" where " . $criteria);

                $this->_conn->setQuery(Director::buildSql($builder));
                error_log(date('Y m d :g:i:s:a ') . Director::buildSql($builder) . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

                return $this->_conn->execute_query2($builder->getValues());
            }
        } catch (Exception $e) {
            error_log($e->getMessage(), 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sqlerror.log');
        }
    }


    public function __viewCombo()
    {
        $data2 = array();
        //$sql2="SELECT * FROM  ".$this->_table;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $sql2 = Director::buildSql($builder);
        error_log(date('Y m d :g:i:s:a ') . $sql2 . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql2) as $row) {
            array_push($data2, $row);
        }
        return $data2;
    }
    public function __viewComboCriteria($criteria,$bind=null)
    {
        $data2 = array();
        //$sql2="SELECT * FROM  ".$this->_table;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $builder->setCriteria($criteria);
        $sql2 = Director::buildSql($builder);
        error_log(date('Y m d :g:i:s:a ') . $sql2 . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        if($bind==null)
        {
            foreach ($this->_conn->getResultSet($sql2) as $row) {
                array_push($data2, $row);
            }
        }else{
            foreach($this->_conn->getResultSetBind($sql2,$bind) as $row)
            {
                array_push($data2,$row);
            }

        }

        
        return $data2;
    }

    public function __viewComboSql($sql)
    {
        $data2 = array();
        $sql2 = $sql;
        error_log(date('Y m d :g:i:s:a ') . $sql2 . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql2) as $row) {
            array_push($data2, $row);
        }
        return $data2;
    }



    public function __viewQuery($sql)
    {
        //$data2 = array();
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        return $this->_conn->getResultSet($sql);
    }

    public function _count()
    {
        //$sql="SELECT * FROM  ".$this->_table;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $sql = Director::buildSql($builder);
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        return $this->_conn->sqlCount($sql);
    }
    public function _countDefined($criteria,$bind=null)
    {
        //$sql="SELECT * FROM  ".$this->_table."  where ".$criteria;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $builder->setCriteria($criteria);
        $sql = Director::buildSql($builder);
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        return $this->_conn->sqlCount($sql,$bind);
    }

    public function _DML()
    {
        //$sql="SELECT * FROM  ".$this->_table."  where ".$criteria;
        $data = array();
        $sql = "SHOW TABLES";
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        $allTables = $this->_conn->dmlCopy();
        while ($result = $allTables->fetch()) {
            $data2 = array();
            $data2['tx'] = $result[0];
            array_push($data, $data2);
        }

        return $data;
    }

    public function _countSql($sql)
    {
        //$sql="SELECT * FROM  ".$this->_table."  where ".$criteria;
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        return $this->_conn->sqlCount($sql);
    }


    public function __find($id = 0)
    {
        //$sql="SELECT * FROM  ".$this->_table."  where ".$this->_tableColumn[0]."=".$id;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $builder->setCriteria($this->_tableColumn[0] . "='" . $id . "'");
        $sql = Director::buildSql($builder);
        foreach ($this->_conn->getResultSet($sql) as $row) {

            for ($i = 0; $i < sizeof($this->_tableColumn); $i++) {
                $name = 'set' . $this->_tableColumn[$i];
                $this->{$name}($row[$this->_tableColumn[$i]]);
            }
        }
    }
    public function __findCriteria($criteria,$bind=null)
    {
        //$sql="SELECT * FROM  ".$this->_table."  where ".$criteria;

			//$this->__findCreteria();
            $obj = array();
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        //$criteria=htmlspecialchars($criteria);
        $builder->setCriteria($criteria);
        $sql = Director::buildSql($builder);
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        if($bind==null)
        {
            foreach ($this->_conn->getResultSet($sql) as $row) {

                for ($i = 0; $i < sizeof($this->_tableColumn); $i++) 
                {
                    $name = 'set' . $this->_tableColumn[$i];
                    $this->{$name}($row[$this->_tableColumn[$i]]);
                }
                //array_push($obj,$this);
            }
        }else{
            foreach ($this->_conn->getResultSetBind($sql,$bind) as $row) {

                for ($i = 0; $i < sizeof($this->_tableColumn); $i++) 
                {
                    $name = 'set' . $this->_tableColumn[$i];
                    $this->{$name}($row[$this->_tableColumn[$i]]);
                }
                //array_push($obj,$this);
            }

        }
        

        //return $obj;
    }
    public function __findId($criteria)
    {
        //$sql="SELECT * FROM  ".$this->_table."  where ".$criteria;
        $id = -1;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $builder->setCriteria($criteria);
        $sql = Director::buildSql($builder);
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql) as $row) {

            for ($i = 0; $i < 1; $i++) {
                $name = 'set' . $this->_tableColumn[$i];
                $this->{$name}($row[$this->_tableColumn[$i]]);
            }
        }
        //return $id;

    }


    public function __findJsonObject($id = 0)
    {
        $data2 = array();
        $data = array();


        //$sql="SELECT * FROM  ".$this->_table;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $builder->setCriteria($this->_tableColumn[0] . "='" . $id . "'");
        $sql = Director::buildSql($builder);
        //$this->_conn->setQuery($sql);


        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql) as $row) {
            array_push($data, $row);
        }

        $data2["rows"] = $data;
        return $data;
    }

    public function __findJsonObjectFormLoad($id = 0)
    {
        $data2 = array();
        $data = array();


        //$sql="SELECT * FROM  ".$this->_table;
        $builder = new SelectBuilder();
        $builder->setTable($this->_table);
        $builder->setCriteria($this->_tableColumn[0] . "='" . $id . "'");
        $sql = Director::buildSql($builder);
        //$this->_conn->setQuery($sql);


        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');
        foreach ($this->_conn->getResultSet($sql) as $row) {
            $data = $row;
        }

        //$data["rows"]=$data2;
        return $data;
    }



    public function __lastId()
    {
        return $this->_conn->getId();
    }

    public function convert_number_to_words($number)
    {

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . $this->convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . $this->convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }

    public function clientLogin(login $login)
    {
        return $login->request();
    }

    public function __resultSetBind($sql = null,$bind=null)
    {
        
        $data2 = array();
        $data = array();
        //$page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
        //$rows = isset($_POST["rows"]) ? intval($_POST["rows"]) : 10;

        //$offset = ($page-1)*$rows;

        //$sql="SELECT * FROM  ".$this->_table;
        if (is_null($sql)) {
            $builder = new SelectBuilder();
            $builder->setTable($this->_table);
            $sql = Director::buildSql($builder);
        }

        //$this->_conn->setQuery($sql);

        //$data["total"]=$this->_conn->sqlCount($sql);
        //$sql2=$sql;
        error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'data.log');

        if($bind==null)
        {
            foreach ($this->_conn->getResultSet($sql) as $row) {
                array_push($data2, $row);
            }
        }else
        {
            foreach ($this->_conn->getResultSetBind($sql,$bind) as $row) 
            {
                array_push($data2, $row);
            }
        }

       
    

        //$data["rows"]=$data2;
        return $data2;
    }

    public function createTable($sql)
    {
        $this->_conn->setQuery($sql);
        return $this->_conn->execute_query();
    }



    public function __destruct()
    { }
}
