<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>

<div id="container">
	<h1>{heading}</h1>

	<div id="body">
        <p>Это вид в модулях. Посмотреть <a href="/welcome/hmvc">ВИД В КОРНЕ ТЕМ</a> | <a href="/welcome">ВИД В МОДУЛЯХ</a> | <a href="/admin">ВИД В АДМИНКЕ</a> | <a href="/welcome/parse">ВИД В ТЕМАХ</a></p>
        <p>Автор <a href="{url}" title="{name}" target="_blank">{compani}</a></p>
        
        <p>default_controller срабатывающий призагрузке прописан в файле:</p>
		<code>system/apps/routes.php</code>

		<p>Контроллер обрабатывающий этот вывод:</p>
		<code>modules/welcome/controllers/Welcome.php</code>

		<p>Виды размещены:</p>
		<code>
        themes/acme/welcome_message_header.tpl <br />
        themes/acme/welcome_message_tpl.tpl
        </code>

	</div>

	<p class="footer">Страница сгенерирорана за <strong>{elapsed_time}</strong> секунд. <?php echo  (ENVIRONMENT === 'development') ?  'Версия CodeIgniter <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>