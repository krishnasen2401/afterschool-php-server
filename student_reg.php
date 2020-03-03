<?php
include 'connection.php';
$conn=OpenCon();
$action=$_POST['action'];
if($action=='reg'){
$student_name=trim($_POST['name']);
$dob=trim($_POST['dob']);
$parent1=trim($_POST['parent1']);
$phone1=trim($_POST['phone1']);
$parent2=trim($_POST['parent2']);
$phone2=trim($_POST['phone2']);
$gender=trim($_POST['gender']);
$month = date('m', strtotime($dob));
$day = date('d', strtotime($dob));
$year = date('Y', strtotime($dob));
$arr = preg_split("/\s+/",trim($student_name));
$student_id=$arr[0].$day.$month.$year;
//date format is yyyy-mm-dd
$query="INSERT INTO `student` (`studentid`, `name`, `gender`, `dob`, `parent1`, `phone1`, `parent2`, `phone2`) VALUES ('$student_id', '$student_name', '$gender','$dob', '$parent1', '$phone1', '$parent2', '$phone2')";
$stmt = $conn->prepare($query);
if($stmt->execute()){
$response ='Entry successfully created'.'-'.$student_id;
}else{
$response ='value already exists';
}
echo $response;
$stmt->store_result();
$stmt->close();
}
else if($action=='list'){
$query="select * from student";
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
