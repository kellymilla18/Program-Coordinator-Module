<html>
    <head>
        <title>Program Coordinator Module</title>
    </head>
    <body>
        <?php
            foreach($programs as $program_id => $program_name) {
        ?>
        <a href="<?php echo base_url("index.php/pages/viewprogram/". $program_id); ?>">
        <?php echo $program_name; ?>
        </a> <br>
        <?php   
            }
        ?>
    </body>
</html>