<?php
include 'connection.php';
$con = OpenCon();
$sql="select student.name as `student name`,student.studentid from student";
$result=mysqli_query($con,$sql);
$final = array();
while ( $row = $result->fetch_assoc())  {
$row_array=array();
$row_array['studentname']=$row['student name'];
$row_array['studentid']=$row['studentid'];
$row_array['activity list'] = array();
$sql1="select distinct(activities_list.activity_name) as `activity name` from activities_list,activites_reg where activities_list.activity_id=activites_reg.activity_id and activites_reg.studentid='".$row['studentid']."'";
$activityrowresult=mysqli_query($con,$sql1);
while ( $activityrow = $activityrowresult->fetch_assoc()) {
$subarray=array();
$subarray['name']= $activityrow['activity name'];
array_push($row_array['activity list'],$subarray['name']);
}
array_push($final,$row_array);
}
echo json_encode($final);
mysqli_free_result($result);
CloseCon($con);

?>
