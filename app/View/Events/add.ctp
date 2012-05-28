<div id="app_info">
    <h1>The simplest way to create an event.</h1>
    <span class="tagline">Fill out the details</span>
    <span class="tagline">Get a unique url to your event</span>
    <span class="tagline">Invite your guests</span>
</div>
<div id="pages">
    <div class="top_shadow"></div>
    <div id ="contact" class="page current">
        <div id ="contact_form">
            <?php echo $this->Form->create('Event', array('type' => 'file')); ?>
            <p>
                <?php echo $this->Form->input('name', array('div' => false, 'label'=>'Event name')); ?>
            </p>
            <p>
                <?php echo $this->Form->input('creator', array('div' => false, 'label' => 'Your name')); ?>
            </p>
            <div class="row">
                <p class="left">
                    <?php echo $this->Form->input('from', array('div' => false, 'type' => 'text', 'class' => 'datepicker', 'label'=>'When')); ?>
                </p>
                <p class="left">
                    <?php echo $this->Form->input('fromTime', array('div' => false, 'type' => 'text', 'class' => 'timepicker', 'label' => 'Time')); ?>
                </p>
            </div>
            <span id="addEndTimeLink"><?php echo $this->Html->link(__('Add end time'), '#', array('onclick' => 'addEndTime();')) ?></span>
            <div class="row" id="endTimeFields" style='display: none;'>
                <p class="left">
                    <?php echo $this->Form->input('to', array('div' => false, 'type' => 'text', 'class' => 'datepicker')); ?>
                </p>
                <p class="left">
                    <?php echo $this->Form->input('toTime', array('div' => false, 'type' => 'text', 'class' => 'timepicker', 'label' => 'Time')); ?>
                </p>
            </div>
            <div class="clear"></div>
            <p>
                <?php echo $this->Form->input('where', array('div' => false)); ?>
            </p>
            <p>
                <?php echo $this->Form->input('details', array('div' => false)); ?>
            </p>
            <p class="">
                <?php echo $this->Form->input('image', array('div' => false, 'type' => 'file', 'label'=>'Image')); ?>
            </p>
            <div class="clear"></div>

            <?php echo $this->Form->end(array('value' => __('Create event'), 'label' => __('Create event') . ' &#x2192;', 'class' => 'button green', 'escape' => false)); ?>
        </div>
    </div>
    <div class="bottom_shadow"></div>
</div>
<script type="text/javascript">
    function addEndTime(){
        $("#addEndTimeLink").fadeOut(500);
        $("#endTimeFields").fadeIn(500);
        $('label[for="EventFrom"]').text('From');
        $('label[for="EventEnd"]').text('To');
        $('#EventTo').val($('#EventFrom').val());
    }
    var source = [];
    for(var i=0; i<=23; i++){
        var hour = i.toString();
        if(hour.length<2){
            hour = '0'+hour;
        }
        source.push(hour+':00')
    }
    $(".timepicker").autocomplete({
        source: source
    });
    
</script>
