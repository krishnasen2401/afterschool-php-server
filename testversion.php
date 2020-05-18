<?php
include 'connection.php';
$con = OpenCon();
$sql="select student.name as `student name`,activities_list.activity_name as `activity name` from student left join activites_reg on student.studentid=activites_reg.studentid left join activities_list on activites_reg.activity_id=activities_list.activity_id";
$result=mysqli_query($con,$sql);
$final = array();
while ( $row = $result->fetch_assoc())  {
$row_array=array();
$row_array['studentname']=$row['student name'];
$row_array['activityname']=$row['activity name'];
array_push($final,$row_array);
}
echo json_encode($final);
mysqli_free_result($result);
CloseCon($con);

?>
 
