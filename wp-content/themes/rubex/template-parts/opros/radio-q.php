<div class="radio-wrapper otv_variant">
    <input 
        type="radio" 
        name="<?php echo $args['key'] ?>" 
        id="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>" 
        value="<?php echo $args['q']; ?>"
        <?php echo ($args['require'])?"required":""; ?>
    >        
    <label class="checkboxLabel radioLabel" for="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>"><?php echo $args['q']; ?></label>
</div>