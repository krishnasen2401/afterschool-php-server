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
    $query="INSERT INTO `activites_reg` (`studentid`, `activity_id`, `date_of_reg`) VALUES ('$nstudentid', '$nactivityid', '$ndate')";
    $stmt = $con->prepare($query);
    if($stmt->execute()){
    $response =$nactivityid.':successfully registered-';
    }else{
    $response =$nactivityid.':Already registered-';
    }
    echo "$response";
    $stmt->store_result();
    $stmt->close();

  }
}else if($action=='list'){
  $query="SELECT * FROM `activites_reg`";
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
