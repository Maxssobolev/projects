<?php
/*
  * Template name: 1c_work
  * */
  
get_header();
wp_enqueue_style(bootstrap);

?>

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


	.col:nth-child(2n){
		justify-content: flex-start;
	}
	.col:nth-child(2n+1){
		justify-content: flex-end;
	}



	.container > p{
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


<div class="title">
    <h2><?=$product->post_title;?></h2>
</div>


<div class="container" advantages>
	<p>5 причин выбрать УНФ для вашего бизнеса:</p>
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
	.wrapper{
		position: relative;
	}

</style>

<div class="container" take-order>
	<div class="wrapper">
		<img src="<?=get_template_directory_uri() ?>/css/img/take-order.jpg" alt="">

	</div>
	
</div>


<?php get_footer();