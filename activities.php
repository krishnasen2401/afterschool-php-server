<?php
include 'connection.php';
$conn=OpenCon();
$action=$_POST['action'];
if($action=='reg'){
$activites_name=trim($_POST['activities_name']);
$activites_name=strtoupper($activites_name);
$age_start=trim($_POST['age_start']);
$age_end=trim($_POST['age_end']);
$fees=trim($_POST['fees']);
$arr =  preg_split("/\s+/",trim($activites_name));//trim with spliting
$activities_id='';
foreach ($arr as $x) {
  $activities_id=$activities_id.$x;//take starting letter of each word
}
$age_group=$age_start.'-'.$age_end;
$activities_id=$activities_id.$age_start.$age_end.$fees;
echo $age_group."<br>";
echo $activities_id."<br>";
$query="INSERT INTO `activities_list` (`activity_id`, `activity_name`, `age_group`, `fees`) VALUES ('$activities_id', '$activites_name', '$age_group', '$fees')";
$stmt = $conn->prepare($query);
if($stmt->execute()){
$response ='Entry successfully created';
}else{
$response ='value already exists';
}
echo "$response";
$stmt->store_result();
$stmt->close();
}
else if($action=='list'){
  $query="select * from activities_list";
  $result=mysqli_query($conn,$query);
  $dbdata = array();
  while ( $row = $result->fetch_assoc())  {
  	$dbdata[]=$row;
    }
    echo json_encode($dbdata);
  mysqli_free_result($result);
}
else if($action=='activitynamelist'){
  $query="select activity_name from activities_list group by activity_name";
  $result=mysqli_query($conn,$query);
  $dbdata = array();
  while ( $row = $result->fetch_assoc())  {
  	$dbdata[]=$row;
    }
    echo json_encode($dbdata);
  mysqli_free_result($result);
}
CloseCon($conn);
?>
