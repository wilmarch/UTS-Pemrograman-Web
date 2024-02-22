<?php  
include "koneksi.php";

session_start();
$userid = $_SESSION['member_id'];
$postid = $_SESSION['posting_id'];
$type = $_POST['type'];

// echo $userid;

$query = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE postid=" . $postid . " and userid=" . $userid;

$result = mysqli_query($koneksi, $query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

if ($count == 0) {
  $insertquery = "INSERT INTO like_unlike(userid,postid,type) values(" . $userid . "," . $postid . "," . $type . ")";
  mysqli_query($koneksi, $insertquery);
} else {
  $updatequery = "UPDATE like_unlike SET type=" . $type . " where userid=" . $userid . " and postid=" . $postid;
  mysqli_query($koneksi, $updatequery);
}

$query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type=1 and postid=" . $postid;
$result = mysqli_query($koneksi, $query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type=0 and postid=" . $postid;
$result = mysqli_query($koneksi, $query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];

$return_arr = array("likes" => $totalLikes, "unlikes" => $totalUnlikes);

echo json_encode($return_arr);
?>