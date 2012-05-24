<div id="app_info">
    <!-- Start Logo -->
    <a href="#home" class="logo">
        <img src="img/light-logo.png" alt="Fluid App" />
    </a>
    <!-- End Logo -->
    <span class="tagline">The simplest way to create an event.</span>

    <p>Fill out the details</p>
    <p>Get a unique url to your event</p>
    <p>Invite your guests</p>


    <div class="buttons">
        <a href="#" class="large_button" id="apple">
            <span class="icon"></span>
            <em>Download now for</em> iPhone
        </a>
        <a href="#" class="large_button" id="android">

            <em>Cool</em>
            Create event
        </a>
    </div>

    <div class="price centered">
        <p>Woop!</p>
        </div--><!-- Alignments options: right_align, left_align, centered -->
    </div>
</div>
<div id="pages">
    <div class="top_shadow"></div>
    <div id ="contact" class="page">

        <div id ="contact_form" class="events form">
            <?php echo $this->Form->create('Event'); ?>
            <p>
                <?php echo $this->Form->input('title', array('div'=>false)); ?>
            </p>
            <div class="row">
                <p class="left">
                    <?php echo $this->Form->input('from', array('div'=>false, 'type'=>'text')); ?>
                </p>
                <p class="right">
                    <?php echo $this->Form->input('to', array('div'=>false, 'type'=>'text')); ?>
                </p>
            </div>
            <p>
                <?php echo $this->Form->input('location', array('div'=>false)); ?>
            </p>
            <p>
                <?php echo $this->Form->input('description', array('div'=>false, 'label'=>array('class'=>'textarea'))); ?>
            </p>
            <?php echo $this->Form->end(array('value'=>__('Create event'),'label'=>__('Create event').' &#x2192;','class'=>'button green','escape'=>false)); ?>
        </div>
    </div>


</div>
<div class="bottom_shadow"></div>