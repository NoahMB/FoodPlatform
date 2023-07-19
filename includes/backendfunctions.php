<?php
function GenerateMonthorders($date){
    
    header("content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=orderlijst.xls");
    exit();
}