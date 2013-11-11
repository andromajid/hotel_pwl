<div class="tree">
    <table border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td width="43.75%" colspan="7"></td>
            <td width="12.5%" colspan="2" align="center" class="up-next">
                <?php
                if ($top_id >  $_SESSION['member']['network_id'])
                    echo '<a href="' . Yii::app()->baseUrl . '/member/binary/geneology/' . function_lib::get_network_mid($data[1]['network_upline_network_id']) . '">UP</a>';
                ?>
            </td>
            <td width="43.75%" colspan="7"></td>
        </tr>
        <tr>
            <td width="43.75%" colspan="7"></td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[1]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[1]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[1]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[1]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="43.75%" colspan="7"></td>
        </tr>
        <tr>
            <td width="50%" colspan="8" height="10" class="line-right"></td>
            <td width="50%" colspan="8"></td>
        </tr>
        <tr>
            <td width="25%" colspan="4" height="10" class="line-right"></td>
            <td width="50%" colspan="8" class="line-top"></td>
            <td width="25%" colspan="4" class="line-left no-line-top"></td>
        </tr>
        <tr>
            <td width="18.75%" colspan="3"></td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[2]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[2]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[2]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[2]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="37.5%" colspan="6"></td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[3]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[3]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[3]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[3]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="18.75%" colspan="3"></td>
        </tr>
        <tr>
            <td width="25%" colspan="4" height="10" class="line-right"></td>
            <td width="50%" colspan="8"></td>
            <td width="25%" colspan="4" class="line-left"></td>
        </tr>
        <tr>
            <td width="12.5%" colspan="2" height="10" class="line-right"></td>
            <td width="25%" colspan="4" class="line-top"></td>
            <td width="25%" colspan="4" class="line-right line-left no-line-top"></td>
            <td width="25%" colspan="4" class="line-top"></td>
            <td width="12.5%" colspan="2" class="line-left no-line-top"></td>
        </tr>
        <tr>
            <td width="6.25%"></td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[4]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[4]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[4]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[4]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2"></td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[5]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[5]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[5]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[5]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2"></td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[6]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[6]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[6]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[6]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2"></td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[7]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[7]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[7]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[7]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="6.25%"></td>
        </tr>
        <tr>
            <td width="12.5%" colspan="2" height="10"></td>
            <td width="25%" colspan="4" class="line-right line-left"></td>
            <td width="25%" colspan="4"></td>
            <td width="25%" colspan="4" class="line-right line-left"></td>
            <td width="12.5%" colspan="2"></td>
        </tr>
        <tr>
            <td width="6.25%" class="line-right"></td>
            <td width="12.5%" colspan="2" height="10" class="line-top"></td>
            <td width="12.5%" colspan="2" class="line-right line-left no-line-top"></td>
            <td width="12.5%" colspan="2" class="line-top"></td>
            <td width="12.5%" colspan="2" class="line-right line-left no-line-top"></td>
            <td width="12.5%" colspan="2" class="line-top"></td>
            <td width="12.5%" colspan="2" class="line-right line-left no-line-top"></td>
            <td width="12.5%" colspan="2" class="line-top"></td>
            <td width="6.25%" class="line-left no-line-top"></td>
        </tr>
        <tr>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[8]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[8]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[8]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[8]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[9]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[9]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[9]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[9]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[10]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[10]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[10]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[10]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[11]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[11]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[11]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[11]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[12]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[12]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[12]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[12]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[13]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[13]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[13]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[13]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[14]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[14]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[14]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[14]['member_node']; ?></td></tr>
                </table>
            </td>
            <td width="12.5%" colspan="2" align="center">
                <table class="<?php echo $data[15]['box_class']; ?>" border="0" cellpadding="0" cellspacing="0" width="100%" height="120">
                    <tr><td class="mid"><?php echo $data[15]['member_mid']; ?></td></tr>
                    <tr><td class="data"><?php echo $data[15]['member_info']; ?></td></tr>
                    <tr><td class="node"><?php echo $data[15]['member_node']; ?></td></tr>
                </table>
            </td>
        </tr>
    </table>
</div>

