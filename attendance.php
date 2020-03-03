<?php
include 'connection.php';
$con = OpenCon();
$action=$_POST['action'];
if($action=='reg'){
  $receiver_data=$_POST['dataarray'];
	$new_array=json_decode($receiver_data,true);
  foreach($new_array as $row)
  {
    $nstudentid=$row['studentid'];
    $nactivityid=$row['activity_id'];
    $ndate=$row['date_of_reg'];
    $sql="select * from activites_reg where studentid='$nstudent_name' and activity_id='$nactivityid'";
    if($result=mysqli_query($con,$sql)){
    $query="INSERT INTO `attendance` (`studentid`, `activity_id`, `date`) VALUES ('$nstudentid', '$nactivityid', '$ndate')";
    $stmt = $con->prepare($query);
    if($stmt->execute()){
    $response =$nstudentid.':successfully registered-';
    }else{
    $response =$nastudentid.':Already registered-';
    }
    echo "$response";
    $stmt->store_result();
    $stmt->close();
}else {
  echo "not registered for the course";
}
  }
}else if($action=='list'){
  $query="SELECT * FROM `attendance`";
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
