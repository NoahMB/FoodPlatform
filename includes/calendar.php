<?php
class Calendar {  
     
    /**
     * Constructor
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Maa","Din","Woe","Don","Vrij","Zat","Zon");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;

    private $availableDays = null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show() {
        $year  = null;
         
        $month = null;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="calendar" class="calendar">'.
                        '<div class="navi">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="main">'.
                                '<div class="labels">'.$this->_createLabels().'</div>';        
                                $content.='<div class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                    $content.='<div class="week">';        
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        if ($j == 3 || $j == 6 || $j == 7) {
                                            $content.=$this->_showDayNoClick($i*7+$j);
                                        } else {
                                            $content.=$this->_showDay($i*7+$j);
                                        }
                                    }
                                    $content.='</div>'; 
                                }  
             
                        $content.='</div>';
                 
        $content.='</div></div>';
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            include 'conn.php';
            $sql = "SELECT MenuName FROM `TblOrders` WHERE `StudentID` IN (SELECT `StudentID` FROM `tblFamilie` WHERE `GuardianID` = " . $_SESSION["GuardianID"] . " ) AND OrderDate = '" . $this->currentDate . "';";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
             
            $cellContent = "<div class='day'><p class='dayNumber'>" . $this->currentDay . "</p><p class='dayOrder'>" . ($result->num_rows > 0?$row["MenuName"]:'') . "<p></div>";

            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
             
        # $cellContent needs to be changed 


        $dateID = "'" . $this->currentDate . "'";

        include 'conn.php';
        $sql = "SELECT OrderDate FROM `TblOrders` WHERE `StudentID` IN (SELECT `StudentID` FROM `tblFamilie` WHERE `GuardianID` = " . $_SESSION["GuardianID"] . " ) AND OrderDate = '" . $this->currentDate . "';";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();

        return '
        <div onClick = "clickFunction('.$dateID.')" id="'.$this->currentDate.'" 
        class="datecell '.($cellContent==null?'mask':'').'
        
        '. ($result->num_rows > 0?'dateOrdered':'') .'

        "  '.($cellContent!=null?'data-toggle="modal" data-target="#exampleModal"':'').'>'  
        .

        $cellContent # content in day cells
        
        .
        '</div>';
    }

    private function _showDayNoClick($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            include 'conn.php';
            $sql = "SELECT MenuName FROM `TblOrders` WHERE `StudentID` IN (SELECT `StudentID` FROM `tblFamilie` WHERE `GuardianID` = " . $_SESSION["GuardianID"] . " ) AND OrderDate = '" . $this->currentDate . "';";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
             
            $cellContent = "<div class='day'><p class='dayNumber'>" . $this->currentDay . "</p><p class='dayOrder'>" . ($result->num_rows > 0?$row["MenuName"]:'') . "<p></div>";

            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
             
        # $cellContent needs to be changed 


        $dateID = "'" . $this->currentDate . "'";

        include 'conn.php';
        $sql = "SELECT OrderDate FROM `TblOrders` WHERE `StudentID` IN (SELECT `StudentID` FROM `tblFamilie` WHERE `GuardianID` = " . $_SESSION["GuardianID"] . " ) AND OrderDate = '" . $this->currentDate . "';";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();

        return '
        <div onClick = "clickFunction('.$dateID.')" id="'.$this->currentDate.'" 
        class="datecell unavailable'.($cellContent==null?' mask':'').'
        
        '. ($result->num_rows > 0?'dateOrdered':'') .'

        ">'  
        .

        $cellContent # content in day cells
        
        .
        '</div>';
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            
            '<div class="prev"><a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Vorige</a></div>'.
            '<div class="date">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</div>'.
            '<div class="next"><a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Volgende</a></div>';
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<div class="label">'.$label.'</div>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
     
}