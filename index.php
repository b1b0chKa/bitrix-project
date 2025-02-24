<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
?>
<main>
		
	<article class="include">
	<?php
	$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"custom_include",
		[
			"AREA_FILE_SHOW" => "file",
			"PATH" => "include_area/index1_inc.php",
		],
	);
	$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"custom_include",
		[
			"AREA_FILE_SHOW" => "file",
			"PATH" => "include_area/index2_inc.php",
		],
	);
	$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"custom_include",
		[
			"AREA_FILE_SHOW" => "file",
			"PATH" => "include_area/index3_inc.php",
		],
	);
	?>
	</article>


	<section class="miniNews">
		<?php
		$APPLICATION->IncludeComponent(
			'my_components:universal',
			'main_page',
			[
				'FILTER' => [
					'IBLOCK_ID' => '4',
					'ACTIVE' => 'Y',
				],
				'SELECTT' => [
					'ID',
					'PREVIEW_TEXT',
					'NAME',
					'CODE',
					'IBLOCK_ID',
					'ACTIVE'
				],
				'PAGE_SIZE' => 3,
				'ORDER' => ['TIMESTAMP_X' => 'DESC'],
			]
		);
		?>
	</section>


	<div class="form">

		<form action="local/forms/process_form.php" method="post" id="my_form">
			<h5 class="textInForm">Форма обратной связи</h5>
			<input type="text" name="name" placeholder="Введите имя" class="forName">
			<p id="nameError" class="error-message"></p>

			<input type="tel" class="forPhone" name="phoneNumber" id="phone" placeholder="+7(___)___-__-__" pattern="^(?[0-9]{3})?(s+)?[0-9]{3}-?[0-9]{2}-?[0-9]{2}$">
			<p id="phoneError" class="error-message"></p>

			<input type="submit" value="Отправить" name="submit" class="button">
		</form>
	</div>
	<script>
	document.getElementById("my_form").addEventListener("submit", function(event)
	{
		event.preventDefault();

		let form = this;
		let formData = new FormData(form);

		fetch(form.action,
		{
			method: "POST",
			body: formData
		})
		.then(response => response.json())
		.then(data =>
		{
			if (data.success)
			{
				alert("Форма успешно отправлена!");
				form.reset();
			}
			else
			{
				let errorMessage = "";
				if (data.errors.name)
				{
					errorMessage += data.errors.name + "\n";
				}
				if (data.errors.phoneNumber)
				{
					errorMessage += data.errors.phoneNumber + "\n";
				}

				alert(errorMessage);
			}
		})
		.catch(error => console.error("Ошибка:", error));
	});
	</script>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php";

