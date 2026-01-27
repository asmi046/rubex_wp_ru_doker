<div class="counter-wrapper otv_variant">
    <label for="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>"><?php echo $args['q']; ?></label>
    <select 
        name="<?php echo $args['key'] ?>" 
        id="<?php echo $args['key'] ?>_q_<?php echo $args['q_index'] ?>"
        <?php echo ($args['require'])?"required":""; ?>  
    >
        <option selected disabled value="">-</option>
        <option value="Да">Да</option>
        <option value="Нет">Нет</option>
    </select>

</div>