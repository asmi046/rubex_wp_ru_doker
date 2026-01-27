<div class="counter-wrapper otv_variant">
    <label for="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>"><?php echo $args['q']; ?>:</label>
    <!-- <input type="number" name="<?php echo $args['key'] ?>" id="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>" min="1" max="10" required="" value="10">         -->
    <select 
        name="<?php echo $args['key'] ?>" 
        id="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>"
        <?php echo ($args['require'])?"required":""; ?>
    >
        <option disabled selected value="">-</option>
        <option value="10">10</option>
        <option value="9">9</option>
        <option value="8">8</option>
        <option value="7">7</option>
        <option value="6">6</option>
        <option value="5">5</option>
        <option value="4">4</option>
        <option value="3">3</option>
        <option value="2">2</option>
        <option value="1">1</option>
    </select>
</div>