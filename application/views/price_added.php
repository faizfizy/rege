<div class="alert alert-success">
    New price for
    <?php echo html_escape($item->brand . " " . $item->name); ?>
    at
    <?php echo html_escape($shop->name); ?>
    is successfully saved.
    <?php echo anchor('items/view/' . $item->id, 'Back to Item Page'); ?>
</div>