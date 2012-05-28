<div id="app_info">
    <img src="<?php echo $this->Html->url('/upload/').$event['Event']['image'] ?>" style="width:100%;    " />
</div>
<div id="pages">
    <div class="top_shadow"></div>
    <div id ="contact" class="page current">
        <h1><?php echo $event['Event']['name'] ?></h1>
        <p class="by">
            <?php 
                echo '<strong>'.__('By').': '.'</strong>';    
                echo $event['Event']['creator'].'.';    
                echo '<strong>'.__(' On').': '.'</strong>';
                echo $this->Time->niceShort($event['Event']['from']);
                if ($event['Event']['to'] !== null) {
                    echo __(' to ') . $this->Time->niceShort($event['Event']['to']);
                }
                echo '.';
                echo '<strong>'.__(' At').': '.'</strong>';
                echo $event['Event']['where'].'.';
        ?>
        </p>
        <br />
        <p class="details">
            <?php
                echo nl2br($event['Event']['details']); 
            ?>
        </p>
    </div>
    <div class="bottom_shadow"></div>
</div>
