<?php

    /*
        All Emoncms code is released under the GNU Affero General Public License.
        See COPYRIGHT.txt and LICENSE.txt.

        ---------------------------------------------------------------------
        Emoncms - open source energy visualisation
        Part of the OpenEnergyMonitor project:
        http://openenergymonitor.org
    */

    global $path, $session, $menu, $menu;
    if (!isset($session['profile'])) $session['profile'] = 0;

    $menu_left = $menu['left'];
    $menu_right = $menu['right'];
    $menu_dropdown = $menu['dropdown'];
    $menu_dropdown_config = $menu['dropdownconfig'];
    
    foreach ($menu_dropdown_config as $menu_dropdown_config_item) {
        $menu_dropdown[] = $menu_dropdown_config_item;
    }

    if (!$session['write']) $menu_right[] = array('name'=>"Log In", 'path'=>"user/login", 'order' => -1 );
?>

<ul class="nav">
    <?php

    foreach ($menu_left as $item)
    {
        if (isset($item['session'])) {
            if (isset($session[$item['session']]) && $session[$item['session']]==1) {
                if (!isset($item['dropdown'])) {
                    echo "<li><a href=\"".$path.$item['path']."\">".$item['name']."</a></li>";
                } else {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo $item['name']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <?php 
                        
                        foreach ($item['dropdown'] as $dropdownitem) { 
                            if (isset($dropdownitem[0])) {
                                $name = $dropdownitem[0]; 
                            } else {
                                $name = $dropdownitem['name'];
                            }
                            
                            if (isset($dropdownitem[1])) {
                                $linkpath = $dropdownitem[1]; 
                            } else {
                                $linkpath = $dropdownitem['path'];
                            }
                        ?>
                            <li>
                                <a href="<?php echo $path.$linkpath; ?>" data-toggle="collapse" data-target=".nav-collapse">
                                <?php echo $name; ?>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    
                    <?php
                }
            }
        } else {
            echo "<li><a href=\"".$path.$item['path']."\">".$item['name']."</a></li>";
        }
    }

    ?>

    <?php if (count($menu_dropdown) && $session['read']) { ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Extras <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <?php foreach ($menu_dropdown as $item) { ?>
                <?php if (isset($session[$item['session']]) && $session[$item['session']]==1) { ?>
                    <li><a href="<?php echo $path.$item['path']; ?>"><?php echo $item['name']; ?></a></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </li>
    <?php } ?>
</ul>

<ul class="nav pull-right">
    <?php

    foreach ($menu_right as $item)
    {
        if (isset($item['session'])) {
            if (isset($session[$item['session']]) && $session[$item['session']]==1) {
                echo "<li><a href=".$path.$item['path']." >".$item['name']."</a></li>";
            }
        } else {
            echo "<li><a href=".$path.$item['path']." >".$item['name']."</a></li>";
        }
    }

    ?>
</ul>

