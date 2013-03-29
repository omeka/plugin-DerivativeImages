<?php
$head = array('title' => 'Derivative Images');
echo head($head);
echo flash();
?>
<form method="post">
<section class="seven columns alpha">   
    <p>Omeka attempts to create fullsize, thumbnail, and square thumbnail derivative 
    images when a file is added. This plugin recreates (or creates) derivative images 
    according to the size constraints set in the 
    <a href="<?php echo url('appearance/edit-settings'); ?>">appearance settings</a>. 
    This is useful when the size constraints have been changed, after upgrading from 
    an earlier version of Omeka, or after your server's 
    <a href="http://www.imagemagick.org/script/index.php">ImageMagick</a> 
    software has been upgraded.</p>
    <p>Omeka is unable to create derivative images for some files. We highly recommend 
    that you back up Omeka's files directory before running this process.</p>
    <div class="field">
        <div class="two columns alpha">
            <label >Process type</label>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">Select which files you want this process to affect.</p>
            <label><input type="radio" name="process_type" value="all" checked="checked"/> All files</label>
            <label><input type="radio" name="process_type" value="has_derivative" /> Files that have derivative images</label>
            <label><input type="radio" name="process_type" value="has_no_derivative" /> Files that do not have derivative images</label>
        </div>
    </div>
    <div class="field">
        <div class="two columns alpha">
            <label >Image sizes</label>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">Select which image sizes you want to create. Checking 
            none will create all image sizes.</p>
            <label><input type="checkbox" name="derivative_types[]" value="fullsize" /> Fullsize (<?php echo get_option('fullsize_constraint'); ?> pixels)</label>
            <label><input type="checkbox" name="derivative_types[]" value="thumbnail" /> Thumbnail (<?php echo get_option('thumbnail_constraint'); ?> pixels)</label>
            <label><input type="checkbox" name="derivative_types[]" value="square_thumbnail" /> Square thumbnail (<?php echo get_option('square_thumbnail_constraint'); ?> pixels)</label>
        </div>
    </div>
    <div class="field">
        <div class="two columns alpha">
            <label >MIME types</label>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">Select which file MIME types you want to process. 
            Checking none will process all MIME types. (This list represents every MIME 
            type currently in Omeka.)</p>
            <?php foreach ($this->mime_types as $mime_type): ?>
            <label><input type="checkbox" name="mime_types[]" value="<?php echo htmlentities($mime_type); ?>" /> <?php echo $mime_type; ?></label>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="three columns omega">
    <div id="save" class="panel">
        <?php echo $this->formSubmit('submit_file_process', 'Process Files', array('class'=>'submit big green button')); ?>
    </div>
</section>
</form>
<?php echo foot(); ?>
