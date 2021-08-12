<?php
/*
  * Template name: 1c_work
  * */
  
get_header();
wp_enqueue_style(bootstrap);

?>

<div class='title_block' style='background-image: url(https://aiggroup.ru/wp-content/uploads/2019/06/bg.png)'>
    <div class="wrapper main_block">
        <div class="title_block_inside">
             <h1 class="main_title">
                <?=$product->post_title;?>
             </h1>
             <h5 class="sub_title">
                
             </h5>
         </div>
	</div>
</div>



<style>
	.title{
		width: fit-content;
		margin: 50px auto;

	}
	.row{
		display: flex;

	}
	.col{
		display: flex;
	}


	[advantages] .col:nth-child(2n){
		justify-content: flex-start;
	}
	[advantages] .col:nth-child(2n+1){
		justify-content: flex-end;
	}



	[advantages]  > p{
		margin:30px 0 30px 54px;
		font-size: 1.3em;
		font-weight: bold;
		color: #50525b;

	}


	[advantages] .block {
		width: fit-content;
		background: #f6f7fb;
		padding: 20px;
		margin-bottom: 30px;
		max-width: 90%;


	}

	[advantages] .block .block__title{
		margin-bottom: 20px;
		padding: 0 25px;
		display: flex;
		align-items: center;
		color: #50525b;
		font-weight: bold;
	}

	[advantages] .block .block__title img{
		max-width: 70px;
	}

	[advantages] .block .block__title .block__title_text {
    	margin: 0 0 0 30px;
	}
</style>




<div class="container" advantages>
	<p>5 причин, чтобы выбрать УНФ:</p>
	<div class="row">
		<div class="col">
			<div class="block">
				<div class="block__title">
					<img src="<?=get_template_directory_uri() ?>/css/img/coordinator.svg" alt="" class="block__title_img">
					<span class="block__title_text">Многофункциональность </span></div>
				<div class="block__description">В одной системе пользователь может вести клиентскую базу, учет торговли и закупок, предоставлять услуги и работы, видеть остатки на складе, контролировать денежный поток и считать зарплату. Встроенный CRM-блок поможет менеджерам работать с данными клиентов эффективно – запланировать звонок, встречу, проинформировать, проанализировать сотрудничество.  </div>
			</div>
		</div>
		<div class="col">
			<div class="block">
				<div class="block__title">
					<img src="<?=get_template_directory_uri() ?>/css/img/statistics.svg" alt="" class="block__title_img">
					<span class="block__title_text">Аналитика </span></div>
				<div class="block__description">Сформируйте отчёты по остаткам запасов на складе, ABC/XYZ-анализ продаж по товарам, клиентам и сотрудникам, по финансовому состоянию – остаток, дебиторская и кредиторская задолженность. Отчёты наглядно, в диаграммах и цифрах покажут успех предприятия.</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="block">
				<div class="block__title">
					<img src="<?=get_template_directory_uri() ?>/css/img/growth.svg" alt="" class="block__title_img">
					<span class="block__title_text">Развитие</span></div>
				<div class="block__description">Получайте заказы, общайтесь с клиентами и сотрудниками через Telegram и Вконтакте – все взаимодействия отобразятся в УНФ. А встроенный виртуальный ассистент управления фирмой Даша автоматически изменит состояния заказов, проинформирует коллег об оплате и отгрузке и сообщит клиентам о начислении или списании бонусов. Функции 1С:УНФ совершенствуются в соответствии с развитием информационного общества, с каждым релизом пользователи получают больше возможностей и ресурсов.</div>
			</div>
		</div>
		<div class="col">
			<div class="block">
				<div class="block__title">
					<img src="<?=get_template_directory_uri() ?>/css/img/cake.svg" alt="" class="block__title_img">
					<span class="block__title_text">Простота использования </span></div>
				<div class="block__description">Никаких бухгалтерских проводок, путаницы с бухгалтерским и налоговым учетом – движения документов видны в отчетах системы: что, куда и к чему ведёт. </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="block">
				<div class="block__title">
					<img src="<?=get_template_directory_uri() ?>/css/img/piggybank.svg" alt="" class="block__title_img">
					<span class="block__title_text">Стоимость</span></div>
				<div class="block__description">Стоимость базового продукта – 4600 рублей, входят основные функции, которые позволят структурировать учет на предприятии и автоматизировать множество бизнес-процессов.  </div>
			</div>
		</div>
		<div class="col"></div>
	</div>		

