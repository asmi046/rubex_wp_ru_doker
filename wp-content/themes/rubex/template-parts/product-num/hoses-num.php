<?php
	$hoses_nam_price = [
		"rukava-dlya-svarki-gost-9356-75-klassy-i-ii-iii" => [
			["sku" => "Rbx00000704", "nam" => "I-6,3-0,63 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"],
			["sku" => "Rbx00000705", "nam" => "I-8-0,63 ГОСТ 9356-75", "producer" => "СЗРТ"],
			["sku" => "Rbx00000711", "nam" => "I-9-0,63 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"],
			["sku" => "Rbx00000698", "nam" => "I-10-0,63 ГОСТ 9356-75", "producer" => "СЗРТ"],
			["sku" => "Rbx00000699", "nam" => "I-12-0,63 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"],
			["sku" => "Rbx00000714", "nam" => "II-6,3-0,63 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"],
			["sku" => "Rbx00000715", "nam" => "II-9-0,63 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"],
			["sku" => "Rbx00000712", "nam" => "II-12-0,63 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"],
			["sku" => "Rbx00000726", "nam" => "III-6,3-2,0 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"],
			["sku" => "Rbx00000729", "nam" => "III-8-2,0 ГОСТ 9356-75", "producer" => "СЗРТ"],
			["sku" => "Rbx00000733", "nam" => "III-9-2,0 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"],
			["sku" => "Rbx00000716", "nam" => "III-10-2,0 ГОСТ 9356-75", "producer" => "СЗРТ"],
			["sku" => "Rbx00000721", "nam" => "III-12-2,0 ГОСТ 9356-75", "producer" => "КРТ / СЗРТ"]
		],
		
		"rukava-dlya-svarki-tu-2554-282-00149245-2003" => [
			["sku" => "Rbx00002723", "nam" => "I-6,3 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002724", "nam" => "I-9 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002721", "nam" => "I-12 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002722", "nam" => "I-16 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002727", "nam" => "II-6,3 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002728", "nam" => "II-9 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002725", "nam" => "II-12 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002732", "nam" => "III-6,3 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002733", "nam" => "III-9 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002729", "nam" => "III-12 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002730", "nam" => "III-16 ТУ 2554-282-00149245-2003", "producer" => "КРТ"],
			["sku" => "Rbx00002731", "nam" => "III-18 ТУ 2554-282-00149245-2003", "producer" => "КРТ"]
		],
	];
?>

<?
global $post;
$post_slug = $post->post_name;

if (isset($hoses_nam_price[$post_slug])) {
?>

	<div class="num_price_table">
		<h2 class="product-uppsells__title">Номенклатура продукции</h2>
		<div class="product-main__table">
			<table>
			<tr class="thead-inits">
				<th>Изображение</th>
				<th>Номенклатура</th>
				<th>Артикул</th>
				<th>Производитель</th>
			</tr>
			<?
				
				foreach ($hoses_nam_price[$post_slug] as $item) {
			?>
				<tr>
					<td class="img_td"><img src="<? echo $args['img'] ?>" title="Промышленный рукав RubEx - <? echo $item['nam'] ?>" alt="Промышленный рукав RubEx - <? echo $item['nam'] ?>"></td>
					<td><? echo $item['nam'] ?></td>
					<td><? echo $item['sku'] ?></td>
					<td><? echo $item['producer'] ?></td>
				</tr>
			<?
				}
			?>
			</table>
		</div>
		
	</div>
<?
}
?>