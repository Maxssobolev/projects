<div id="pop_up_block">
<div class="fon_pop_up"></div>
<div class="pop_up">

<form action="" method="post" id='callBackForm'>
<h2>Заказать обратный звонок</h2>
<div class="close" id="closePopUp"></div>
    <input type="text" name='phone_callback' placeholder="Телефон, формат: 7-911-111-11-11"  data-inputmask='"mask": "9-999-999-99-99"' data-mask>
    <input type="text" placeholder="ФИО" name='fio_callback'>
    <input type="text" placeholder="ИНН" name='inn_callback'>
	
	<h4>Вид обращения</h4>
	<select>
	  <option>Консультация</option>
	  <option>Аренда</option>
	  <option>Документооборот</option>
	  <option>Отчётность</option>
	</select>
	<input type="submit" value="Заказать" class='btn_orange' id='get_call_back'>
	<input type="hidden" name="recaptcha-site-key" value="<?=RECAPTCHA_SITE_KEY?>">  
</form>


</div>
</div>