</div>



<style type="text/css">
	
	[take-order] img {
		max-width: 100%;
	}
	[take-order] .wrapper{
		position: relative;
		margin: 30px 0;
	}

	[take-order] a {
	  text-decoration: none;
	  font-weight: 500;
	  position: relative;
	  color: #4A4A4A;
	  display: inline-block;
	  z-index: 1
	}

	[take-order] .btn-1 {
	  background: white;
	  padding: .6em 3em;
	  border: 3px solid #4A90E2;
	  transition: all 300ms ease;
	  box-shadow: 0px 4px 10px 2px rgba(0, 0, 0, 0.2);
	  position: absolute;
      bottom: 0;
      left: 10%;
	}
	[take-order] .btn-1:before {
	  position: absolute;
	  content: "";
	  width: 0%;
	  height: 100%;
	  background: #4A90E2;
	  top: 0;
	  left: 50%;
	  z-index: -1;
	  transition: all 0ms ease;
	}
	[take-order] .btn-1:hover {
	  color: white;
	  box-shadow: none;
	  text-decoration: none;
	}
	[take-order] .btn-1:hover:before {
	  position: absolute;
	  content: "";
	  width: 100%;
	  height: 100%;
	  background: #4A90E2;
	  top: 0;
	  left: 0%;
	  z-index: -1;
	  transition: all 300ms ease;
	}

</style>

<div class="container" take-order>
	<div class="wrapper">
		<img src="<?=get_template_directory_uri() ?>/css/img/take-order.jpg" alt="">
		<div class="button-item-default">
	      <a href="https://1cfresh.com/a/httpextreg/hs/ExternalRegistration/page?promouser=extreg-5321-00000000000000000018&promo=1%C2%A0253" class="btn-1">тест-драйв 30 дней бесплатно</a>
	    </div>
	</div>
</div>





<style>
	[tarifs] > p{
			font-size: 1.3em;
			font-weight: bold;
			color: #50525b;
			margin: 100px 0 30px 0;
		}

	[tarifs] .alignCenter {
	display: flex;
	align-items: center;
	justify-content: center;
	}

	[tarifs] .card {
		font-size: 20px;
		text-align: center;
	display: flex;
	align-items: center;
	flex-direction: column;
	color: #50525a;
	background: #f9fafc;
	padding-bottom: 25px;
	}
	[tarifs] .card__title {
		width: 100%;
	background: #ffdd00;
	min-height: 100px;
	flex-direction: column;
	}
	[tarifs] .card__title .card__title_sub {
	font-size: 0.7em;
	}
	[tarifs] .card__time {
		width: 100%;
	min-height: 70px;
	background: #ed1c24;
	color: white;
	text-align: center;
	}
	[tarifs] .card__info_cost{
		font-size: 1.65em;
		color:#ed1c24;
	}	
	[tarifs] .card__info {
	font-size: .8em;
	padding: 20px;
	height: 465px;
	padding-top: 25px;
	flex-direction: column;
	justify-content: flex-start;
	}
	[tarifs] .card__info p{
		margin-bottom: 30px;
	}

	[tarifs] .card__info_dop {
	color: #ed1c24;
	display: block;
	width: 100%;
	}
	[tarifs] .card__button {
		border: 1px solid #ed1c24;
		border-radius: 34px;
		padding: 10px;
		font-size: .85em;
		color: #ed1c24;
		width: 170px;
		font-weight: bold;
		cursor: pointer;
	}

	[tarifs] .card__time_gray {
		background: #6d6d6d;
		color: white;
	}
	.next_is_empty{
		margin-bottom: calc(30px + 1.5em) !important;
	}
</style>

