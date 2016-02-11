<?php echo validation_errors(); ?>
<form method="post">
    <div>
        <label for="item">Item Name</label>
        <select name="item">
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
        <label for="date">Date</label>
        <input type="text" name="date" value=""/>
    </div>
    <div>
        <label for="shop">Shop</label>
        <select name="shop">
            <?php
            foreach ($shop_dropdown as $id => $name) {
                echo '<option value"' . html_escape($id) . '">' . html_escape($name) . '</option>';
            }
            ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Save" />
    </div>
</form>