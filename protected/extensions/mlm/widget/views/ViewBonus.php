
<table class="table table-striped table-hover table-bordered table-condensed" width="100%">
<thead>
        <tr>
            <th >&nbsp;</th>
            <th >Diperoleh</th>
            <th >Dibayarkan</th>
            <th >Saldo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Sponsor</td>
            <td><?php echo number_format($data_bonus['bonus_sponsor_acc']); ?></td>
            <td><?php echo number_format($data_bonus['bonus_sponsor_paid']); ?></td>
            <td><?php echo number_format(($data_bonus['bonus_sponsor_acc'] - $data_bonus['bonus_sponsor_paid'])); ?></td>
        </tr>
        <tr>
            <td>Pasangan Segitiga</td>
            <td><?php echo number_format($data_bonus['bonus_match_acc']); ?></td>
            <td><?php echo number_format($data_bonus['bonus_match_paid']); ?></td>
            <td><?php echo number_format(($data_bonus['bonus_match_acc'] - $data_bonus['bonus_match_paid'])); ?></td>
        </tr>
        <tr>
            <td>Titik Level</td>
            <td><?php echo number_format($data_bonus['bonus_node_acc']); ?></td>
            <td><?php echo number_format($data_bonus['bonus_node_paid']); ?></td>
            <td><?php echo number_format(($data_bonus['bonus_node_acc'] - $data_bonus['bonus_node_paid'])); ?></td>
        </tr>
         <tr>
            <td>Reward</td>
            <td><?php //echo number_format($data_bonus['bonus_reward_acc']); ?></td>
            <td><?php //echo number_format($data_bonus['bonus_reward_paid']); ?></td>
            <td><?php //echo number_format(($data_bonus['bonus_reward_acc'] - $data_bonus['bonus_reward_paid'])); ?></td>
        </tr>
    </tbody>
</table>