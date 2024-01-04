<?php 
// CORE --------------------------------------------
// delete file
if (! function_exists('deletefile')) {
    function deletefile($lokasi)
    {
        if (!is_dir($lokasi)) {
            if (file_exists($lokasi)) {
                unlink($lokasi);
            }
        }
    }
}

if (! function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil_rupiah = NULL;
        if (!is_null($angka) AND !empty($angka)) {
            $hasil_rupiah = number_format($angka,2,',','.');
            $hasil_rupiah = str_replace(',00','',$hasil_rupiah);
        }
        return $hasil_rupiah;
    }
}
if (! function_exists('norupiah')) {
    function norupiah($angka,$custom=null)
    {
        if ($angka == '0') {
            return $angka;
        } else {
            $hasil_rupiah = $custom;
            if (!is_null($angka) AND !empty($angka)) {
                $hasil_rupiah = number_format($angka,2,',','.');
                $hasil_rupiah = str_replace(',00','',$hasil_rupiah);
            }
            if ($hasil_rupiah == '' || $hasil_rupiah == NULL) {
                return NULL;
            } else {
                return $hasil_rupiah;
            }
        }
    }
}

if (! function_exists('menuaktif')) {
    function menuaktif($menu,$menuaktif) {
        $result = ($menu == $menuaktif) ? 'active' : NULL ;
        return $result;
    }
}

// TIME --------------------------------------------
if (! function_exists('tgl_sekarang')) {
    function tgl_sekarang() {
        return date('Y-m-d');
    }
}

## ambil tanggal hari ini
if (! function_exists('ambil_tgl')) {
    function ambil_tgl() {
        return date('d');
    }
}

## ambil bulan hari ini
if (! function_exists('ambil_bulan')) {
    function ambil_bulan() {
        return date('m');
    }
}

## ambil tahun hari ini
if (! function_exists('ambil_tahun')) {
    function ambil_tahun() {
        return date('Y');
    }
}

## mengambil Waktu hari ini
if (! function_exists('jam_sekarang')) {
    function jam_sekarang() {
        return date('H:i:s');
    }
}

if (! function_exists('bulan_indo')) {
    function bulan_indo($m=null)
    {
        if (is_null($m)) {
            $m = ambil_bulan();
        } else {
            if (strlen($m) == 1)
                $m = '0'.$m;
        }
        
        $bulan 		= [	'01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'April',
                        '05' => 'Mei',
                        '06' => 'Juni',
                        '07' => 'Juli',
                        '08' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember'];
        
        return $bulan[$m];
    }
}

// change date to indonesia date
if (! function_exists('date_indo')) {
    function date_indo($date=null,$info=null)
    {
        if (!is_null($date) AND $date <> '0000-00-00') {
            $tgl			= substr($date, 8,2);
            $bulan			= substr($date, 5,2);
            $tahun			= substr($date, 0,4);
            return $tgl.' '.bulan_indo($bulan).' '.$tahun;
        } else {
            $notif = 'Date Not Found';
            if (!is_null($info)) {
                $notif = $info;
            }
            return $notif;
        }
    }
}

// END TIME ----------------------------------------

if (! function_exists('market_bagikankewhatsapp')) {
    function share_whatsapp($slug)
    {
        // menggunakan fitur yang diberikan whatsapp secara gratis
        $link   = "https://api.whatsapp.com/send?text=Kunjungi%20tautan%20untuk%20mencoba%20fitur%20".url('app/fitur/'.$slug);

        return $link;
    }
}

if (! function_exists('appMenuAktif')) {
    function appMenuAktif($menu,$menuaktif) {
        $status = ($menu == $menuaktif) ? 'active' : NULL ;
        return $status;
    }
}
if (! function_exists('appMenuSubAktif')) {
    function appMenuSubAktif($menu,$menuaktif) {
        $status = (in_array($menuaktif,$menu)) ? 'active' : NULL ;
        return $status;
    }
}

// IP
// Mendapatkan IP pengunjung menggunakan getenv()
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan IP pengunjung menggunakan $_SERVER
function get_client_ip_2() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan jenis web browser pengunjung
function get_client_browser() {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
        $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
        $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
        $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
        $browser = 'Internet Explorer';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Edg'))
        $browser = 'Microsoft Edge';
    else
        $browser = 'Other';
    return $browser;
}