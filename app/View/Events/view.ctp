<div id="app_info">
    <h1><?php echo $event['Event']['name'] ?></h1>    
    <?php
        if(!empty($event['Event']['image'])){
            echo '<img src="'.$this->Html->url('/upload/') . $event['Event']['image'].'" style="width:100%;" />';
        }
    ?>
    <p class="by">
        <?php
        echo '<strong>' . __('By') . ': ' . '</strong>';
        echo $event['Event']['creator'] . '.';
        echo '<strong>' . __(' On') . ': ' . '</strong>';
        echo $this->Time->niceShort($event['Event']['from']);
        if ($event['Event']['to'] !== null) {
            echo __(' to ') . $this->Time->niceShort($event['Event']['to']);
        }
        echo '.';
        echo '<strong>' . __(' At') . ': ' . '</strong>';
        echo $event['Event']['where'] . '.';
        ?>
    </p>
    <br />
    <p class="details">
        <?php
            echo nl2br($event['Event']['details']);
        ?>
    </p>
</div>
<div id="pages">
    <div class="top_shadow"></div>
    <div id ="contact" class="page current">
        <h1>Reply</h1>
        <?php echo $this->Form->create('Guest', array('type' => 'file', 'action'=>'add')); ?>
        <p>
            <?php echo $this->Form->hidden('event_id',array('value'=>$event['Event']['id'])); ?>
            <?php echo $this->Form->input('name', array('div' => false, 'label'=>'Your name')); ?>
            <?php echo $this->Form->input('comment', array('div' => false, 'label'=>__('Leave a short comment'))); ?>
        </p>
            <?php echo $this->Form->submit(__('Attend'), array('value' => 'Attend', 'name'=>'button', 'class' => 'button green', 'escape' => false)); ?>
            <?php echo $this->Form->end(array('label' => __('Decline'), 'name'=>'button', 'class' => 'button pink', 'escape' => false)); ?>
        <br class="clear" />
        <h1>Guests</h1>
        <ul class="guests">
            <?php
            foreach ($event['Guest'] as $guest){
                $class = $guest['attending'] == 1 ? 'attending' : 'declined'; 
                echo "<li>";
                echo "<span class='$class'>$class</span>".$guest['name'];
                if(!empty($guest['comment'])){
                    echo "<p class='comment'> - ".$guest['comment']."</p>";
                }
                echo "</li>";
            }
            ?>
        </ul>  
    </div>
    <div class="bottom_shadow"></div>
</div>
