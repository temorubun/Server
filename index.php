<?php
// Koneksi ke database
mysql_connect("localhost", "john", "hiroshima") or die(mysql_error());
mysql_select_db("webapp");

// Proses input jika form di-submit
if (!empty($_POST['uname']) && !empty($_POST['psw'])){
    // Escape karakter khusus dalam inputan pengguna untuk mencegah SQL Injection
    $username = mysql_real_escape_string($_POST['uname']);
    $password = mysql_real_escape_string($_POST['psw']);
    
    // Membuat query untuk memeriksa username dan password
    $query = "SELECT * FROM users WHERE username = '$username' AND password='$password'";
    $result = mysql_query($query);
    
    // Mendapatkan data hasil query
    $row = mysql_fetch_array($result);
}
?>
<html>
<body>
<?php
// Jika belum login (atau login gagal), tampilkan form login
if (empty($row['id'])){
?>
<form method="post" name="frmLogin" id="frmLogin" action="index.php">
    <table width="300" border="1" align="center" cellpadding="2" cellspacing="2">
        <tr>
            <td colspan='2' align='center'><b>Remote System Administration Login</b></td>
        </tr>
        <tr>
            <td width="150">Username</td>
            <td><input name="uname" type="text"></td>
        </tr>
        <tr>
            <td width="150">Password</td>
            <td><input name="psw" type="password"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btnLogin" value="Login"></td>
        </tr>
    </table>
</form>
<?php
} // End of login form

// Jika pengguna berhasil login sebagai admin (id = 1)
if (!empty($row['id']) && $row['id'] == 1){
?>
<form name="ping" action="pingit.php" method="post" target="_blank">
    <table width='600' border='1'>
        <tr valign='middle'>
            <td colspan='2' align='center'><b>Welcome to the Basic Administrative Web Console<br></b></td>
        </tr>
        <tr valign='middle'>
            <td align='center'>Ping a Machine on the Network:</td>
            <td align='center'>
                <input type="text" name="ip" size="30">
                <input type="submit" value="submit" name="submit">
            </td>
        </tr>
    </table>
</form>
<?php
}
?>
</body>
</html>
