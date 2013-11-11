<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <!-- Be sure to leave the brand out there if you want it shown -->
            <a class="brand" href="#" style="margin-left: 0px;"><!-- BRAND --> Selamat Datang, <?php echo $_SESSION['member']['member_name'];?>  </a>

            <div class="nav-collapse">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'htmlOptions' => array('class' => 'pull-right nav'),
                    'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
                    'itemCssClass' => 'item-test',
                    'encodeLabel' => false,
                    'items' => array(
                      //  array('label' => 'Dashboard', 'url' => array('/site/index')),
                        
                        /* array('label'=>'Gii generated', 'url'=>array('customer/index')), */
                       
                        array('label' => 'Jaringan <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"),
                            'items' => array(
                                array('label' => 'Geneology Jaringan', 'url' => Yii::app()->baseUrl.'/member/geneology/view_network'),
                                array('label' => 'Sponsorisasi', 'url' => Yii::app()->baseUrl.'/member/geneology/sponsoring'),
                                array('label' => 'Report Jaringan', 'url' => Yii::app()->baseUrl.'/member/geneology/report'),
                           
                        )),
                        array('label' => 'Komisi <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"),
                            'items' => array(
                                array('label' => 'Bonus', 'url' =>  Yii::app()->baseUrl.'/member/bonus'),
                                array('label' => 'Histori', 'url' =>  Yii::app()->baseUrl.'/member/bonus/log'),
                                array('label' => 'Laporan Pembayaran', 'url' =>  Yii::app()->baseUrl.'/member/bonus/report'),
                           
                        )),
                        array('label' => 'Reward <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"),
                            'items' => array(
                                array('label' => 'Informasi Reward', 'url' =>  Yii::app()->baseUrl.'/member/reward'),
                                array('label' => 'Histori', 'url' =>  Yii::app()->baseUrl.'/member/reward/history'),
                                
                           
                        )),
                         array('label' => 'Settings <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"),
                            'items' => array(
                                array('label' => 'Ubah Profile', 'url' => Yii::app()->baseUrl.'/member/profile/index'),
                                array('label' => 'Ubah Password', 'url' => Yii::app()->baseUrl.'/member/profile/edit_password'),
                                array('label' => 'Logout', 'url' =>  Yii::app()->baseUrl.'/member/login/logout'),
                           
                        )),

                  //      array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    //    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                    ),
                ));
              
                
                ?>
            </div>
        </div>
    </div>
</div>

