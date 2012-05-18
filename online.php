<?
include("TreeAdmin/connect.php");
//session_start();        // Khoi dong session    
$s_id = session_id();    // Bien s_id        
$time = time();            // Lay thoi gian hien tai 
$time_secs = 900;        // Thoi gian tinh bang seconds de delete & insert cai $s_id    moi, test tren localhost thi cho no bang 3 seconds de nhanh thay ket qua, ch?y trên host thì d? 900 = 15 phút là v?a 
$time_out = $time - $time_secs;    // Lay thoi gian hien tai    

@mysql_query("DELETE FROM  online WHERE s_time < '$time_out'");                // Delete tat ca nhung rows trong khoang thoi gian qui dinh san
@mysql_query("DELETE FROM  online WHERE s_id = '$s_id'");                        // Delete cai $s_id cua chinh thang nay
@mysql_query("INSERT INTO  online (s_id, s_time) VALUES ('$s_id', '$time')");    // Delete no xong lai insert chinh no
$user_online = @mysql_num_rows(@mysql_query("SELECT id FROM  online"));        // Dem so dong trong table stats, chinh la so nguoi dang online
// Them 1 cai, xem page nay da duoc mo bao nhieu lan:
list($page_visited) = @mysql_fetch_array(@mysql_query("SELECT MAX(id) FROM  online"));
?>

S&#7889; ng&#432;&#7901;i &#273;ang online: <?php echo $user_online ?></p>
