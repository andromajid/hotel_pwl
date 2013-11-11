<form action="" method="POST" class="login" >
   <?php
   if(isset($_SESSION['member']['member_network_id']))
   {
       echo '<p>Selamat Datang '.$_SESSION['member']['member_name'].', <a href="'.Yii::app()->baseUrl.'/member/profile">Voffice</a> | 
            <a href="'.Yii::app()->baseUrl.'/member/login/logout">Logout</a>
            </p>';
   }
   else
   {
       ?>
     <input name="member[submit]" type="image" src="<?php echo Yii::app()->theme->baseUrl.'/views/layouts/';?>images/btn-login.png" class="submit" />
    <input name="member[password]" type="password" placeholder="password" value="" class="login-text"/>
    <input name="member[username]" type="text" placeholder="username" value="" class="login-text" />    
        <?php
   }
   ?>
   
<!--    <p>Kamis, 31 januari 2013 | 12:00 wib</p>-->
    </form>