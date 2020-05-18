SELECT studentid,count(studentid),activity_id
FROM attendance
WHERE MONTH(date) = MONTH(CURRENT_DATE())
AND YEAR(date) = YEAR(CURRENT_DATE()) GROUP BY studentid,activity_id

SELECT studentid,count(studentid),activity_id,Month(date),Year(date)
FROM attendance GROUP BY studentid,activity_id,MONTH(date),YEAR(date)

SELECT studentid,count(studentid),activity_id,MonthName(date),Year(date)
FROM attendance GROUP BY studentid,activity_id,MONTH(date),YEAR(date)

SELECT studentid,count(studentid),activity_id,MonthName(date),Year(date)
FROM attendance where studentid like '%' GROUP BY studentid,activity_id,MONTH(date),YEAR(date)

SELECT studentid,count(studentid),activity_id,MonthName(date),Year(date)
FROM attendance where studentid like 'vaiahu30032020' GROUP BY studentid,activity_id,MONTH(date),YEAR(date)

SELECT studentid,count(studentid),activity_id,MonthName(date),Year(date)
FROM attendance where studentid like '%' and MonthName(date)=MonthName(CURRENT_DATE) GROUP BY studentid,activity_id,MONTH(date),YEAR(date)

SELECT studentid,count(studentid),activity_id,MonthName(date),Year(date)
FROM attendance where studentid like '%' and MonthName(date) like MonthName(CURRENT_DATE) GROUP BY studentid,activity_id,MONTH(date),YEAR(date)

SELECT studentid,count(studentid),activity_id,MonthName(date),Year(date)
FROM attendance where studentid like '%' and MonthName(date) BETWEEN 'April' and 'May' GROUP BY studentid,activity_id,MONTH(date),YEAR(date)

SELECT student.name,student.studentid,count(attendance.studentid) as `noofdays`,activities_list.*,Concat(MonthName(attendance.date),'-',Year(attendance.date)) as `month-year`
FROM attendance,student,activities_list where student.studentid=attendance.studentid and attendance.studentid ='krishnase04032020'and activities_list.activity_id=attendance.activity_id and  attendance.studentid like '%' and MonthName(date) like MonthName(CURRENT_DATE) GROUP BY attendance.studentid,attendance.activity_id,MONTH(attendance.date),YEAR(attendance.date)

select student.name,activities_list.activity_name from student left join activites_reg on student.studentid=activites_reg.studentid left join activities_list on activites_reg.activity_id=activities_list.activity_id

select student.name as `student name`,activities_list.activity_name as `activity name` from student left join activites_reg on student.studentid=activites_reg.studentid left join activities_list on activites_reg.activity_id=activities_list.activity_id;

select student.name,activities_list.activity_name,count(attendance.studentid),Concat(MonthName(attendance.date),'-',Year(attendance.date)) as `month-year` from student left join activites_reg on student.studentid=activites_reg.studentid left join activities_list on activites_reg.activity_id=activities_list.activity_id left join attendance on student.studentid=attendance.studentid and activities_list.activity_id=activities_list.activity_id GROUP by student.name,activities_list.activity_name,Month(attendance.date),YEAR(attendance.date)

SELECT DATEADD(month, -1, GETDATE())
