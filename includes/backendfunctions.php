<?php
function getSpecifiedDays($month, $year) {
    $dateString = '01-'.$month.'-'.$year;
    $date = DateTime::createFromFormat('d-m-Y', $dateString);
    $days = array(
        '1' => 'Ma',
        '2' => 'Di',
        '4' => 'Do',
        '5' => 'Vrij'
    );

    $dates = array();

    while ($date->format('m') === $month) {
        $dayOfWeek = $date->format('N');
        if (isset($days[$dayOfWeek])) {
            $dates[] = $days[$dayOfWeek] . ' ' . $date->format('d/m');
        }
        $date->modify('+1 day');
    }
    foreach ($dates as $key => $value) {
        
        echo "<th>{$value}</th>";
        
    }
    return $dates;
}

function GenerateMonthorders($month, $year){
    
    header("content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=orderlijst.xls");?>
    <table>
    <tr>
    <th>Naam</th>
    <th>Voornaam</th>
    <th>Mailadres Ouders</th>
    <th>klas</th>
    <th>juf</th>
    <?php getSpecifiedDays($month, $year)?>
    </tr>
    </table>

    <?php
    exit();
}

?>