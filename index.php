<?php
session_start();
$sb=$_POST["submit"];
$us=htmlspecialchars(addslashes($_POST["us"]));
$pa=htmlspecialchars(addslashes($_POST["pa"]));
if(isset($sb)){
$url = 'http://my.teamobi.com/app/index.php?do=login';
$post_fields = "user=$us&pass=$pa";
$ua = "Nokia6300/2.0 (07.00) Profile/MIDP-2.0 Configuration/CLDC-1.1 Mozilla/5.0 (Java; U; vi; nokia6300) UCBrowser8.2.0.132/70/452/UCWEB Mobile";
$ch = curl_init();
curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
$result = curl_exec($ch);
curl_close($ch);
if(preg_match('/Object/i',$result)){
switch($_POST['op']) {
case 0: $game = 'Avatar';
break;
case 1: $game = 'MobiArmy';
break;case 2: $game = 'Ninja School';
break;case 3: $game = 'Kiem Khach';
break;case 4: $game = 'Chien Binh';
break;case 5: $game = 'Phap Su';
break;
case 6: $game = 'Cung Thu';
break;
case 7: $game = 'Dau Si';
break;
}
$_SESSION["game"] = $game;
$_SESSION["ten"] = $_POST["us"];
$_SESSION["pas"] = $_POST["pa"];
header('Location: cart.php');
} else {
include 'header.php';
//echo $result;
echo '<div class="bg-content">Đăng nhập không thành công.<br />

<ul>

    <li>Tên đăng nhập hoặc mật khẩu không chính xác</li>

</ul>

<a href="index.php">Quay lại trang đăng nhập</a>
';
}
//echo '</div><br></div><br></div></div>';
} else {
include 'header.php';

echo '
<div class="bg-content" align="center">
<div style="font-size:10px;">Sử dụng tài khoản TeaM để đăng nhập.</div>
<form action="index.php" method="POST" name="login">
<input type="hidden" name="nav" value="" readonly="readonly" />
<table><tr>
<td><label for="user">Tên đăng nhập:</label></td>
<td><input name="us" type="text" value="" /></td>
</tr><tr>
<td><label for="pass">Mật khẩu:</label></td>
<td><input name="pa" type="password" value="" /></td>

<tr><td>Game muốn nhận Code:</td><td><select name="op">
<option value="0">Avatar</option>
<option value="1">MobiArmy</option>
<option value="2">Ninja School</option><option value="3">KPAH: Kiếm Khách</option><option value="4">KPAH: Chiến Binh</option>
<option value="5">KPAH: Pháp Sư</option>
<option value="6">KPAH: Cung Thủ</option>
<option value="7">KPAH: Đấu Sĩ</option></select> </td></tr>
</table>
<button type="submit" value="Đăng nhập" name="submit">Đăng nhập</button><br />
<div style="font-size:10px;">
Nếu bạn chưa có tài khoản, vui lòng <a href="http://my.teamobi.com/app/view/register.php">đăng ký</a></div>

</form>';
}
include 'footer.php';
?>
           
