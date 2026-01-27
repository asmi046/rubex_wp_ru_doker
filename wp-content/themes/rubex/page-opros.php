<?php

/*
* Template Name: Опрос - 22.06.2022
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		  	<div class="container">
                <?php
                while ( have_posts() ) :
                    the_post();

                    the_content();

                endwhile; // End of the loop.
                ?>
                <?php include "opros-contetn.php"; ?>
                <?php 
                    // if (isset($_REQUEST['cid'])) { 
                    if (true) { 
                ?>
                <form id="oprosForm" action="">
                    
                    <input id="companyid" type="hidden" value="<?php echo $_REQUEST['cid']; ?>">
                    <input id="opr_name" type="hidden" value="<?php echo $oprosInfo['name']; ?>">
                    
                    <?php
                        foreach ($opros as $key => $item) {
                    ?>
                        <div id="<?php echo $key ?>" class=" <?php echo (!$item['enabled'])?"opr_blk_disabled":"" ?> opros_q" data-qtype="<? echo $item['type']?>" >
                            <div class="formHead"><?php echo $item['text'] ?> <?php if ($item['require']) {?> <span class="color-red">*</span><?php }?>
                        </div>
                            <p class="sub_comment"><?php echo $item['comment'] ?></p>
                        
                            <div class="otv_blk">
                                <?php 
                                    $q_index = 0;
                                    foreach ($item['variant'] as $q) {
                                        
                                        if ($item['type'] === 'counter')
                                            get_template_part('template-parts/opros/number', 'q', $args = ['key' => $key, 'q_index' => $q_index, 'q' => $q, 'require' => $item['require']]);
                                        
                                        if ($item['type'] === 'check')
                                            get_template_part('template-parts/opros/check', 'q', $args = ['key' => $key, 'q_index' => $q_index, 'q' => $q, 'require' => $item['require']]);
                                        
                                        if ($item['type'] === 'radio')
                                            get_template_part('template-parts/opros/radio', 'q', $args = ['key' => $key, 'q_index' => $q_index, 'q' => $q, 'require' => $item['require']]);
                                        
                                        if ($item['type'] === 'text')
                                            get_template_part('template-parts/opros/text', 'q', $args = ['key' => $key, 'q_index' => $q_index, 'q' => $q, 'require' => $item['require'] ]);
                                        
                                        if ($item['type'] === 'yesno')
                                            get_template_part('template-parts/opros/yesno', 'q', $args = ['key' => $key, 'q_index' => $q_index, 'q' => $q, 'require' => $item['require']]);
                                        
                                        $q_index++;
                                    }   
                                    
                                    
                                    if ($item['other'])
                                    get_template_part('template-parts/opros/other', 'q', $args = ['key' => $key, 'q_index' => $q_index, 'q' => $q, 'require' => $item['require']]);
                                ?>
                            </div>
                            

                        </div>
                    <?
                        }                    
                    ?>
                    <br>
                    <button type="submit" class="trueButton" id="oprosSubmit">Отправить</button>
                    <p class="note-form">Нажимая на кнопку "Отправить", вы соглашаетесь с условиями <a class="color-red" href="https://rubexgroup.ru/politika-konfidenczialnosti-i-obrabotki-personalnyh-dannyh/" target="_blank">обработки персональных данных</a>.</p>

                </form>

                <?php 
                    }
                    else 
                        echo "Идентификация на пройдена";
                ?>
                
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
