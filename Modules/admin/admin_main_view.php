<?php global $path, $emoncms_version; ?>
<h2>Admin</h2>

<table class="table table-striped ">
    <tr>
        <td colspan="2">Emoncms version: <?php echo $emoncms_version; ?></td>
    </tr>
    <tr>
        <td>
            <h3><?php echo _('Users'); ?></h3>
            <p><?php echo _('Administer user accounts'); ?></p>
        </td>
        <td><br>
            <a href="<?php echo $path; ?>admin/users" class="btn btn-info"><?php echo _('Users'); ?></a>
        </td>
    </tr>
    <tr>
        <td>
            <h3><?php echo _('Update database'); ?></h3>
            <p><?php echo _('Run this after updating emoncms, after installing a new module or to check emoncms database status.'); ?></p>
        </td>
        <td><br>
            <a href="<?php echo $path; ?>admin/db" class="btn btn-info"><?php echo _('Update & check'); ?></a>
        </td>
    </tr>
    <tr>
        <td>
            <h3><?php echo _('Update EmonPi'); ?></h3>
            <p><?php echo _('Downloads latest changes from github and runs emonpi update script'); ?></p>
            <p>View last 30 lines from /var/log/emonpiupdate.log <a href="<?php echo $path; ?>admin/getemonpiupdatelog">here</a></p>
            <div class="alert alert-info" id="emonpiupdatereply" style="display:none"></div>
        </td>
        <td><br>
            <button id="emonpiupdate" class="btn btn-info"><?php echo _('Update EmonPi'); ?></button>
        </td>
    </tr>
</table>

<script>

var path = "<?php echo $path; ?>";

$("#emonpiupdate").click(function() {
    var reply = "";
    $.ajax({ url: path+"admin/emonpiupdate", async: false, dataType: "text", success: function(result)
        {
            reply = result;
            $("#emonpiupdatereply").html(reply);
            $("#emonpiupdatereply").show();
        } 
    });
});

</script>
