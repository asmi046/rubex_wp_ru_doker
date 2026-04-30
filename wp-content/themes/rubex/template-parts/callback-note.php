<style>
    .callback-note {
        margin-top: 14px;
        display: grid;
        gap: 5px;
        font-size: 13px;
        line-height: 1.45;
        margin-left:0;
    }

    .callback-note__item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #4f4f4f;
        cursor: pointer;
    }

    .callback-note__item input[type="checkbox"] {
        width: 14px;
        height: 14px;
        margin-top: 2px;
        flex: 0 0 16px;
        accent-color: #bf3d3f;
        cursor: pointer;
        display: inline-block;
        height: unset !important;
    }

    .callback-note__link {
        text-decoration: underline;
        text-underline-offset: 2px;
    }

    @media (max-width: 767px) {
        .callback-note {
            font-size: 12px;
            gap: 8px;
        }
    }
</style>

<div class="callback-note snoska">
    <label class="callback-note__item">
        <input name="privacy_policy" type="checkbox">
        <span><?_e('Я принимаю','rubex');?> <a class="tdu callback-note__link" href="<?php echo get_permalink(19641);?>"><?_e("политику конфиденциальности и обработки персональных данных","rubex");?></a></span>
    </label>
    <label class="callback-note__item">
        <input name="policy_accept" type="checkbox">
        <span><?_e('Я согласен на обработку','rubex');?> <a class="tdu callback-note__link" href="<?php echo get_permalink(23478);?>"><?_e("персональных данных","rubex");?></a></span>
    </label>
</div>
					