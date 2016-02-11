<?php echo validation_errors(); ?>
<form method="post">
    <div>
        <label for="id">Item Name</label>
        <select name="id">
            <?php
            foreach ($item_form_options as $id => $name) {
                echo '<option value"' . html_escape($id) . '">' . html_escape($name) . '</option>';
            }
            ?>
        </select>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" value=""/>
    </div>
    <div>
        <label for="price_date">Date</label>
        <input type="text" name="date" value=""/>
    </div>
    <div>
        <input type="submit" value="Save" />
    </div>
</form>