<div class="container" tarifs>
	<p align='center'>Веберите свою версию 1С:Управление нашей фирмой:</p>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card__title alignCenter"><span>Облачная версия</span> <span class="card__title_sub">(работа через интернет)</span></div>
				<div class="card__time alignCenter">30 дней<br>БЕСПЛАТНО</div>
				<div class="card__info alignCenter">
					<p>2 рабочих места <br><span class="card__info_dop">+можно добавлять</span></p>
					<p>Оплата помесячно</p>
					<p><span class="card__info_cost">от 1303 руб/мес</span></p>
					<p><span class="card__info_dop">Скидка при непрерывном продлении</span></p>
				</div>
				<div class="card__button">Начать бесплатно</div>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card__title alignCenter"><span>"Локальная версия"</span> <span class="card__title_sub">(программа устанавливается на компьютер)</span></div>
				<div class="card__time card__time_gray alignCenter">Базовая версия</div>
				<div class="card__info alignCenter">
					<p class="next_is_empty">1 рабочее место <br><span class="card__info_dop"></span></p>
					<p>Оплата единоразовая</p>
					<p><span class="card__info_cost">5400 руб</span></p>
					<p>Версия не предполагает добавления рабочих мест</p>
					<p><span class="card__info_dop">Бесплатное обновление</span></p>
				</div>
				<div class="card__button">Купить</div>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card__title alignCenter"><span>"Локальная версия"</span> <span class="card__title_sub">(программа устанавливается на компьютер)</span></div>
				<div class="card__time card__time_gray alignCenter">Профессиональная версия</div>
				<div class="card__info alignCenter">
					<p>1 рабочее место <br><span class="card__info_dop">+можно добавлять</span></p>
					<p>Оплата единоразовая</p>
					<p><span class="card__info_cost">17 400 руб</span></p>
					<p><span class="card__info_dop">+6 300 руб</span>за каждое дополнительное рабочее место + настройка</p>
					<p><span class="card__info_dop">Обслуживание по договору 1С:ИТС*</span></p>
				</div>
				<div class="card__button">Купить</div>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card__title alignCenter"><span>"Локальная версия"</span> <span class="card__title_sub">(программа устанавливается на компьютер)</span></div>
				<div class="card__time card__time_gray alignCenter">Пакетная версия</div>
				<div class="card__info alignCenter">
					<p>5 рабочих мест <br><span class="card__info_dop">+можно добавлять</span></p>
					<p>Оплата единоразовая</p>
					<p><span class="card__info_cost">31 800 руб</span></p>
					<p><span class="card__info_dop">+6 300 руб</span>за каждое дополнительное рабочее место + настройка</p>
					<p><span class="card__info_dop">Обслуживание по договору 1С:ИТС*</span></p>
				</div>
				<div class="card__button">Купить</div>
			</div>
		</div>
	</div>
</div>

<style>
	[capabilities] > p{
			font-size: 1.3em;
			font-weight: bold;
			color: #50525b;
			margin: 100px 0 30px 0;
		}
	[capabilities] .row{
		display: flex;
		flex-wrap: nowrap;

	}
	.col{
		display: flex;
	}


	[capabilities] .block {
		width: 100%;
		background: #f6f7fb;
		margin-bottom: 30px;
		box-shadow: 1px 1px 4px #d5d7da;
		padding: 25px;

	}

	[capabilities] .block .block__title{
	
		padding: 20px 25px;
		display: flex;
		align-items: center;
		color: #50525b;
		font-weight: bold;
	}
	[capabilities] .block__description{
		padding: 0 20px 20px 20px;
	}

	[capabilities] .block .block__title img{
		max-width: 70px;
	}

	[capabilities] .block .block__title .block__title_text {
    	margin: 0 0 0 30px;
	}
</style>

<div class="container" capabilities>
	
	<p align='center'>Возможности УНФ</p>
	<p  style='margin:0 0 30px 0'>С помощью УНФ компания сможет:</p>
	<div class="row">
		<div class="col">
			<div class="block">
			Понимать, как идёт торговля и выполняются работы. Фиксируйте в программе, что, сколько и кому реализовали, так вы сможете понять, какие контрагенты выгодны, какие работы и продажи в ходу. Также программа позволяет контролировать выполнение заказа поэтапно: когда произошло общение с клиентом, как скоро оформили заказ, отгрузили и что с оплатой.
			</div>
		</div>

		<div class="col">
			<div class="block">
				Вести учёт финансов в одной системе. В 1С:УНФ поддерживаются кассовые и эквайринговые операции, автоматическая загрузка/выгрузка банковских выписок. Розничные магазины подключают кассовые аппараты, эквайринговые терминалы к программе и видят оплату в режиме реального времени, как и налоговая.
			</div>
		</div>

		<div class="col">
			<div class="block">
			Отчитываться в контролирующие органы. Продукт поддерживает формирование и сдачу электронной отчётности для индивидуальных предпринимателей прямо из программы. Юридические лица также найдут для себя вывод полезной регламентированной информации – отчёты в статистику и т.д.
				</div>
			</div>
		
	</div>
	<div class="row">
		<div class="col">
			<div class="block">
			Иметь доступ к данным везде. Приложение можно загрузить в облако, в таком случае, 1С:УНФ будет доступна пользователям 24/7 при наличии смартфона/планшета и интернета. Так, курьер компании сможет принять оплату, находясь на адресе у заказчика и сразу отразить факт доставки и продажи.
			</div>
		</div>

		<div class="col">
			<div class="block">
			Анализировать и продуктивно работать с клиентской базой. УНФ активно взаимодействует с популярными мессенджерами: telegram и WhatsApp, к ней подключаются google карты. Так компания сможет получать новые заказы из сообщений, а на картах увидит расположение заказчика и достоверно рассчитает маршрут доставки. Также в программе фиксируются звонки, встречи и другие взаимодействия с контрагентами.
			</div>
		</div>
	</div>

