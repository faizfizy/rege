<div class="alert alert-success">
    Price for
    <?php echo html_escape($item->brand . " " . $item->name); ?>
    at
    <?php echo html_escape($s_name); ?>
    is successfully updated.
    <?php echo anchor('items/view/' . $item->id, 'Back to Item Page'); ?>
</div>