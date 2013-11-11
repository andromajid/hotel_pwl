<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl.'/views/layouts/';?>images/mt.png" style="margin-left:20px; "  /></a>
    <div class="rek">
        <?php
        if(!empty($results))
        {
            ?>
            <ul style="margin-top:10px;">
            <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
            <?php
            foreach($results AS $row)
            {
                $networkId=$row['member_network_id'];
                $networkMid=function_lib::get_network_mid($row['member_network_id']);
                $memberName=$row['member_name'];
                $memberCity=function_lib::get_area_name($row['member_city_id']);
                $memberAdr=$row['member_address'];
           
                ?>
                 <li>
<!--                    <h1><?php echo $memberName;?> :</h1>-->
                     
                    <h1>MID : <?php echo $networkMid;?></h1>
                    <p>Daerah Asal : <?php echo $memberCity;?></p>
                </li>
                <?php
            }
            ?>
            </marquee>
            </ul> 
            <?php
        }
        ?>
       
    </div>