</div>


<style>
	[reports] > p{
			font-size: 1.3em;
			font-weight: bold;
			color: #50525b;
			margin: 100px 0 30px 0;
		}


	[reports] .col img{
		max-width: 100%;
	}
	.preview-pdf{
		background: transparent;
		padding: 0;
	}


	[reports] img {
    	-webkit-filter: brightness(100%);
	
	}

	[reports] img:hover {
		-webkit-filter: brightness(70%);
		-webkit-transition: all .3s ease;
		-moz-transition: all .3s ease;
		-o-transition: all .3s ease;
		-ms-transition: all .3s ease;
		transition: all .3s ease;
	}

	[reports] .overlay:before {
		content: '\f065';
		position: absolute;
		font-family: FontAwesome;
		font-size: 35px;
		top: 50%;
		left: 50%;
		-moz-transform: translate(-50%,-50%);
		-ms-transform: translate(-50%,-50%);
		-o-transform: translate(-50%,-50%);
		-webkit-transform: translate(-50%,-50%);
		transform: translate(-50%,-50%);
		opacity: 0;
	}

	[reports] .overlay{
		position: absolute;
		left: 0;
		top: 0;
		right: 0;
		bottom: 0;
		opacity: 0;
		-moz-transition: .3s all ease;
		-webkit-transition: .3s all ease;
		-o-transition: .3s all ease;
		transition: .3s all ease;
		color: #fff;
		background: 0 0;
	}
}
</style>

<div class="container" reports>
	<p>
		Отзывы наших клиентов о проектах внедрения УНФ
	</p>
	<div class="row">
		<div class="col">
			
			<button type="button" class="preview-pdf" data-toggle="modal" data-target="#dart">
				<div class="overlay"></div>
				<img src="https://aiggroup.ru/wp-content/uploads/2020/reports/dart.jpg" alt="">
			</button>
		</div>
		<div class="col">
			
			<button type="button" class="preview-pdf" data-toggle="modal" data-target="#camni">
				<div class="overlay"></div>
				<img src="https://aiggroup.ru/wp-content/uploads/2020/reports/camni.jpg" alt="">
			</button>
		</div>
		<div class="col">
			
			<button type="button" class="preview-pdf" data-toggle="modal" data-target="#multiform">
				<div class="overlay"></div>
				<img src="https://aiggroup.ru/wp-content/uploads/2020/reports/multiform.jpg" alt="">
			</button>
		</div>
	</div>
</div>
	
  





<!-- Modals of PDF -->
  <div class="modal fade bd-example-modal-lg" id="dart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
			<iframe src="https://aiggroup.ru/wp-content/uploads/2020/reports/dart.pdf" width="100%" height=>
			</iframe>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
		</div>
	  </div>
	</div>
  </div>

	<div class="modal fade bd-example-modal-lg" id="camni" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<iframe src="https://aiggroup.ru/wp-content/uploads/2020/reports/camni.pdf" width="100%" height=>
				</iframe>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
			</div>
		  </div>
		</div>
	  </div>
	  
	  <div class="modal fade bd-example-modal-lg" id="multiform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<iframe src="https://aiggroup.ru/wp-content/uploads/2020/reports/multiform.pdf" width="100%" height=>
				</iframe>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
			</div>
		  </div>
		</div>
	  </div>
<!-- /Modals of PDF -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<?php get_footer();