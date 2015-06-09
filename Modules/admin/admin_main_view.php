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
            <h3><?php echo _('Update emonPi'); ?></h3>
            <p>Downloads latest Emoncms changes from Github and updates emonPi firmware. See imprtant notes in <a href="https://github.com/openenergymonitor/emonpi/blob/master/Atmega328/emonPi_RFM69CW_RF12Demo_DiscreteSampling/compiled/CHANGE%20LOG.md">emonPi firmware change log.</a></p>
	    <p>Note: If using emonBase (Raspberry Pi + RFM69Pi) the updater can still be used to update Emoncms, RFM69Pi firmware will not be changed.</p> 
            <p>View the update logfile (/var/log/emonpiupdate.log) <a href="<?php echo $path; ?>admin/getemonpiupdatelog">here</a></p>
            <div class="alert alert-info" id="emonpiupdatereply" style="display:none"></div>
        </td>
        <td><br>
            <button id="emonpiupdate" class="btn btn-info"><?php echo _('Update emonPi'); ?></button>
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
