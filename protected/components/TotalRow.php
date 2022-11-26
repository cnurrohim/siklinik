<?php

Yii::import('zii.widgets.grid.CGridColumn');

class TotalRow extends CGridColumn {

    private $_total = 0;
    private $_jumlah  = null;
    private $_harga  = null;
    private $_name  = '';

    public function getName(){
        return $this->_name;
    }
    public function setName($value)
    {
        $this->_name = $value;
    }
    public function getJumlah()
    {
        return $this->_jumlah;
    }
    public function setJumlah($value)
    {
        $this->_jumlah = $value;
    }

    public function getHarga()
    {
        return $this->_harga;
    }
    public function setHarga($value)
    {
        $this->_harga = $value;
    }

    public function renderDataCellContent($row, $data) {
        $this->_total = $data->{$this->jumlah} * $data->{$this->harga};

        echo $this->_total;
    }
}