<?php
/*
* Template Name: Магазин РТИ - Стартовая с Vue
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
				</div>
			<div class="container">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );
				?>
				
				
					<div class = "old_picture_blk" id = "mag_login_form">
						<div v-show = "showErrMessage" class = 'shopMsg shopMsgErr'>
							<h2>{{errMessage}}</h2>
							<p>Сервис RubEx Price доступен только зарегистрированным пользователям.</p>
						</div>
						
						<div class = "picture" style = "background-image: url(<?php echo get_template_directory_uri(); ?>/img/magazin/start.jpg)"></div>
						<div class = "form">
							<form class="RMarketLoginForm magazinForm" name="RPformL" action="" method="post">
								<!-- <h2 class="RMarketLoginFormBoxH">Заполните форму</h2> -->
								<div class = "form-block">
									<label for="RPma" class = "blaclLabel">E-mail</label>
									<input v-model = "login" @focus.prevent = "loginIncorrect=false" :class = "{inputIncorrect:loginIncorrect}" type="text" id="RPma" name="RPma" placeholder="">
								</div>
								
								<div class = "form-block">
									<label for="RPPs" class = "blaclLabel">Пароль</label>
									<input v-model = "password" @focus.prevent = "passwordIncorrect=false" :class = "{inputIncorrect:passwordIncorrect}" type="password" id="RPPs" name="RPPs" placeholder="">
								</div>
								
								<div class="formButtonLine buttonFullWidth">
									<input type="button" @click.prevent = "getLogin" name="submit" id="submit" class="trueButton" value="Вход">
									<a class="trueButton" href="<? echo get_the_permalink(20722); ?>" class="RMremPas">Регистрация</a>
									<a class="trueButton grayButton" href="<? echo get_the_permalink(20715); ?>" class="RMremPas">Напомнить пароль</a>
								</div>
								
							</form>
						</div>
					</div>

				<?
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; 
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<script>
		var loginForm = new Vue({
			el: "#mag_login_form",
			data: {
				login: '',
				password: '',
				loginIncorrect:false,
				passwordIncorrect:false,
				showErrMessage:false,
				errMessage:"Вы не авторизованы!",
				nextStep: "<? echo get_permalink(20717);?>"
			},

			mounted: function() {
			},

			methods: {
				getLogin() {
					this.showErrMessage = false,

					axios.get("https://rubexgroup.ru/wp-json/rubexprice/v2/autorization",{
							params: {
								login:this.login,
								password:this.password,
							}
						})
						.then((response) => {
							document.cookie = "RPlogin2="+JSON.stringify(response.data.RPlogin2)+";  path=/; domain=rubexgroup.ru"
							document.cookie = "RPdefSkl="+JSON.stringify(response.data.RPdefSkl)+";  path=/; domain=rubexgroup.ru"
							document.cookie = "selContragent="+JSON.stringify(response.data.selContragent)+";  path=/; domain=rubexgroup.ru"
							window.location.href = this.nextStep;
						})
						.catch((error) => {
							this.showErrMessage = true;
							this.errMessage = error.response.data.message;
							console.log(this.showErrMessage);
							console.log(error.response.data.message);
						})
				}
			}


		});
	</script>

<?php
get_footer();

