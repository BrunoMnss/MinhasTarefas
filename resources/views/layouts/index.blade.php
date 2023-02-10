<link href="{{'css/style.css'}}" rel="stylesheet">

<div class="card">

	<div class="botao mb-3 mt-5">
	<div class="d-grid gap-2">
			<a class="btn btn-dark" type="button" href="">Adicionar Tarefas</a>
	</div>
	</div>

	<div class="container">
		<div class="calendar">
			<div class="year-header">
				<span class="left-button fa fa-chevron-left" id="prev"> </span>
				<span class="year" id="label"></span>
				<span class="right-button fa fa-chevron-right" id="next"> </span>
			</div>

			<table class="months-table">
				<tbody>
					<tr class="months-row">
						<td class="month">Jan</td>
						<td class="month">Fev</td>
						<td class="month">Mar</td>
						<td class="month">Abr</td>
						<td class="month">Mai</td>
						<td class="month">Jun</td>
						<td class="month">Jul</td>
						<td class="month">Ago</td>
						<td class="month">Set</td>
						<td class="month">Out</td>
						<td class="month">Nov</td>
						<td class="month">Dez</td>
					</tr>
				</tbody>
			</table>

			<table class="days-table">
				<td class="day">Segunda</td>
				<td class="day">Terça</td>
				<td class="day">Quarta</td>
				<td class="day">Quinta</td>
				<td class="day">Sexta</td>
				<td class="day">Sabado</td>
				<td class="day">Domingo</td>
			</table>

			<div class="frame">
				<table class="dates-table">
					<tbody class="tbody">
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>





<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>