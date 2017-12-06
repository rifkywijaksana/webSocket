<div id="myID" style="width: 75%; height: 400px"></div>

<script>
		//Define websocket server
		var Server;
		Server = new FancyWebSocket('ws://127.0.0.1:9300');
		Server.bind('message', function( payload ) {
			switch (payload) {
				case 'grid':
					myGrid.clearAndLoad("grid.php");
					dhtmlx.message('Data Changed');
					break;
			}
		});

		Server.connect();

		//Buat Layout untuk menempatkan Grid dan Form
		var myLayout = new dhtmlXLayoutObject({
			parent: "myID",
			pattern: "1C", //pola kiri kanan
			cells: [
				{id: "a", text: "Grid"}
			]
		});

		//Tempatkan Grid pada myLayout a
		var myGrid = myLayout.cells("a").attachGrid();
		myGrid.setHeader("temperatur,rpm,pengapian,tps,02_sensor,volt_battere,kd_kesalahan");
		myGrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro");
		myGrid.attachHeader("#text_filter,#text_filter,#text_filter,#text_filter,#text_filter,#text_filter,#text_filter,#text_filter");
		myGrid.init();

		myGrid.load("grid.php"); //memuat data dari database ke dalam Grid

		//Event saat salah satu baris pada grid diklik
		myGrid.attachEvent("onRowSelect", function(id) {
			myForm.load("form.php?id="+myGrid.getSelectedRowId());
		});

		

	</script>
<?php
$connection = mysqli_connect('localhost','root','','log_ecu');
   /*
   $temp       = $_POST['temp'];
   $rpm        = $_POST['rpm'];
   $spark      = $_POST['spark'];
   $tps        = $_POST['tps'];
   $oksigen    = $_POST['oksigen'];
   $v_battere  = $_POST['v_battere'];
   $kd_fail    = $_POST['kd_fail'];
   */

   $temp       = 12;
   $rpm        = 15;
   $spark      = 100;
   $tps        = 50;
   $oksigen    = 50;
   $v_battere  = 50;
   $kd_fail    = '0';
$query="INSERT INTO tb_sensor (temperatur,rpm,pengapian,tps,02_sensor,volt_battere,kd_kesalahan)
VALUES ($temp,$rpm,$spark,$tps,$oksigen,$v_battere,'$kd_fail')";
$insert = mysqli_query($connection,$query) or die(mysqli_error($connection));
?>