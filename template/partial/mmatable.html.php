<table class="table mma-table">
    <tr>
        <th colspan="2"><span class="super"><?php echo isset($tl) ? $tl : '';?></span> <?php echo isset($tr) ? $tr : '';?></th>
    </tr>
    <tr>
        <td class="active">
            <?php echo (isset($bli) ? '<span class="glyphicon glyphicon-'.$bli.'"></span>' : ''); ?>
            <?php echo $bl;?>
        </td>
        <td class="active">
            <?php echo (isset($bri) ? '<span class="glyphicon glyphicon-'.$bri.'"></span>' : ''); ?>
            <?php echo $br;?>
        </td>
    </tr>
</table>