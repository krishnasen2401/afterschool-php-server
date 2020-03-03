<?php
include 'connection.php';
$con = OpenCon();
$action=$_POST['action'];
if($action="studentlist"){
$nactivityid=$_POST["activityname"];
$sql="select student.name,student.studentid,activites_reg.activity_id,'date' as date from student,activites_reg where student.studentid=activites_reg.studentid and activites_reg.activity_id IN(select activity_id from activities_list where activity_name='$nactivityid')";
$result=mysqli_query($con,$sql);
$dbdata = array();
while ( $row = $result->fetch_assoc())  {
  $dbdata[]=$row;
  }
  echo json_encode($dbdata);
mysqli_free_result($result);
}
else if($action=="activitieslist"){
$nstudentid=$_POST["studentid"];
$sql="select student.name,activites_reg.activity_id from student,activites_reg where student.studentid=activites_reg.studentid and student.studentid='$nstudentid'";
}else if($action=="attendance_entry"){

}
CloseCon($con);
?>
