<?php
include 'connection.php';
$con = OpenCon();
$action=$_POST['action'];
if($action=='reg'){
  $receiver_data=$_POST['dataarray'];
	$new_array=json_decode($receiver_data,true);
  foreach($new_array as $row)
  {
    $nactivityid=$row['activity_id'];
    $nstudentid=$row['studentid'];
    $ndate=$row['date'];
    $nname=$row['name'];
    $query="INSERT INTO `attendance` (`studentid`, `activity_id`, `date`) VALUES ('$nstudentid', '$nactivityid', '$ndate')";
    $stmt = $con->prepare($query);
    if($stmt->execute()){
    $response =' succefully for:-'.$nname."\n";
    }else{
    $response ='attendance taken unsuccessful for:-'.$nname."\n";
    }
    echo "$response";
    $stmt->store_result();
    $stmt->close();

  }
}else if($action=='list'){
  $query="SELECT studentid,activity_id,date as date_of_reg FROM `attendance`";
  $result=mysqli_query($con,$query);
  $dbdata = array();
  while ( $row = $result->fetch_assoc())  {
    $dbdata[]=$row;
    }
    echo json_encode($dbdata);
  mysqli_free_result($result);
}
CloseCon($con);
?>
