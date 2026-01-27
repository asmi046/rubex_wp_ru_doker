<?php
/*
* Template Name: Испытания шламовых рукавов
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		  	<div class="container">
                    <?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>

                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>

                    <div class="isp_cases">
                        <div class="isp_case">
                            <div class="left">
                                <img src="<?bloginfo('template_url')?>/img/isp/invest_r_1.jpg" alt="">
                                <div class="shadow"></div> 
                                <div class="inner_text">
                                    <h2>ООО «ИНВЕСТ РАЗВИТИЕ» ОТДЕЛЕНИЕ ИЗМЕЛЬЧЕНИЯ</h2>
                                    <p>Гидроциклон CAVEX 650 CVX</p>   
                                    <p>Период проведения испытаний: 02.09.2021-05.09.2022</p>   
                                </div>
                            </div>

                            <div class="right">
                                <div class="photo">
                                    <img src="<?bloginfo('template_url')?>/img/isp/invest_r_2.jpg" alt="">
                                </div>
                                <div class="inner_text">
                                    <h3>ЗАКЛЮЧЕНИЕ КОМИССИИ</h3>
                                    <p>Товар соответствует по эксплуатационной стойкости и эффективности использования применяемым трубопроводам слива и признаются годными к эксплуатации в условиях обогатительной фабрики ООО «Инвест Развитие»</p>
                                    
                                    <strong>Испытуемые изделия:</strong>
                                    <ul>
                                        <li>отвод ОШ 300.008.90 (ОШН-Ф-300-90-3-Ш-У) – 1 шт.</li>
                                        <li>отвод ОШ 300.002.90 (ОШН-Ф-300-3-Ш-У) – 1 шт.</li>
                                        <li>переход шламовый ПШ 300.351.001.006 (ПШН-Ф-300-351-3-Ш-У) – 1 шт.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="isp_case">
                            <div class="left">
                                <img src="<?bloginfo('template_url')?>/img/isp/mih_gok_1.jpg" alt="">
                                <div class="shadow"></div> 
                                <div class="inner_text">
                                    <h2>ОФ АО «Михайловский ГОК им. А.В.Варичева»</h2>
                                    <p>Магнитный сепаратор типа ПМБ 120/300</p>   
                                    <p>Период проведения испытаний: 13.07.2020-13.07.2021</p>   
                                </div>
                            </div>

                            <div class="right">
                                <div class="photo">
                                    <img src="<?bloginfo('template_url')?>/img/isp/mih_gok_2.jpg" alt="">
                                </div>
                                <div class="inner_text">
                                    <h3>ЗАКЛЮЧЕНИЕ КОМИССИИ</h3>
                                    <p>Товар прошел ОПИ в соответствии с утвержденной Программой испытаний. Шламовые рукава и отводы производства ОАО «Курскрезинотехника» могут рассматриваться к поставке в АО «Михайловский ГОК им. А.В.Варичева» с целью эксплуатации в производственных процессах.</p>
                                    <strong>Испытуемые изделия:</strong>
                                    <ul>
                                        <li>шламовый рукав РШ 402.002.046 (РШН-Ф-402-10-Ш-У) – 1шт.</li>
                                        <li>шламовый рукав РШ 203.002.040 (РШ-203-Ш-У) – 1шт.</li>
                                        <li>шламовый рукав РШ 203.002.030 (РШ-203-Ш-У) – 1шт.</li>
                                        <li>отвод ОШ 402.002.90 (ОШН-Ф-402-90-10Ш-У)- 1шт.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="isp_case">
                            <div class="left">
                                <img src="<?bloginfo('template_url')?>/img/isp/kama_ruda_1.jpg" alt="">
                                <div class="shadow"></div> 
                                <div class="inner_text">
                                    <h2>АО «КОМБИНАТ КМАруда»</h2>
                                    <p>Линия трубопровода УС и ТХ ДОФ АО «Комбинат КМАруда»</p>   
                                    <p>Период проведения испытаний: 28.11.2020-28.07.2021</p>   
                                </div>
                            </div>

                            <div class="right">
                                <div class="photo">
                                    <img src="<?bloginfo('template_url')?>/img/isp/kama_ruda_2.jpg" alt="">
                                </div>
                                <div class="inner_text">
                                    <h3>ЗАКЛЮЧЕНИЕ КОМИССИИ</h3>
                                    <p>Товар прошел ОПИ в соответствии с утвержденной Программой и Методикой испытаний. Отвод подтвердил свою надежность и высокое качество в реальных условиях эксплуатации на основании чего шламовые рукава, отводы и вставки ОАО «Курскрезинотехника» рекомендуются к поставке в АО «КМАруда» с целью эксплуатации в производственных подразделениях комбината.</p>
                                    <strong>Испытуемые изделия:</strong>
                                    <ul>
                                        <li>отвод ОШН-Ф- 402-90-10-Ш-У (ОШ 402.003.90)- 1шт.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="isp_case">
                            <div class="left">
                                <img src="<?bloginfo('template_url')?>/img/isp/mkk_1.jpg" alt="">
                                <div class="shadow"></div> 
                                <div class="inner_text">
                                    <h2>ПАО «Магнитогорский металлургический комбинат»</h2>
                                    <p>Линия шламопровода 5 группы НФС ГОЦ СЦ цеха водоснабжения</p>   
                                    <p>Период проведения испытаний: 07.04.2021-28.07.2021</p>   
                                </div>
                            </div>

                            <div class="right">
                                <div class="photo">
                                    <img src="<?bloginfo('template_url')?>/img/isp/mkk_2.jpg" alt="">
                                </div>
                                <div class="inner_text">
                                    <h3>ЗАКЛЮЧЕНИЕ КОМИССИИ</h3>
                                    <p>Товар прошел ОПИ в соответствии с утвержденной Программой и Методикой испытаний. Шламовый рукав подтвердил свою надежность и высокое качество в реальных условиях эксплуатации на основании чего шламовые рукава, отводы и вставки ОАО «Курскрезинотехника» рекомендуются к поставке в ПАО «ММК» с целью эксплуатации в производственных подразделениях комбината.</p>
                                    <strong>Испытуемые изделия:</strong>
                                    <ul>
                                        <li>шламовый рукав РШ 159.004.060 (РШН-Ф-159-10-Ш-У) – 1шт.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="isp_case">
                            <div class="left">
                                <img src="<?bloginfo('template_url')?>/img/isp/olkon_1.jpg" alt="">
                                <div class="shadow"></div> 
                                <div class="inner_text">
                                    <h2>АО «ОЛКОН»</h2>
                                    <p>Линия трубопровода питания основного сепаратора №30 технологический секции №8</p>   
                                    <p>Период проведения испытаний: 29.08.2019-03.03.2020</p>   
                                </div>
                            </div>

                            <div class="right">
                                <div class="photo">
                                    <img src="<?bloginfo('template_url')?>/img/isp/olkon_2.jpg" alt="">
                                </div>
                                <div class="inner_text">
                                    <h3>ЗАКЛЮЧЕНИЕ КОМИССИИ</h3>
                                    <p>Товар прошел приемочные (эксплуатационные) испытания в соответствии с утвержденной Программой и Методикой испытаний. Шламовый рукав подтвердил свою надежность и высокое качество в реальных условиях эксплуатации на основании чего шламовые рукава, отводы и вставки ОАО «Курскрезинотехника» рекомендуются к поставке в АО «Олкон» с целью эксплуатации в производственных подразделениях. Рекомендовать шламовые рукава производства ОАО «Курскрезинотехника» для постановки на серийное производство.</p>
                                    <strong>Испытуемые изделия:</strong>
                                    <ul>
                                        <li>шламовый рукав РШ 203.001.100 (РШН-Ф-203-6-Ш-У) – 1шт.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
