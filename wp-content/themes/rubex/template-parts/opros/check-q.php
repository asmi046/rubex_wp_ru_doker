<div class="radio-wrapper otv_variant">
    <input 
        type="checkbox" 
        name="<?php echo $args['key'] ?>_<?php echo $args['q_index'] ?>" 
        id="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>" 
        value="<?php echo $args['q']; ?>"
        <?php echo ($args['require'])?"required":""; ?>
    >        
    <label class="checkboxLabel" for="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>"><?php echo $args['q']; ?></label>
</div>