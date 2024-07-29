<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<h1>UNDANGAN RAPAT</h1>
Assalamualaikum, Wr. wb <br>
Dengan diadakannya rapat terkait {{ucwords( $data['judulRapat'] )}} , <br> kami mengundang Bapak/Ibu dalam kegiatan rapat tersebut, adapun detail rapat sebagai berikut : <br> <br>
<table style="text-align: left;">
	<tr class="bg-primary text-white">
		<th colspan="2">
				DETAIL RAPAT :
		</th>
	</tr>
	<tr>
		<th class="float-left">Judul Rapat </th>
		<td>: {{ucwords( $data['judulRapat'] )}}</td>
	</tr>

	<tr>
		<th class="float-left">Tanggal Mulai Rapat </th>
		<td>: {{ $data['tanggal'] }} </td>
	</tr>

	<tr>
		<th class="float-left">Waktu Rapat </th>
		<td>: {{ $data['mulai'] }} - {{ $data['selesai'] }}</td>
	</tr>

	<tr>
		<th class="float-left">Lokasi Rapat </th>
		<td>: {{ucwords( $data['ruangan']) }}</td>
	</tr>
</table>
<br>

Demikianlah undangan ini kami sampaikan, harap untuk dapat menghadiri rapat tersebut. Terima kasih atas perhatiannya.<br>
{{Carbon\Carbon::now()}}
{{ config('app.name') }}
