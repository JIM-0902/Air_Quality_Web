<?php
    
    $Selectauthor=$_GET["name"];
    
    // 當利用form表單降值傳入到php時，先將值傳到某一個變數內，在進行SELECT時較不會有問題

    $mysqli=new mysqli('127.0.0.1','root','oiet123456','TEST');
    
    $sql="SELECT * FROM Airpollution WHERE SiteName IN ('$Selectauthor') " ;
    
    // SQL 函數語言
    
    

    if(!$result=$mysqli->query($sql)){
        echo "SORRY";
        exit;
    }


    echo "<ul>";
    
    while($post=$result->fetch_assoc())
    {
        $SiteName=$post['SiteName'];
        $County=$post['County'];
        $AQI=$$post['AQI'];
        $SO2=$post['SO2'];
        $Pollutant=$post['Pollutant'];
        $Status=$post['Status'];
        $CO=$post['CO'];
        $CO_8hr=$post['CO_8hr'];
        $O3=$post['O3'];
        $O3_8hr=$post['O3_8hr'];
        $PM10=$post['PM10'];
        $PM25=$post['PM2.5'];
        $NO2=$post['NO2'];
        $NOx=$post['NOx'];
        $NO=$post['NO'];
        $DataCreationDate=$post['DataCreationDate'];
        
        //$PM2.5有小數點不可
      /*  
        echo "<li>";
        echo 'SiteName : ' . $SiteName  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'County  : ' .$County  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'AQI    : ' . $AQI  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'SO2    : ' . $SO2  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'Pollutant    : ' . $Pollutant  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'Status    : ' . $Status  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'CO    : ' . $CO . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'CO_8hr    : ' . $CO_8hr  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'O3    : ' . $O3  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'O3_8hr    : ' . $O3_8hr  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'PM10    : ' . $PM10  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'PM2.5    : ' . $PM25  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'NO2    : ' . $NO2  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'NOx    : ' . $NOx  . '<br>';
        echo "</li>";
        
        echo "<li>";
        echo 'NO    : ' . $NO  . '<br>';
        echo "</li>";
    */
    }
    
   
   // mysql_num_rows( )：回傳我們的資料有幾個列
   // mysql_fecth_rows( )：讀取該資料表中列的資料，回傳的是一列資料。


?>
<br>
<br>
<table width="700" border="1">
  <tr>
    <td>SiteName</td>
    <td>County</td>
    <td>AQI </td>
    <td>SO2</td>
    <td>Pollutant</td>
    <td>CO</td>
    <td>CO_8hr</td>
    <td>O3</td>
    <td>O3_8hr</td>
    <td>PM10</td>
    <td>PM2.5</td>
    <td>NO2</td>
    <td>NOx</td>
    <td>NO</td>
    <td>DataCreationDate</td>

    
    
    
    
  </tr>
  <tr>
    <td><?php echo $SiteName?></td>
    <td><?php echo $County?></td>
    <td><?php echo $AQI?></td>
    <td><?php echo $SO2?></td>
    <td><?php echo $Pollutant?></td>
    <td><?php echo $CO?></td>
    <td><?php echo $CO_8hr?></td>
    <td><?php echo $O3?></td>
    <td><?php echo $O3_8hr?></td>
    <td><?php echo $PM10?></td>
    <td><?php echo $PM25?></td>
    <td><?php echo $NO2?></td>
    <td><?php echo $NOx?></td>
    <td><?php echo $NO?></td>
    <td><?php echo $DataCreationDate?></td>
    
    
  </tr>
</table>








