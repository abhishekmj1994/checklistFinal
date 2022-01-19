<?php
/*<!----------------------------Checklist page 01---------------------->*/
function mflags(){
	$getrollover = mysql_fetch_assoc(mysql_query("select * from mflags where status='1'"));
	return $getrollover['mflags'];
}

if(isset($_POST['save_pg01']) || isset($_POST['submit_pg01'])){
	$glifspace = implode($_POST['glifspace'],'||');
	$RC_M = $_POST['RC_M'];
	$RC_S1 = $_POST['RC_S1'];
	$RC_S2= $_POST['RC_S2'];
	$RC_S3= $_POST['RC_S3'];
	$RC_S4= $_POST['RC_S4'];
	$RC_S5= $_POST['RC_S5'];
	$RC_S6= $_POST['RC_S6'];
	$RC_S7= $_POST['RC_S7'];
	$RC_S8= $_POST['RC_S8'];
	$ORA_M= $_POST['ORA_M'];
	$ORA_S1= $_POST['ORA_S1'];
	$ORA_S2= $_POST['ORA_S2'];
	$ORA_S3= $_POST['ORA_S3'];
	$ORA_S4= $_POST['ORA_S4'];
	$ORA_S5= $_POST['ORA_S5'];
	$ORA_S6= $_POST['ORA_S6'];
	$ORA_S7= $_POST['ORA_S7'];
	$ORA_S8= $_POST['ORA_S8'];
	$EOD_M= $_POST['EOD_M'];
	$EOD_S1= $_POST['EOD_S1'];
	$EOD_S2= $_POST['EOD_S2'];
	$EOD_S3= $_POST['EOD_S3'];
	$EOD_S4= $_POST['EOD_S4'];
	$EOD_S5= $_POST['EOD_S5'];
	$EOD_S6= $_POST['EOD_S6'];
	$EOD_S7= $_POST['EOD_S7'];
	$EOD_S8= $_POST['EOD_S8'];
	$EOD_StartTime= $_POST['EOD_StartTime'];
	$EOD_EndTime= $_POST['EOD_EndTime'];
	$IF2225_Logtime= $_POST['IF2225_Logtime'];
	$IF2225_RC= $_POST['IF2225_RC'];
	$IF2225_ORA= $_POST['IF2225_ORA'];
	$IF3599_Logtime= $_POST['IF3599_Logtime'];
	$IF3599_RC= $_POST['IF3599_RC'];
	$IF3599_ORA= $_POST['IF3599_ORA'];
	$backup_StartTime= $_POST['backup_StartTime'];
	$backup_EndTime= $_POST['backup_EndTime'];
	$SOD_M= $_POST['SOD_M'];
	$SOD_S1= $_POST['SOD_S1'];
	$SOD_S2= $_POST['SOD_S2'];
	$SOD_S3= $_POST['SOD_S3'];
	$SOD_S4= $_POST['SOD_S4'];
	$SOD_S5= $_POST['SOD_S5'];
	$SOD_S6= $_POST['SOD_S6'];
	$SOD_S7= $_POST['SOD_S7'];
	$SOD_S8= $_POST['SOD_S8'];
	$SOD_StartTime= $_POST['SOD_StartTime'];
	$SOD_EndTime= $_POST['SOD_EndTime'];
	$Today_date_M= $_POST['Today_date_M'];
	$Day_rgn_date_M= $_POST['Day_rgn_date_M'];
	$Night_rgn_date_M= $_POST['Night_rgn_date_M'];
	$Today_date_S1= $_POST['Today_date_S1'];
	$Day_rgn_date_S1= $_POST['Day_rgn_date_S1'];
	$Night_rgn_date_S1= $_POST['Night_rgn_date_S1'];
	$Today_date_S2= $_POST['Today_date_S2'];
	$Day_rgn_date_S2= $_POST['Day_rgn_date_S2'];
	$Night_rgn_date_S2= $_POST['Night_rgn_date_S2'];
	$Today_date_S3= $_POST['Today_date_S3'];
	$Day_rgn_date_S3= $_POST['Day_rgn_date_S3'];
	$Night_rgn_date_S3= $_POST['Night_rgn_date_S3'];
	$Today_date_S4= $_POST['Today_date_S4'];
	$Day_rgn_date_S4= $_POST['Day_rgn_date_S4'];
	$Night_rgn_date_S4= $_POST['Night_rgn_date_S4'];
	$Today_date_S5= $_POST['Today_date_S5'];
	$Day_rgn_date_S5= $_POST['Day_rgn_date_S5'];
	$Night_rgn_date_S5= $_POST['Night_rgn_date_S5'];
	$Today_date_S6= $_POST['Today_date_S6'];
	$Day_rgn_date_S6= $_POST['Day_rgn_date_S6'];
	$Night_rgn_date_S6= $_POST['Night_rgn_date_S6'];
	$Today_date_S7= $_POST['Today_date_S7'];
	$Day_rgn_date_S7= $_POST['Day_rgn_date_S7'];
	$Night_rgn_date_S7= $_POST['Night_rgn_date_S7'];
	$Today_date_S8= $_POST['Today_date_S8'];
	$Day_rgn_date_S8= $_POST['Day_rgn_date_S8'];
	$Night_rgn_date_S8= $_POST['Night_rgn_date_S8'];
	$status='1';
	$Maker=implode($_POST['Maker'],",");
	$Checker=implode($_POST['Checker'],",");
	$time=implode($_POST['time'],",");
	$RcErrorWithJob = implode($_POST['RcErrorWithJob'],",");
	$crrdate = mflags();
	$ma=substr_count($Maker,",,");
	$ck=substr_count($Checker,",,");
	$tm=substr_count($time,",,");

	$query = mysql_query("select * from checklist_pg01 where status='1' && Inst_Date='$crrdate' && freeze = '1'");#submit Query
	$query1 = mysql_query("select * from checklist_pg01 where status='1' && Inst_Date='$crrdate' && freeze != '1'");#save Query
	if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
	}
	elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg01'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Maker | Checker | Checked Time;')</script>";
			}
			else{
				
				$sql = mysql_query ("update checklist_pg01 set glifspace = '$glifspace' , RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', ORA_S8 = '$ORA_S8',
				EOD_M = '$EOD_M',  EOD_S1 = '$EOD_S1', EOD_S2 = '$EOD_S2', EOD_S3 = '$EOD_S3', EOD_S4 = '$EOD_S4', EOD_S5 = '$EOD_S5', EOD_S6 = '$EOD_S6', EOD_S7 = '$EOD_S7', EOD_S8 = '$EOD_S8', 
				EOD_StartTime = '$EOD_StartTime', EOD_EndTime = '$EOD_EndTime', 
				IF2225_Logtime = '$IF2225_Logtime', IF2225_RC = '$IF2225_RC', IF2225_ORA = '$IF2225_ORA', 
				IF3599_Logtime = '$IF3599_Logtime', IF3599_RC = '$IF3599_RC', IF3599_ORA = '$IF3599_ORA', 
				backup_StartTime = '$backup_StartTime', backup_EndTime = '$backup_EndTime', 
				SOD_M='$SOD_M', SOD_S1 = '$SOD_S1',  SOD_S2 = '$SOD_S2', SOD_S3 = '$SOD_S3', SOD_S4 = '$SOD_S4', SOD_S5 = '$SOD_S5', SOD_S6 = '$SOD_S6', SOD_S7 = '$SOD_S7', SOD_S8 = '$SOD_S8', 
				SOD_StartTime = '$SOD_StartTime', SOD_EndTime = '$SOD_EndTime', 
				Today_date_M = '$Today_date_M', Day_rgn_date_M = '$Day_rgn_date_M', Night_rgn_date_M = '$Night_rgn_date_M', 
				Today_date_S1 = '$Today_date_S1', Day_rgn_date_S1 = '$Day_rgn_date_S1', 
				Night_rgn_date_S1 = '$Night_rgn_date_S1', 
				Today_date_S2 = '$Today_date_S2', Day_rgn_date_S2 = '$Day_rgn_date_S2', Night_rgn_date_S2 = '$Night_rgn_date_S2', 
				Today_date_S3 = '$Today_date_S3', Day_rgn_date_S3 = '$Day_rgn_date_S3', Night_rgn_date_S3 = '$Night_rgn_date_S3', 
				Today_date_S4 = '$Today_date_S4', Day_rgn_date_S4 = '$Day_rgn_date_S4', Night_rgn_date_S4 = '$Night_rgn_date_S4', 
				Today_date_S5 = '$Today_date_S5', Day_rgn_date_S5 = '$Day_rgn_date_S5', Night_rgn_date_S5 = '$Night_rgn_date_S5', 
				Today_date_S6 = '$Today_date_S6', Day_rgn_date_S6 = '$Day_rgn_date_S6', Night_rgn_date_S6 = '$Night_rgn_date_S6', 
				Today_date_S7 = '$Today_date_S7', Day_rgn_date_S7 = '$Day_rgn_date_S7', Night_rgn_date_S7 = '$Night_rgn_date_S7', 
				Today_date_S8 = '$Today_date_S8', Day_rgn_date_S8 = '$Day_rgn_date_S8', Night_rgn_date_S8 = '$Night_rgn_date_S8', 
				Maker = '$Maker', Checker = '$Checker', time = '$time', freeze = '1', RcErrorWithJob='$RcErrorWithJob' 
				where status = '1' && Inst_Date = '$crrdate'");
				
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
					
				}
			}	
		}
		else { 
			
				$sql1 = mysql_query("update checklist_pg01 set glifspace = '$glifspace',
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', ORA_S8 = '$ORA_S8',
				EOD_M = '$EOD_M',  EOD_S1 = '$EOD_S1', EOD_S2 = '$EOD_S2', EOD_S3 = '$EOD_S3', EOD_S4 = '$EOD_S4', EOD_S5 = '$EOD_S5', EOD_S6 = '$EOD_S6', EOD_S7 = '$EOD_S7', EOD_S8 = '$EOD_S8', 
				EOD_StartTime = '$EOD_StartTime', EOD_EndTime = '$EOD_EndTime', 
				IF2225_Logtime = '$IF2225_Logtime', IF2225_RC = '$IF2225_RC', IF2225_ORA = '$IF2225_ORA', 
				IF3599_Logtime = '$IF3599_Logtime', IF3599_RC = '$IF3599_RC', IF3599_ORA = '$IF3599_ORA', 
				backup_StartTime = '$backup_StartTime', backup_EndTime = '$backup_EndTime', 
				SOD_M='$SOD_M', SOD_S1 = '$SOD_S1',  SOD_S2 = '$SOD_S2', SOD_S3 = '$SOD_S3', SOD_S4 = '$SOD_S4', SOD_S5 = '$SOD_S5', SOD_S6 = '$SOD_S6', SOD_S7 = '$SOD_S7', SOD_S8 = '$SOD_S8', 
				SOD_StartTime = '$SOD_StartTime', SOD_EndTime = '$SOD_EndTime', 
				Today_date_M = '$Today_date_M', Day_rgn_date_M = '$Day_rgn_date_M', Night_rgn_date_M = '$Night_rgn_date_M', 
				Today_date_S1 = '$Today_date_S1', Day_rgn_date_S1 = '$Day_rgn_date_S1', 
				Night_rgn_date_S1 = '$Night_rgn_date_S1', 
				Today_date_S2 = '$Today_date_S2', Day_rgn_date_S2 = '$Day_rgn_date_S2', 
				Night_rgn_date_S2 = '$Night_rgn_date_S2', 
				Today_date_S3 = '$Today_date_S3', Day_rgn_date_S3 = '$Day_rgn_date_S3', 
				Night_rgn_date_S3 = '$Night_rgn_date_S3', 
				Today_date_S4 = '$Today_date_S4', Day_rgn_date_S4 = '$Day_rgn_date_S4', 
				Night_rgn_date_S4 = '$Night_rgn_date_S4', 
				Today_date_S5 = '$Today_date_S5', Day_rgn_date_S5 = '$Day_rgn_date_S5', 
				Night_rgn_date_S5 = '$Night_rgn_date_S5', 
				Today_date_S6 = '$Today_date_S6', Day_rgn_date_S6 = '$Day_rgn_date_S6', 
				Night_rgn_date_S6 = '$Night_rgn_date_S6', 
				Today_date_S7 = '$Today_date_S7', Day_rgn_date_S7 = '$Day_rgn_date_S7', 
				Night_rgn_date_S7 = '$Night_rgn_date_S7', 
				Today_date_S8 = '$Today_date_S8', Day_rgn_date_S8 = '$Day_rgn_date_S8', 
				Night_rgn_date_S8 = '$Night_rgn_date_S8',
				Maker = '$Maker',  Checker = '$Checker', time = '$time', RcErrorWithJob='$RcErrorWithJob' 
				where status='1' && Inst_Date='$crrdate'");
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	else {
		if(isset($_POST['submit_pg01'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Maker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			
			$sql1 = mysql_query ("INSERT INTO checklist_pg01(glifspace , RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, EOD_M, EOD_S1, EOD_S2, EOD_S3, EOD_S4, EOD_S5, EOD_S6, EOD_S7, EOD_S8, EOD_StartTime, EOD_EndTime, IF2225_Logtime, IF2225_RC, IF2225_ORA, IF3599_Logtime, IF3599_RC, IF3599_ORA, backup_StartTime, backup_EndTime, SOD_M, SOD_S1,  SOD_S2, SOD_S3, SOD_S4, SOD_S5, SOD_S6, SOD_S7, SOD_S8, SOD_StartTime, SOD_EndTime, Today_date_M, Day_rgn_date_M, Night_rgn_date_M, Today_date_S1, Day_rgn_date_S1, Night_rgn_date_S1, Today_date_S2, Day_rgn_date_S2, Night_rgn_date_S2, Today_date_S3, Day_rgn_date_S3, Night_rgn_date_S3, Today_date_S4, Day_rgn_date_S4, Night_rgn_date_S4, Today_date_S5, Day_rgn_date_S5, Night_rgn_date_S5, Today_date_S6, Day_rgn_date_S6, Night_rgn_date_S6, Today_date_S7, Day_rgn_date_S7, Night_rgn_date_S7, Today_date_S8, Day_rgn_date_S8, Night_rgn_date_S8, time, status, Maker, Checker, Inst_Date, RcErrorWithJob) 
			VALUES ('$glifspace' , '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', '$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', '$EOD_M', '$EOD_S1', '$EOD_S2', '$EOD_S3', '$EOD_S4', '$EOD_S5', '$EOD_S6', '$EOD_S7', '$EOD_S8',           '$EOD_StartTime', '$EOD_EndTime', '$IF2225_Logtime', '$IF2225_RC', '$IF2225_ORA', '$IF3599_Logtime', '$IF3599_RC', '$IF3599_ORA', '$backup_StartTime',  '$backup_EndTime', '$SOD_M', '$SOD_S1', '$SOD_S2', '$SOD_S3', '$SOD_S4', '$SOD_S5', '$SOD_S6', '$SOD_S7', '$SOD_S8', '$SOD_StartTime', '$SOD_EndTime',  '$Today_date_M', '$Day_rgn_date_M', '$Night_rgn_date_M', '$Today_date_S1', '$Day_rgn_date_S1','$Night_rgn_date_S1','$Today_date_S2','$Day_rgn_date_S2', '$Night_rgn_date_S2', '$Today_date_S3', '$Day_rgn_date_S3', '$Night_rgn_date_S3', '$Today_date_S4', '$Day_rgn_date_S4', '$Night_rgn_date_S4',           '$Today_date_S5', '$Day_rgn_date_S5', '$Night_rgn_date_S5', '$Today_date_S6', '$Day_rgn_date_S6', '$Night_rgn_date_S6', '$Today_date_S7','$Day_rgn_date_S7', '$Night_rgn_date_S7', '$Today_date_S8', '$Day_rgn_date_S8', '$Night_rgn_date_S8', '$time', '$status', '$Maker', '$Checker', 
			'$crrdate','$RcErrorWithJob') " );
			
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}


/*<!----------------------------Checklist page 02---------------------->*/
if(isset($_POST['save_pg02']) || isset($_POST['submit_pg02'])){
	
	$RcErrorWithJob = implode(",",$_POST['RcErrorWithJob']);
	$SY0080_proTime_M = $_POST['SY0080_proTime_M'];
	$SY0080_proTime_S1=$_POST['SY0080_proTime_S1'];
	$SY0080_proTime_S2=$_POST['SY0080_proTime_S2'];
	$SY0080_proTime_S3=$_POST['SY0080_proTime_S3'];
	$SY0080_proTime_S4=$_POST['SY0080_proTime_S4'];
	$SY0080_proTime_S5=$_POST['SY0080_proTime_S5'];
	$SY0080_proTime_S6=$_POST['SY0080_proTime_S6'];
	$SY0080_proTime_S7=$_POST['SY0080_proTime_S7'];
	$SY0080_proTime_S8=$_POST['SY0080_proTime_S8'];
	$SY0004_proTime_M = $_POST['SY0004_proTime_M'];
	$SY0004_proTime_S1=$_POST['SY0004_proTime_S1'];
	$SY0004_proTime_S2=$_POST['SY0004_proTime_S2'];
	$SY0004_proTime_S3=$_POST['SY0004_proTime_S3'];
	$SY0004_proTime_S4=$_POST['SY0004_proTime_S4'];
	$SY0004_proTime_S5=$_POST['SY0004_proTime_S5'];
	$SY0004_proTime_S6=$_POST['SY0004_proTime_S6'];
	$SY0004_proTime_S7=$_POST['SY0004_proTime_S7'];
	$SY0004_proTime_S8=$_POST['SY0004_proTime_S8'];
	$SY0005_proTime_M = $_POST['SY0005_proTime_M'];
	$SY0005_proTime_S1=$_POST['SY0005_proTime_S1'];
	$SY0005_proTime_S2=$_POST['SY0005_proTime_S2'];
	$SY0005_proTime_S3=$_POST['SY0005_proTime_S3'];
	$SY0005_proTime_S4=$_POST['SY0005_proTime_S4'];
	$SY0005_proTime_S5=$_POST['SY0005_proTime_S5'];
	$SY0005_proTime_S6=$_POST['SY0005_proTime_S6'];
	$SY0005_proTime_S7=$_POST['SY0005_proTime_S7'];
	$SY0005_proTime_S8=$_POST['SY0005_proTime_S8'];
	$SY0080_Id_M=$_POST['SY0080_Id_M'];
	$SY0080_Id_S1=$_POST['SY0080_Id_S1'];
	$SY0080_Id_S2=$_POST['SY0080_Id_S2'];
	$SY0080_Id_S3=$_POST['SY0080_Id_S3'];
	$SY0080_Id_S4=$_POST['SY0080_Id_S4'];
	$SY0080_Id_S5=$_POST['SY0080_Id_S5'];
	$SY0080_Id_S6=$_POST['SY0080_Id_S6'];
	$SY0080_Id_S7=$_POST['SY0080_Id_S7'];
	$SY0080_Id_S8=$_POST['SY0080_Id_S8'];
	$SY0004_Id_M=$_POST['SY0004_Id_M'];
	$SY0004_Id_S1=$_POST['SY0004_Id_S1'];
	$SY0004_Id_S2=$_POST['SY0004_Id_S2'];
	$SY0004_Id_S3=$_POST['SY0004_Id_S3'];
	$SY0004_Id_S4=$_POST['SY0004_Id_S4'];
	$SY0004_Id_S5=$_POST['SY0004_Id_S5'];
	$SY0004_Id_S6=$_POST['SY0004_Id_S6'];
	$SY0004_Id_S7=$_POST['SY0004_Id_S7'];
	$SY0004_Id_S8=$_POST['SY0004_Id_S8'];
	$SY0005_Id_M=$_POST['SY0005_Id_M'];
	$SY0005_Id_S1=$_POST['SY0005_Id_S1'];
	$SY0005_Id_S2=$_POST['SY0005_Id_S2'];
	$SY0005_Id_S3=$_POST['SY0005_Id_S3'];
	$SY0005_Id_S4=$_POST['SY0005_Id_S4'];
	$SY0005_Id_S5=$_POST['SY0005_Id_S5'];
	$SY0005_Id_S6=$_POST['SY0005_Id_S6'];
	$SY0005_Id_S7=$_POST['SY0005_Id_S7'];
	$SY0005_Id_S8=$_POST['SY0005_Id_S8'];
	$CBS_cutOff_time=$_POST['CBS_cutOff_time'];
	$CutOff_M=$_POST['CutOff_M'];
	$CutOff_S1=$_POST['CutOff_S1'];
	$CutOff_S2=$_POST['CutOff_S2'];
	$CutOff_S3=$_POST['CutOff_S3'];
	$CutOff_S4=$_POST['CutOff_S4'];
	$CutOff_S5=$_POST['CutOff_S5'];
	$CutOff_S6=$_POST['CutOff_S6'];
	$CutOff_S7=$_POST['CutOff_S7'];
	$CutOff_S8=$_POST['CutOff_S8'];
	$Log_time=$_POST['Log_time'];
	$RC_Code=$_POST['RC_Code'];
	$Oracle_Code=$_POST['Oracle_Code'];
	$LogTime=$_POST['LogTime'];
	$RCCode=$_POST['RCCode'];
	$ORACode=$_POST['ORACode'];
	$RC_M=$_POST['RC_M'];	
	$RC_S1=$_POST['RC_S1'];	
	$RC_S2=$_POST['RC_S2'];	
	$RC_S3=$_POST['RC_S3'];	
	$RC_S4=$_POST['RC_S4'];	
	$RC_S5=$_POST['RC_S5'];	
	$RC_S6=$_POST['RC_S6'];
	$RC_S7=$_POST['RC_S7'];
	$RC_S8=$_POST['RC_S8'];
	$ORA_M=$_POST['ORA_M'];	
	$ORA_S1=$_POST['ORA_S1'];	
	$ORA_S2=$_POST['ORA_S2'];	
	$ORA_S3=$_POST['ORA_S3'];	
	$ORA_S4=$_POST['ORA_S4'];	
	$ORA_S5=$_POST['ORA_S5'];	
	$ORA_S6=$_POST['ORA_S6'];
	$ORA_S7=$_POST['ORA_S7'];
	$ORA_S8=$_POST['ORA_S8'];
	$branchCode_1st=$_POST['branchCode_1st'];
	$branchCode_2nd=$_POST['branchCode_2nd'];
	$Amt_1st=$_POST['Amt_1st'];
	$Amt_2nd=$_POST['Amt_2nd'];
	$RTGS_input_M=$_POST['RTGS_input_M'];
	$RTGS_input_S1=$_POST['RTGS_input_S1'];
	$RTGS_input_S2=$_POST['RTGS_input_S2'];
	$RTGS_input_S3=$_POST['RTGS_input_S3'];
	$RTGS_input_S4=$_POST['RTGS_input_S4'];
	$RTGS_input_S5=$_POST['RTGS_input_S5'];
	$RTGS_input_S6=$_POST['RTGS_input_S6'];
	$RTGS_input_S7=$_POST['RTGS_input_S7'];
	$RTGS_input_S8=$_POST['RTGS_input_S8'];
	$RTGS_output_M=$_POST['RTGS_output_M'];
	$RTGS_output_S1=$_POST['RTGS_output_S1'];
	$RTGS_output_S2=$_POST['RTGS_output_S2'];
	$RTGS_output_S3=$_POST['RTGS_output_S3'];
	$RTGS_output_S4=$_POST['RTGS_output_S4'];
	$RTGS_output_S5=$_POST['RTGS_output_S5'];
	$RTGS_output_S6=$_POST['RTGS_output_S6'];
	$RTGS_output_S7=$_POST['RTGS_output_S7'];
	$RTGS_output_S8=$_POST['RTGS_output_S8'];
	$RTGS_RBI_M=$_POST['RTGS_RBI_M'];
	$RTGS_RBI_S1=$_POST['RTGS_RBI_S1'];
	$RTGS_RBI_S2=$_POST['RTGS_RBI_S2'];
	$RTGS_RBI_S3=$_POST['RTGS_RBI_S3'];
	$RTGS_RBI_S4=$_POST['RTGS_RBI_S4'];
	$RTGS_RBI_S5=$_POST['RTGS_RBI_S5'];
	$RTGS_RBI_S6=$_POST['RTGS_RBI_S6'];
	$RTGS_RBI_S7=$_POST['RTGS_RBI_S7'];
	$RTGS_RBI_S8=$_POST['RTGS_RBI_S8'];
	$RTGS_ACK_M=$_POST['RTGS_ACK_M'];
	$RTGS_ACK_S1=$_POST['RTGS_ACK_S1'];
	$RTGS_ACK_S2=$_POST['RTGS_ACK_S2'];
	$RTGS_ACK_S3=$_POST['RTGS_ACK_S3'];
	$RTGS_ACK_S4=$_POST['RTGS_ACK_S4'];
	$RTGS_ACK_S5=$_POST['RTGS_ACK_S5'];
	$RTGS_ACK_S6=$_POST['RTGS_ACK_S6'];
	$RTGS_ACK_S7=$_POST['RTGS_ACK_S7'];
	$RTGS_ACK_S8=$_POST['RTGS_ACK_S8'];
	$time=implode($_POST['time'],",");
	$status='1';
	$Maker=implode($_POST['Maker'],",");
	$Checker=implode($_POST['Checker'],",");
	$crrdate = mflags();
	$ma=substr_count($Maker,",,");
	$ck=substr_count($Checker,",,");
	$tm=substr_count($time,",,");

	$query = mysql_query("select * from checklist_pg02 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
	$query1 = mysql_query("select * from checklist_pg02 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
	if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
	}
	elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg02'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
			}
			else{
				$sql = mysql_query ("update checklist_pg02 set SY0080_proTime_M = '$SY0080_proTime_M', SY0080_proTime_S1 = '$SY0080_proTime_S1', 
				SY0080_proTime_S2 = '$SY0080_proTime_S2', SY0080_proTime_S3 = '$SY0080_proTime_S3', SY0080_proTime_S4 = '$SY0080_proTime_S4', 
				SY0080_proTime_S5 = '$SY0080_proTime_S5', SY0080_proTime_S6 = '$SY0080_proTime_S6', SY0080_proTime_S7 = '$SY0080_proTime_S7', 
				SY0080_proTime_S8 = '$SY0080_proTime_S8', SY0004_proTime_M = '$SY0004_proTime_M', SY0004_proTime_S1 = '$SY0004_proTime_S1', 
				SY0004_proTime_S2 = '$SY0004_proTime_S2', SY0004_proTime_S3 = '$SY0004_proTime_S3', SY0004_proTime_S4 = '$SY0004_proTime_S4',
				SY0004_proTime_S5 = '$SY0004_proTime_S5', SY0004_proTime_S6 = '$SY0004_proTime_S6', SY0004_proTime_S7 = '$SY0004_proTime_S7',
				SY0004_proTime_S8 = '$SY0004_proTime_S8', SY0005_proTime_M = '$SY0005_proTime_M', SY0005_proTime_S1 = '$SY0005_proTime_S1',
				SY0005_proTime_S2 = '$SY0005_proTime_S2', SY0005_proTime_S3 = '$SY0005_proTime_S3', SY0005_proTime_S4 = '$SY0005_proTime_S4',
				SY0005_proTime_S5 = '$SY0005_proTime_S5', SY0005_proTime_S6 = '$SY0005_proTime_S6', SY0005_proTime_S7 = '$SY0005_proTime_S7',
				SY0005_proTime_S8 = '$SY0005_proTime_S8', SY0080_Id_M = '$SY0080_Id_M', SY0080_Id_S1 = '$SY0080_Id_S1', SY0080_Id_S2 = '$SY0080_Id_S2', SY0080_Id_S3 = '$SY0080_Id_S3', SY0080_Id_S4 = '$SY0080_Id_S4', SY0080_Id_S5 = '$SY0080_Id_S5', SY0080_Id_S6 = '$SY0080_Id_S6',
				SY0080_Id_S7 = '$SY0080_Id_S7', SY0080_Id_S8 = '$SY0080_Id_S8', SY0004_Id_M = '$SY0004_Id_M', SY0004_Id_S1 = '$SY0004_Id_S1', 
				SY0004_Id_S2 = '$SY0004_Id_S2', SY0004_Id_S3 = '$SY0004_Id_S3', SY0004_Id_S4 = '$SY0004_Id_S4', SY0004_Id_S5 = '$SY0004_Id_S5', 
				SY0004_Id_S6 = '$SY0004_Id_S6', SY0004_Id_S7 = '$SY0004_Id_S7', SY0004_Id_S8 = '$SY0004_Id_S8', SY0005_Id_M = '$SY0005_Id_M', 
				SY0005_Id_S1 = '$SY0005_Id_S1', SY0005_Id_S2 = '$SY0005_Id_S2', SY0005_Id_S3 = '$SY0005_Id_S3', SY0005_Id_S4 = '$SY0005_Id_S4',
				SY0005_Id_S5 = '$SY0005_Id_S5', SY0005_Id_S6 = '$SY0005_Id_S6', SY0005_Id_S7 = '$SY0005_Id_S7', SY0005_Id_S8 = '$SY0005_Id_S8', 
				CBS_cutOff_time = '$CBS_cutOff_time', CutOff_M = '$CutOff_M', CutOff_S1 = '$CutOff_S1', CutOff_S2 = '$CutOff_S2', CutOff_S3 = '$CutOff_S3', CutOff_S4 = '$CutOff_S4', CutOff_S5 = '$CutOff_S5', CutOff_S6 = '$CutOff_S6', CutOff_S7 = '$CutOff_S7', CutOff_S8 = '$CutOff_S8', 
				Log_time = '$Log_time', RC_Code = '$RC_Code', Oracle_Code = '$Oracle_Code', LogTime = '$LogTime', RCCode = '$RCCode', 
				ORACode = '$ORACode', RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3 = '$ORA_S3', ORA_S4 = '$ORA_S4', 
				ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', ORA_S8 = '$ORA_S8', branchCode_1st = '$branchCode_1st', 
				branchCode_2nd = '$branchCode_2nd', Amt_1st = '$Amt_1st', Amt_2nd = '$Amt_2nd',  RTGS_input_M = '$RTGS_input_M', RTGS_input_S1 = '$RTGS_input_S1', RTGS_input_S2 = '$RTGS_input_S2', RTGS_input_S3 = '$RTGS_input_S3', RTGS_input_S4 = '$RTGS_input_S4', RTGS_input_S5 = '$RTGS_input_S5', RTGS_input_S6 = '$RTGS_input_S6', RTGS_input_S7 = '$RTGS_input_S7', RTGS_input_S8 = '$RTGS_input_S8', RTGS_output_M = '$RTGS_output_M', RTGS_output_S1 = '$RTGS_output_S1', RTGS_output_S2 = '$RTGS_output_S2', RTGS_output_S3 = '$RTGS_output_S3', RTGS_output_S4 = '$RTGS_output_S4', RTGS_output_S5 = '$RTGS_output_S5', RTGS_output_S6 = '$RTGS_output_S6', RTGS_output_S7 = '$RTGS_output_S7', RTGS_output_S8 = '$RTGS_output_S8', 
				RTGS_RBI_M = '$RTGS_RBI_M', RTGS_RBI_S1 = '$RTGS_RBI_S1', RTGS_RBI_S2 = '$RTGS_RBI_S2', RTGS_RBI_S3 = '$RTGS_RBI_S3', RTGS_RBI_S4 = '$RTGS_RBI_S4', RTGS_RBI_S5 = '$RTGS_RBI_S5', RTGS_RBI_S6 = '$RTGS_RBI_S6', RTGS_RBI_S7 = '$RTGS_RBI_S7', RTGS_RBI_S8 = '$RTGS_RBI_S8', 
				RTGS_ACK_M = '$RTGS_ACK_M', RTGS_ACK_S1 = '$RTGS_ACK_S1', RTGS_ACK_S2 = '$RTGS_ACK_S2', RTGS_ACK_S3 = '$RTGS_ACK_S3', RTGS_ACK_S4 = '$RTGS_ACK_S4', RTGS_ACK_S5 = '$RTGS_ACK_S5', RTGS_ACK_S6 = '$RTGS_ACK_S6', RTGS_ACK_S7 = '$RTGS_ACK_S7', RTGS_ACK_S8 = '$RTGS_ACK_S8', time = '$time', 
				Maker = '$Maker', Checker = '$Checker', freeze = '1', RcErrorWithJob = '$RcErrorWithJob' 
				where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		else { 
			$sql1 = mysql_query("update checklist_pg02 set SY0080_proTime_M = '$SY0080_proTime_M', SY0080_proTime_S1 = '$SY0080_proTime_S1', 
				SY0080_proTime_S2 = '$SY0080_proTime_S2', SY0080_proTime_S3 = '$SY0080_proTime_S3', SY0080_proTime_S4 = '$SY0080_proTime_S4', 
				SY0080_proTime_S5 = '$SY0080_proTime_S5', SY0080_proTime_S6 = '$SY0080_proTime_S6', SY0080_proTime_S7 = '$SY0080_proTime_S7', 
				SY0080_proTime_S8 = '$SY0080_proTime_S8', SY0004_proTime_M = '$SY0004_proTime_M', SY0004_proTime_S1 = '$SY0004_proTime_S1', 
				SY0004_proTime_S2 = '$SY0004_proTime_S2', SY0004_proTime_S3 = '$SY0004_proTime_S3', SY0004_proTime_S4 = '$SY0004_proTime_S4',
				SY0004_proTime_S5 = '$SY0004_proTime_S5', SY0004_proTime_S6 = '$SY0004_proTime_S6', SY0004_proTime_S7 = '$SY0004_proTime_S7',
				SY0004_proTime_S8 = '$SY0004_proTime_S8', SY0005_proTime_M = '$SY0005_proTime_M', SY0005_proTime_S1 = '$SY0005_proTime_S1',
				SY0005_proTime_S2 = '$SY0005_proTime_S2', SY0005_proTime_S3 = '$SY0005_proTime_S3', SY0005_proTime_S4 = '$SY0005_proTime_S4',
				SY0005_proTime_S5 = '$SY0005_proTime_S5', SY0005_proTime_S6 = '$SY0005_proTime_S6', SY0005_proTime_S7 = '$SY0005_proTime_S7',
				SY0005_proTime_S8 = '$SY0005_proTime_S8', SY0080_Id_M = '$SY0080_Id_M', SY0080_Id_S1 = '$SY0080_Id_S1', SY0080_Id_S2 = '$SY0080_Id_S2', SY0080_Id_S3 = '$SY0080_Id_S3', SY0080_Id_S4 = '$SY0080_Id_S4', SY0080_Id_S5 = '$SY0080_Id_S5', SY0080_Id_S6 = '$SY0080_Id_S6',
				SY0080_Id_S7 = '$SY0080_Id_S7', SY0080_Id_S8 = '$SY0080_Id_S8', SY0004_Id_M = '$SY0004_Id_M', SY0004_Id_S1 = '$SY0004_Id_S1', 
				SY0004_Id_S2 = '$SY0004_Id_S2', SY0004_Id_S3 = '$SY0004_Id_S3', SY0004_Id_S4 = '$SY0004_Id_S4', SY0004_Id_S5 = '$SY0004_Id_S5', 
				SY0004_Id_S6 = '$SY0004_Id_S6', SY0004_Id_S7 = '$SY0004_Id_S7', SY0004_Id_S8 = '$SY0004_Id_S8', SY0005_Id_M = '$SY0005_Id_M', 
				SY0005_Id_S1 = '$SY0005_Id_S1', SY0005_Id_S2 = '$SY0005_Id_S2', SY0005_Id_S3 = '$SY0005_Id_S3', SY0005_Id_S4 = '$SY0005_Id_S4',
				SY0005_Id_S5 = '$SY0005_Id_S5', SY0005_Id_S6 = '$SY0005_Id_S6', SY0005_Id_S7 = '$SY0005_Id_S7', SY0005_Id_S8 = '$SY0005_Id_S8', 
				CBS_cutOff_time = '$CBS_cutOff_time', CutOff_M = '$CutOff_M', CutOff_S1 = '$CutOff_S1', CutOff_S2 = '$CutOff_S2', CutOff_S3 = '$CutOff_S3', CutOff_S4 = '$CutOff_S4', CutOff_S5 = '$CutOff_S5', CutOff_S6 = '$CutOff_S6', CutOff_S7 = '$CutOff_S7', CutOff_S8 = '$CutOff_S8', 
				Log_time = '$Log_time', RC_Code = '$RC_Code', Oracle_Code = '$Oracle_Code', LogTime = '$LogTime', RCCode = '$RCCode', 
				ORACode = '$ORACode', RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3 = '$ORA_S3', ORA_S4 = '$ORA_S4', 
				ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', ORA_S8 = '$ORA_S8', branchCode_1st = '$branchCode_1st', 
				branchCode_2nd = '$branchCode_2nd', Amt_1st = '$Amt_1st', Amt_2nd = '$Amt_2nd',  RTGS_input_M = '$RTGS_input_M', RTGS_input_S1 = '$RTGS_input_S1', RTGS_input_S2 = '$RTGS_input_S2', RTGS_input_S3 = '$RTGS_input_S3', RTGS_input_S4 = '$RTGS_input_S4', RTGS_input_S5 = '$RTGS_input_S5', RTGS_input_S6 = '$RTGS_input_S6', RTGS_input_S7 = '$RTGS_input_S7', RTGS_input_S8 = '$RTGS_input_S8', RTGS_output_M = '$RTGS_output_M', RTGS_output_S1 = '$RTGS_output_S1', RTGS_output_S2 = '$RTGS_output_S2', RTGS_output_S3 = '$RTGS_output_S3', RTGS_output_S4 = '$RTGS_output_S4', RTGS_output_S5 = '$RTGS_output_S5', RTGS_output_S6 = '$RTGS_output_S6', RTGS_output_S7 = '$RTGS_output_S7', RTGS_output_S8 = '$RTGS_output_S8', 
				RTGS_RBI_M = '$RTGS_RBI_M', RTGS_RBI_S1 = '$RTGS_RBI_S1', RTGS_RBI_S2 = '$RTGS_RBI_S2', RTGS_RBI_S3 = '$RTGS_RBI_S3', RTGS_RBI_S4 = '$RTGS_RBI_S4', RTGS_RBI_S5 = '$RTGS_RBI_S5', RTGS_RBI_S6 = '$RTGS_RBI_S6', RTGS_RBI_S7 = '$RTGS_RBI_S7', RTGS_RBI_S8 = '$RTGS_RBI_S8', 
				RTGS_ACK_M = '$RTGS_ACK_M', RTGS_ACK_S1 = '$RTGS_ACK_S1', RTGS_ACK_S2 = '$RTGS_ACK_S2', RTGS_ACK_S3 = '$RTGS_ACK_S3', RTGS_ACK_S4 = '$RTGS_ACK_S4', RTGS_ACK_S5 = '$RTGS_ACK_S5', RTGS_ACK_S6 = '$RTGS_ACK_S6', RTGS_ACK_S7 = '$RTGS_ACK_S7', RTGS_ACK_S8 = '$RTGS_ACK_S8', time = '$time', 
				Maker = '$Maker', Checker = '$Checker', RcErrorWithJob = '$RcErrorWithJob' 
				where status='1' && Inst_Date='$crrdate'");
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	else {
		if(isset($_POST['submit_pg02'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			
			$sql1 = mysql_query ("INSERT INTO checklist_pg02 ( SY0080_proTime_M, SY0080_proTime_S1, SY0080_proTime_S2, SY0080_proTime_S3, SY0080_proTime_S4, SY0080_proTime_S5, SY0080_proTime_S6, SY0080_proTime_S7, SY0080_proTime_S8, 
			SY0004_proTime_M, SY0004_proTime_S1, SY0004_proTime_S2, SY0004_proTime_S3, SY0004_proTime_S4, SY0004_proTime_S5, SY0004_proTime_S6, SY0004_proTime_S7, SY0004_proTime_S8, 
			SY0005_proTime_M, SY0005_proTime_S1, SY0005_proTime_S2, SY0005_proTime_S3, SY0005_proTime_S4, SY0005_proTime_S5, SY0005_proTime_S6, SY0005_proTime_S7, SY0005_proTime_S8, 
			SY0080_Id_M, SY0080_Id_S1, SY0080_Id_S2, SY0080_Id_S3, SY0080_Id_S4, SY0080_Id_S5, SY0080_Id_S6, SY0080_Id_S7, SY0080_Id_S8, 
			SY0004_Id_M, SY0004_Id_S1, SY0004_Id_S2, SY0004_Id_S3, SY0004_Id_S4, SY0004_Id_S5, SY0004_Id_S6, SY0004_Id_S7, SY0004_Id_S8, 
			SY0005_Id_M, SY0005_Id_S1, SY0005_Id_S2, SY0005_Id_S3, SY0005_Id_S4, SY0005_Id_S5, SY0005_Id_S6, SY0005_Id_S7, SY0005_Id_S8, 
			CBS_cutOff_time, CutOff_M, CutOff_S1, CutOff_S2, CutOff_S3, CutOff_S4, CutOff_S5, CutOff_S6, CutOff_S7, CutOff_S8, 
			Log_time, RC_Code, Oracle_Code, LogTime, RCCode, ORACode, RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, 
			branchCode_1st, branchCode_2nd, Amt_1st, Amt_2nd, 
			RTGS_input_M, RTGS_input_S1, RTGS_input_S2, RTGS_input_S3, RTGS_input_S4, RTGS_input_S5, RTGS_input_S6, RTGS_input_S7, RTGS_input_S8, 
			RTGS_output_M, RTGS_output_S1, RTGS_output_S2, RTGS_output_S3, RTGS_output_S4, RTGS_output_S5, RTGS_output_S6, RTGS_output_S7, RTGS_output_S8, 
			RTGS_RBI_M, RTGS_RBI_S1, RTGS_RBI_S2,RTGS_RBI_S3, RTGS_RBI_S4, RTGS_RBI_S5, RTGS_RBI_S6, RTGS_RBI_S7, RTGS_RBI_S8, 
			RTGS_ACK_M, RTGS_ACK_S1, RTGS_ACK_S2, RTGS_ACK_S3, RTGS_ACK_S4, RTGS_ACK_S5, RTGS_ACK_S6, RTGS_ACK_S7, RTGS_ACK_S8, time, status, Maker, Checker, Inst_Date, RcErrorWithJob)
			VALUES ( '$SY0080_proTime_M', '$SY0080_proTime_S1', '$SY0080_proTime_S2', '$SY0080_proTime_S3', '$SY0080_proTime_S4', '$SY0080_proTime_S5', 
			'$SY0080_proTime_S6', '$SY0080_proTime_S7', '$SY0080_proTime_S8', 
			'$SY0004_proTime_M', '$SY0004_proTime_S1', '$SY0004_proTime_S2', '$SY0004_proTime_S3', '$SY0004_proTime_S4', '$SY0004_proTime_S5', 
			'$SY0004_proTime_S6', '$SY0004_proTime_S7', '$SY0004_proTime_S8', 
			'$SY0005_proTime_M', '$SY0005_proTime_S1', '$SY0005_proTime_S2', '$SY0005_proTime_S3', '$SY0005_proTime_S4', '$SY0005_proTime_S5', 
			'$SY0005_proTime_S6', '$SY0005_proTime_S7', '$SY0005_proTime_S8', 
			'$SY0080_Id_M', '$SY0080_Id_S1', '$SY0080_Id_S2', '$SY0080_Id_S3', '$SY0080_Id_S4', '$SY0080_Id_S5', '$SY0080_Id_S6', '$SY0080_Id_S7', '$SY0080_Id_S8', 
			'$SY0004_Id_M', '$SY0004_Id_S1', '$SY0004_Id_S2', '$SY0004_Id_S3', '$SY0004_Id_S4', '$SY0004_Id_S5', '$SY0004_Id_S6', '$SY0004_Id_S7', '$SY0004_Id_S8', 
			'$SY0005_Id_M', '$SY0005_Id_S1', '$SY0005_Id_S2', '$SY0005_Id_S3', '$SY0005_Id_S4', '$SY0005_Id_S5', '$SY0005_Id_S6', '$SY0005_Id_S7', '$SY0005_Id_S8', 
			'$CBS_cutOff_time', '$CutOff_M', '$CutOff_S1', '$CutOff_S2', '$CutOff_S3', '$CutOff_S4', '$CutOff_S5', '$CutOff_S6', '$CutOff_S7', '$CutOff_S8', 
			'$Log_time', '$RC_Code', '$Oracle_Code', '$LogTime', '$RCCode', '$ORACode', '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', 
			'$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', 
			'$branchCode_1st', '$branchCode_2nd', '$Amt_1st', '$Amt_2nd', 
			'$RTGS_input_M', '$RTGS_input_S1', '$RTGS_input_S2', '$RTGS_input_S3', '$RTGS_input_S4', '$RTGS_input_S5', '$RTGS_input_S6', '$RTGS_input_S7',
			'$RTGS_input_S8', 
			'$RTGS_output_M', '$RTGS_output_S1', '$RTGS_output_S2', '$RTGS_output_S3', '$RTGS_output_S4', '$RTGS_output_S5', '$RTGS_output_S6', '$RTGS_output_S7',
			'$RTGS_output_S8', 
			'$RTGS_RBI_M', '$RTGS_RBI_S1', '$RTGS_RBI_S2', '$RTGS_RBI_S3', '$RTGS_RBI_S4', '$RTGS_RBI_S5', '$RTGS_RBI_S6', '$RTGS_RBI_S7', '$RTGS_RBI_S8', 
			'$RTGS_ACK_M', '$RTGS_ACK_S1', '$RTGS_ACK_S2', '$RTGS_ACK_S3', '$RTGS_ACK_S4', '$RTGS_ACK_S5', '$RTGS_ACK_S6', '$RTGS_ACK_S7', '$RTGS_ACK_S8', '$time', '$status', '$Maker', '$Checker', '$crrdate', '$RcErrorWithJob') " );
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}


/*<!------------------------------------------------Checklist Page 03--------------------------------------------->*/
if(isset($_POST['save_pg03']) || isset($_POST['submit_pg03']))
	{ 
		$pend_file_M=$_POST['pend_file_M'];	
		$pend_file_S1=$_POST['pend_file_S1'];	
		$pend_file_S2=$_POST['pend_file_S2'];	
		$pend_file_S3=$_POST['pend_file_S3'];	
		$pend_file_S4=$_POST['pend_file_S4'];	
		$pend_file_S5=$_POST['pend_file_S5'];	
		$pend_file_S6=$_POST['pend_file_S6'];	
		$pend_file_S7=$_POST['pend_file_S7'];	
		$pend_file_S8=$_POST['pend_file_S8'];	
		$bulkFile_M_NFI=$_POST['bulkFile_M_NFI'];	
		$bulkFile_S1_NFI=$_POST['bulkFile_S1_NFI'];	
		$bulkFile_S2_NFI=$_POST['bulkFile_S2_NFI'];	
		$bulkFile_S3_NFI=$_POST['bulkFile_S3_NFI'];	
		$bulkFile_S4_NFI=$_POST['bulkFile_S4_NFI'];	
		$bulkFile_S5_NFI=$_POST['bulkFile_S5_NFI'];	
		$bulkFile_S6_NFI=$_POST['bulkFile_S6_NFI'];	
		$bulkFile_S7_NFI=$_POST['bulkFile_S7_NFI'];	
		$bulkFile_S8_NFI=$_POST['bulkFile_S8_NFI'];	
		$bulkFile_M_NFT=$_POST['bulkFile_M_NFT'];	
		$bulkFile_S1_NFT=$_POST['bulkFile_S1_NFT'];	
		$bulkFile_S2_NFT=$_POST['bulkFile_S2_NFT'];	
		$bulkFile_S3_NFT=$_POST['bulkFile_S3_NFT'];	
		$bulkFile_S4_NFT=$_POST['bulkFile_S4_NFT'];	
		$bulkFile_S5_NFT=$_POST['bulkFile_S5_NFT'];	
		$bulkFile_S6_NFT=$_POST['bulkFile_S6_NFT'];	
		$bulkFile_S7_NFT=$_POST['bulkFile_S7_NFT'];	
		$bulkFile_S8_NFT=$_POST['bulkFile_S8_NFT'];	
		$bulkFile_M_BNE=$_POST['bulkFile_M_BNE'];	
		$bulkFile_S1_BNE=$_POST['bulkFile_S1_BNE'];	
		$bulkFile_S2_BNE=$_POST['bulkFile_S2_BNE'];	
		$bulkFile_S3_BNE=$_POST['bulkFile_S3_BNE'];	
		$bulkFile_S4_BNE=$_POST['bulkFile_S4_BNE'];	
		$bulkFile_S5_BNE=$_POST['bulkFile_S5_BNE'];	
		$bulkFile_S6_BNE=$_POST['bulkFile_S6_BNE'];	
		$bulkFile_S7_BNE=$_POST['bulkFile_S7_BNE'];	
		$bulkFile_S8_BNE=$_POST['bulkFile_S8_BNE'];	
		$bulkFile_M_BRT=$_POST['bulkFile_M_BRT'];	
		$bulkFile_S1_BRT=$_POST['bulkFile_S1_BRT'];	
		$bulkFile_S2_BRT=$_POST['bulkFile_S2_BRT'];	
		$bulkFile_S3_BRT=$_POST['bulkFile_S3_BRT'];	
		$bulkFile_S4_BRT=$_POST['bulkFile_S4_BRT'];	
		$bulkFile_S5_BRT=$_POST['bulkFile_S5_BRT'];	
		$bulkFile_S6_BRT=$_POST['bulkFile_S6_BRT'];	
		$bulkFile_S7_BRT=$_POST['bulkFile_S7_BRT'];	
		$bulkFile_S8_BRT=$_POST['bulkFile_S8_BRT'];	
		$bulkFile_M_RTG=$_POST['bulkFile_M_RTG'];	
		$bulkFile_S1_RTG=$_POST['bulkFile_S1_RTG'];	
		$bulkFile_S2_RTG=$_POST['bulkFile_S2_RTG'];	
		$bulkFile_S3_RTG=$_POST['bulkFile_S3_RTG'];	
		$bulkFile_S4_RTG=$_POST['bulkFile_S4_RTG'];	
		$bulkFile_S5_RTG=$_POST['bulkFile_S5_RTG'];	
		$bulkFile_S6_RTG=$_POST['bulkFile_S6_RTG'];	
		$bulkFile_S7_RTG=$_POST['bulkFile_S7_RTG'];	
		$bulkFile_S8_RTG=$_POST['bulkFile_S8_RTG'];	
		$sendCount_M =$_POST['sendCount_M'];
		$sendCount_S1=$_POST['sendCount_S1'];
		$sendCount_S2=$_POST['sendCount_S2'];
		$sendCount_S3=$_POST['sendCount_S3'];
		$sendCount_S4=$_POST['sendCount_S4'];
		$sendCount_S5=$_POST['sendCount_S5'];
		$sendCount_S6=$_POST['sendCount_S6'];
		$sendCount_S7=$_POST['sendCount_S7'];
		$sendCount_S8=$_POST['sendCount_S8'];
		/*$bulkFile_M_BGT=$_POST['bulkFile_M_BGT'];
		$bulkFile_S1_BGT=$_POST['bulkFile_S1_BGT'];
		$bulkFile_S2_BGT=$_POST['bulkFile_S2_BGT'];
		$bulkFile_S3_BGT=$_POST['bulkFile_S3_BGT'];
		$bulkFile_S4_BGT=$_POST['bulkFile_S4_BGT'];
		$bulkFile_S5_BGT=$_POST['bulkFile_S5_BGT'];
		$bulkFile_S6_BGT=$_POST['bulkFile_S6_BGT'];
		$bulkFile_S7_BGT=$_POST['bulkFile_S7_BGT'];
		$bulkFile_S8_BGT=$_POST['bulkFile_S8_BGT'];*/
		$pendCount_NEFT_M=$_POST['pendCount_NEFT_M'];
		$pendCount_NEFT_S1=$_POST['pendCount_NEFT_S1'];
		$pendCount_NEFT_S2=$_POST['pendCount_NEFT_S2'];
		$pendCount_NEFT_S3=$_POST['pendCount_NEFT_S3'];
		$pendCount_NEFT_S4=$_POST['pendCount_NEFT_S4'];
		$pendCount_NEFT_S5=$_POST['pendCount_NEFT_S5'];
		$pendCount_NEFT_S6=$_POST['pendCount_NEFT_S6'];
		$pendCount_NEFT_S7=$_POST['pendCount_NEFT_S7'];
		$pendCount_NEFT_S8=$_POST['pendCount_NEFT_S8'];
		/*$pendCount_GRPT_M=$_POST['pendCount_GRPT_M'];
		$pendCount_GRPT_S1=$_POST['pendCount_GRPT_S1'];
		$pendCount_GRPT_S2=$_POST['pendCount_GRPT_S2'];
		$pendCount_GRPT_S3=$_POST['pendCount_GRPT_S3'];
		$pendCount_GRPT_S4=$_POST['pendCount_GRPT_S4'];
		$pendCount_GRPT_S5=$_POST['pendCount_GRPT_S5'];
		$pendCount_GRPT_S6=$_POST['pendCount_GRPT_S6'];
		$pendCount_GRPT_S7=$_POST['pendCount_GRPT_S7'];
		$pendCount_GRPT_S8=$_POST['pendCount_GRPT_S8'];*/
		$pendCount_TrickleFeed_M=$_POST['pendCount_TrickleFeed_M'];
		$pendCount_TrickleFeed_S1=$_POST['pendCount_TrickleFeed_S1'];
		$pendCount_TrickleFeed_S2=$_POST['pendCount_TrickleFeed_S2'];
		$pendCount_TrickleFeed_S3=$_POST['pendCount_TrickleFeed_S3'];
		$pendCount_TrickleFeed_S4=$_POST['pendCount_TrickleFeed_S4'];
		$pendCount_TrickleFeed_S5=$_POST['pendCount_TrickleFeed_S5'];
		$pendCount_TrickleFeed_S6=$_POST['pendCount_TrickleFeed_S6'];
		$pendCount_TrickleFeed_S7=$_POST['pendCount_TrickleFeed_S7'];
		$pendCount_TrickleFeed_S8=$_POST['pendCount_TrickleFeed_S8'];
		$OCR_pendCount=$_POST['OCR_pendCount'];
		$idSpool_M=$_POST['idSpool_M'];
		$idSpool_S1=$_POST['idSpool_S1'];
		$idSpool_S2=$_POST['idSpool_S2'];
		$idSpool_S3=$_POST['idSpool_S3'];
		$idSpool_S4=$_POST['idSpool_S4'];
		$idSpool_S5=$_POST['idSpool_S5'];
		$idSpool_S6=$_POST['idSpool_S6'];
		$idSpool_S7=$_POST['idSpool_S7'];
		$idSpool_S8=$_POST['idSpool_S8'];
		$isSpool_M=$_POST['isSpool_M'];
		$isSpool_S1=$_POST['isSpool_S1'];
		$isSpool_S2=$_POST['isSpool_S2'];
		$isSpool_S3=$_POST['isSpool_S3'];
		$isSpool_S4=$_POST['isSpool_S4'];
		$isSpool_S5=$_POST['isSpool_S5'];
		$isSpool_S6=$_POST['isSpool_S6'];
		$isSpool_S7=$_POST['isSpool_S7'];
		$isSpool_S8=$_POST['isSpool_S8'];
		$lSpool_M=$_POST['lSpool_M'];
		$lSpool_S1=$_POST['lSpool_S1'];
		$lSpool_S2=$_POST['lSpool_S2'];
		$lSpool_S3=$_POST['lSpool_S3'];
		$lSpool_S4=$_POST['lSpool_S4'];
		$lSpool_S5=$_POST['lSpool_S5'];
		$lSpool_S6=$_POST['lSpool_S6'];
		$lSpool_S7=$_POST['lSpool_S7'];
		$lSpool_S8=$_POST['lSpool_S8'];
		$lSysout_M=$_POST['lSysout_M'];
		$lSysout_S1=$_POST['lSysout_S1'];
		$lSysout_S2=$_POST['lSysout_S2'];
		$lSysout_S3=$_POST['lSysout_S3'];
		$lSysout_S4=$_POST['lSysout_S4'];
		$lSysout_S5=$_POST['lSysout_S5'];
		$lSysout_S6=$_POST['lSysout_S6'];
		$lSysout_S7=$_POST['lSysout_S7'];
		$lSysout_S8=$_POST['lSysout_S8'];
		$isSysout_M=$_POST['isSysout_M'];
		$isSysout_S1=$_POST['isSysout_S1'];
		$isSysout_S2=$_POST['isSysout_S2'];
		$isSysout_S3=$_POST['isSysout_S3'];
		$isSysout_S4=$_POST['isSysout_S4'];
		$isSysout_S5=$_POST['isSysout_S5'];
		$isSysout_S6=$_POST['isSysout_S6'];
		$isSysout_S7=$_POST['isSysout_S7'];
		$isSysout_S8=$_POST['isSysout_S8'];
		$idSysout_M=$_POST['idSysout_M'];
		$idSysout_S1=$_POST['idSysout_S1'];
		$idSysout_S2=$_POST['idSysout_S2'];
		$idSysout_S3=$_POST['idSysout_S3'];
		$idSysout_S4=$_POST['idSysout_S4'];
		$idSysout_S5=$_POST['idSysout_S5'];
		$idSysout_S6=$_POST['idSysout_S6'];
		$idSysout_S7=$_POST['idSysout_S7'];
		$idSysout_S8=$_POST['idSysout_S8'];
		$adhoc_pendCount=$_POST['adhoc_pendCount'];
		$JR_pendCount=$_POST['JR_pendCount'];
		$mail_pendCount=$_POST['mail_pendCount'];
		$job_pend=$_POST['job_pend'];
		$time=implode($_POST['time'],",");
		$Maker=implode($_POST['Maker'],",");
		$Checker=implode($_POST['Checker'],",");
		$status='1';
		$crrdate = mflags();
		$ma=substr_count($Maker,",,");
		$ck=substr_count($Checker,",,");
		$tm=substr_count($time,",,");
		
		$query = mysql_query("select * from checklist_pg03 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg03 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
			echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
			if(isset($_POST['submit_pg03'])){
				if(($ma > 0) || ($ck > 0) || ($tm > 0)){
					echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
				}
				else{
				$sql = mysql_query ("update checklist_pg03 set pend_file_M = '$pend_file_M', pend_file_S1 = '$pend_file_S1', pend_file_S2 = '$pend_file_S2', pend_file_S3 = '$pend_file_S3', pend_file_S4 = '$pend_file_S4', pend_file_S5 = '$pend_file_S5', pend_file_S6 = '$pend_file_S6', 
				pend_file_S7 = '$pend_file_S7', pend_file_S8 = '$pend_file_S8', bulkFile_M_NFI = '$bulkFile_M_NFI', bulkFile_S1_NFI = '$bulkFile_S1_NFI', bulkFile_S2_NFI = '$bulkFile_S2_NFI', bulkFile_S3_NFI = '$bulkFile_S3_NFI', bulkFile_S4_NFI = '$bulkFile_S4_NFI', 
				bulkFile_S5_NFI = '$bulkFile_S5_NFI', bulkFile_S6_NFI = '$bulkFile_S6_NFI', bulkFile_S7_NFI = '$bulkFile_S7_NFI', 
				bulkFile_S8_NFI = '$bulkFile_S8_NFI', bulkFile_M_NFT = '$bulkFile_M_NFT', bulkFile_S1_NFT = '$bulkFile_S1_NFT', 
				bulkFile_S2_NFT = '$bulkFile_S2_NFT', bulkFile_S3_NFT = '$bulkFile_S3_NFT', bulkFile_S4_NFT = '$bulkFile_S4_NFT', 
				bulkFile_S5_NFT = '$bulkFile_S5_NFT', bulkFile_S6_NFT = '$bulkFile_S6_NFT', bulkFile_S7_NFT = '$bulkFile_S7_NFT', 
				bulkFile_S8_NFT = '$bulkFile_S8_NFT', bulkFile_M_BNE = '$bulkFile_M_BNE', bulkFile_S1_BNE = '$bulkFile_S1_BNE', 
				bulkFile_S2_BNE = '$bulkFile_S2_BNE', bulkFile_S3_BNE = '$bulkFile_S3_BNE', bulkFile_S4_BNE = '$bulkFile_S4_BNE', 
				bulkFile_S5_BNE = '$bulkFile_S5_BNE', bulkFile_S6_BNE = '$bulkFile_S6_BNE', bulkFile_S7_BNE = '$bulkFile_S7_BNE', 
				bulkFile_S8_BNE = '$bulkFile_S8_BNE', bulkFile_M_BRT = '$bulkFile_M_BRT', bulkFile_S1_BRT = '$bulkFile_S1_BRT', 
				bulkFile_S2_BRT = '$bulkFile_S2_BRT', bulkFile_S3_BRT = '$bulkFile_S3_BRT', bulkFile_S4_BRT = '$bulkFile_S4_BRT', 
				bulkFile_S5_BRT = '$bulkFile_S5_BRT', bulkFile_S6_BRT = '$bulkFile_S6_BRT', bulkFile_S7_BRT = '$bulkFile_S7_BRT', 
				bulkFile_S8_BRT = '$bulkFile_S8_BRT',bulkFile_M_RTG = '$bulkFile_M_RTG', bulkFile_S1_RTG = '$bulkFile_S1_RTG', 
				bulkFile_S2_RTG = '$bulkFile_S2_RTG',bulkFile_S3_RTG = '$bulkFile_S3_RTG', bulkFile_S4_RTG = '$bulkFile_S4_RTG',
				bulkFile_S5_RTG = '$bulkFile_S5_RTG', bulkFile_S6_RTG =  '$bulkFile_S6_RTG', bulkFile_S7_RTG =  '$bulkFile_S7_RTG', 
				bulkFile_S8_RTG =  '$bulkFile_S8_RTG', 
				sendCount_M='$sendCount_M',
				sendCount_S1='$sendCount_S1',
				sendCount_S2='$sendCount_S2',
				sendCount_S3='$sendCount_S3',
				sendCount_S4='$sendCount_S4',
				sendCount_S5='$sendCount_S5',
				sendCount_S6='$sendCount_S6',
				sendCount_S7='$sendCount_S7',
				sendCount_S8='$sendCount_S8',
				pendCount_NEFT_M =  '$pendCount_NEFT_M', pendCount_NEFT_S1 =  '$pendCount_NEFT_S1', 
				pendCount_NEFT_S2 =  '$pendCount_NEFT_S2', pendCount_NEFT_S3 =  '$pendCount_NEFT_S3', pendCount_NEFT_S4 =  '$pendCount_NEFT_S4', 
				pendCount_NEFT_S5 =  '$pendCount_NEFT_S5', pendCount_NEFT_S6 =  '$pendCount_NEFT_S6', pendCount_NEFT_S7 =  '$pendCount_NEFT_S7',
				pendCount_NEFT_S8 =  '$pendCount_NEFT_S8',pendCount_TrickleFeed_M =  '$pendCount_TrickleFeed_M', 
				pendCount_TrickleFeed_S1 =  '$pendCount_TrickleFeed_S1', pendCount_TrickleFeed_S2 =  '$pendCount_TrickleFeed_S2', 
				pendCount_TrickleFeed_S3 =  '$pendCount_TrickleFeed_S3', pendCount_TrickleFeed_S4 =  '$pendCount_TrickleFeed_S4', 
				pendCount_TrickleFeed_S5 =  '$pendCount_TrickleFeed_S5', 
				pendCount_TrickleFeed_S6 =  '$pendCount_TrickleFeed_S6', pendCount_TrickleFeed_S7 =  '$pendCount_TrickleFeed_S7', 
				pendCount_TrickleFeed_S8 =  '$pendCount_TrickleFeed_S8', OCR_pendCount =  '$OCR_pendCount', idSpool_M =  '$idSpool_M', idSpool_S1 =  '$idSpool_S1', idSpool_S2 =  '$idSpool_S2', idSpool_S3 =  '$idSpool_S3', idSpool_S4 =  '$idSpool_S4', idSpool_S5 =  '$idSpool_S5', idSpool_S6 =  '$idSpool_S6', idSpool_S7 =  '$idSpool_S7', idSpool_S8 =  '$idSpool_S8', isSpool_M =  '$isSpool_M', isSpool_S1 =  '$isSpool_S1', isSpool_S2 =  '$isSpool_S2', isSpool_S3 =  '$isSpool_S3', isSpool_S4 =  '$isSpool_S4', isSpool_S5 =  '$isSpool_S5', isSpool_S6 =  '$isSpool_S6', isSpool_S7 =  '$isSpool_S7', isSpool_S8 =  '$isSpool_S8', lSpool_M =  '$lSpool_M', lSpool_S1 =  '$lSpool_S1', lSpool_S2 =  '$lSpool_S2', lSpool_S3 =  '$lSpool_S3', 
				lSpool_S4 =  '$lSpool_S4', lSpool_S5 =  '$lSpool_S5', lSpool_S6 =  '$lSpool_S6', lSpool_S7 =  '$lSpool_S7', lSpool_S8 =  '$lSpool_S8',
				lSysout_M =  '$lSysout_M', lSysout_S1 =  '$lSysout_S1', lSysout_S2 =  '$lSysout_S2', lSysout_S3 =  '$lSysout_S3', lSysout_S4 =  '$lSysout_S4', lSysout_S5 =  '$lSysout_S5', lSysout_S6 =  '$lSysout_S6', lSysout_S7 =  '$lSysout_S7', lSysout_S8 =  '$lSysout_S8', isSysout_M =  '$isSysout_M', isSysout_S1 =  '$isSysout_S1', isSysout_S2 =  '$isSysout_S2', isSysout_S3 =  '$isSysout_S3', isSysout_S4 =  '$isSysout_S4', 
				isSysout_S5 =  '$isSysout_S5', isSysout_S6 =  '$isSysout_S6', isSysout_S7 =  '$isSysout_S7', isSysout_S8 =  '$isSysout_S8', 
				idSysout_M =  '$idSysout_M', idSysout_S1 =  '$idSysout_S1', idSysout_S2 =  '$idSysout_S2', idSysout_S3 =  '$idSysout_S3', 
				idSysout_S4 =  '$idSysout_S4', idSysout_S5 =  '$idSysout_S5', idSysout_S6 =  '$idSysout_S6', idSysout_S7 =  '$idSysout_S7', 
				idSysout_S8 =  '$idSysout_S8', adhoc_pendCount =  '$adhoc_pendCount', JR_pendCount =  '$JR_pendCount', mail_pendCount =  '$mail_pendCount', job_pend =  '$job_pend',
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time', freeze = '1' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		else { 
			$sql1 = mysql_query("update checklist_pg03 set pend_file_M = '$pend_file_M', pend_file_S1 = '$pend_file_S1', pend_file_S2 = '$pend_file_S2', pend_file_S3 = '$pend_file_S3', pend_file_S4 = '$pend_file_S4', pend_file_S5 = '$pend_file_S5', pend_file_S6 = '$pend_file_S6', 
				pend_file_S7 = '$pend_file_S7', pend_file_S8 = '$pend_file_S8', bulkFile_M_NFI = '$bulkFile_M_NFI', bulkFile_S1_NFI = '$bulkFile_S1_NFI', bulkFile_S2_NFI = '$bulkFile_S2_NFI', bulkFile_S3_NFI = '$bulkFile_S3_NFI', bulkFile_S4_NFI = '$bulkFile_S4_NFI', 
				bulkFile_S5_NFI = '$bulkFile_S5_NFI', bulkFile_S6_NFI = '$bulkFile_S6_NFI', bulkFile_S7_NFI = '$bulkFile_S7_NFI', 
				bulkFile_S8_NFI = '$bulkFile_S8_NFI', bulkFile_M_NFT = '$bulkFile_M_NFT', bulkFile_S1_NFT = '$bulkFile_S1_NFT', 
				bulkFile_S2_NFT = '$bulkFile_S2_NFT', bulkFile_S3_NFT = '$bulkFile_S3_NFT', bulkFile_S4_NFT = '$bulkFile_S4_NFT', 
				bulkFile_S5_NFT = '$bulkFile_S5_NFT', bulkFile_S6_NFT = '$bulkFile_S6_NFT', bulkFile_S7_NFT = '$bulkFile_S7_NFT', 
				bulkFile_S8_NFT = '$bulkFile_S8_NFT', bulkFile_M_BNE = '$bulkFile_M_BNE', bulkFile_S1_BNE = '$bulkFile_S1_BNE', 
				bulkFile_S2_BNE = '$bulkFile_S2_BNE', bulkFile_S3_BNE = '$bulkFile_S3_BNE', bulkFile_S4_BNE = '$bulkFile_S4_BNE', 
				bulkFile_S5_BNE = '$bulkFile_S5_BNE', bulkFile_S6_BNE = '$bulkFile_S6_BNE', bulkFile_S7_BNE = '$bulkFile_S7_BNE', 
				bulkFile_S8_BNE = '$bulkFile_S8_BNE', bulkFile_M_BRT = '$bulkFile_M_BRT', bulkFile_S1_BRT = '$bulkFile_S1_BRT', 
				bulkFile_S2_BRT = '$bulkFile_S2_BRT', bulkFile_S3_BRT = '$bulkFile_S3_BRT', bulkFile_S4_BRT = '$bulkFile_S4_BRT', 
				bulkFile_S5_BRT = '$bulkFile_S5_BRT', bulkFile_S6_BRT = '$bulkFile_S6_BRT', bulkFile_S7_BRT = '$bulkFile_S7_BRT', 
				bulkFile_S8_BRT = '$bulkFile_S8_BRT',bulkFile_M_RTG = '$bulkFile_M_RTG', bulkFile_S1_RTG = '$bulkFile_S1_RTG', 
				bulkFile_S2_RTG = '$bulkFile_S2_RTG',bulkFile_S3_RTG = '$bulkFile_S3_RTG', bulkFile_S4_RTG = '$bulkFile_S4_RTG',
                bulkFile_S5_RTG = '$bulkFile_S5_RTG', bulkFile_S6_RTG =  '$bulkFile_S6_RTG', bulkFile_S7_RTG =  '$bulkFile_S7_RTG', 
				bulkFile_S8_RTG =  '$bulkFile_S8_RTG',sendCount_M= '$sendCount_M',sendCount_S1='$sendCount_S1',sendCount_S2='$sendCount_S2',
				sendCount_S3='$sendCount_S3',sendCount_S4='$sendCount_S4',sendCount_S5='$sendCount_S5',sendCount_S6='$sendCount_S6',
				sendCount_S7='$sendCount_S7',sendCount_S8='$sendCount_S8',pendCount_NEFT_M =  '$pendCount_NEFT_M', pendCount_NEFT_S1 =  '$pendCount_NEFT_S1', 
				pendCount_NEFT_S2 =  '$pendCount_NEFT_S2', pendCount_NEFT_S3 =  '$pendCount_NEFT_S3', pendCount_NEFT_S4 =  '$pendCount_NEFT_S4', 
				pendCount_NEFT_S5 =  '$pendCount_NEFT_S5', pendCount_NEFT_S6 =  '$pendCount_NEFT_S6', pendCount_NEFT_S7 =  '$pendCount_NEFT_S7',
				pendCount_NEFT_S8 =  '$pendCount_NEFT_S8', pendCount_TrickleFeed_M =  '$pendCount_TrickleFeed_M', 
				pendCount_TrickleFeed_S1 =  '$pendCount_TrickleFeed_S1', pendCount_TrickleFeed_S2 =  '$pendCount_TrickleFeed_S2', 
				pendCount_TrickleFeed_S3 =  '$pendCount_TrickleFeed_S3', pendCount_TrickleFeed_S4 =  '$pendCount_TrickleFeed_S4', 
				pendCount_TrickleFeed_S5 =  '$pendCount_TrickleFeed_S5', 
				pendCount_TrickleFeed_S6 =  '$pendCount_TrickleFeed_S6', pendCount_TrickleFeed_S7 =  '$pendCount_TrickleFeed_S7', 
				pendCount_TrickleFeed_S8 =  '$pendCount_TrickleFeed_S8', OCR_pendCount =  '$OCR_pendCount', idSpool_M =  '$idSpool_M', idSpool_S1 =  '$idSpool_S1', idSpool_S2 =  '$idSpool_S2', idSpool_S3 =  '$idSpool_S3', idSpool_S4 =  '$idSpool_S4', idSpool_S5 =  '$idSpool_S5', idSpool_S6 =  '$idSpool_S6', idSpool_S7 =  '$idSpool_S7', idSpool_S8 =  '$idSpool_S8', isSpool_M =  '$isSpool_M', isSpool_S1 =  '$isSpool_S1', isSpool_S2 =  '$isSpool_S2', isSpool_S3 =  '$isSpool_S3', isSpool_S4 =  '$isSpool_S4', isSpool_S5 =  '$isSpool_S5', isSpool_S6 =  '$isSpool_S6', isSpool_S7 =  '$isSpool_S7', isSpool_S8 =  '$isSpool_S8', lSpool_M =  '$lSpool_M', lSpool_S1 =  '$lSpool_S1', lSpool_S2 =  '$lSpool_S2', lSpool_S3 =  '$lSpool_S3', 
				lSpool_S4 =  '$lSpool_S4', lSpool_S5 =  '$lSpool_S5', lSpool_S6 =  '$lSpool_S6', lSpool_S7 =  '$lSpool_S7', lSpool_S8 =  '$lSpool_S8',
				lSysout_M =  '$lSysout_M', lSysout_S1 =  '$lSysout_S1', lSysout_S2 =  '$lSysout_S2', lSysout_S3 =  '$lSysout_S3', lSysout_S4 =  '$lSysout_S4', lSysout_S5 =  '$lSysout_S5', lSysout_S6 =  '$lSysout_S6', lSysout_S7 =  '$lSysout_S7', lSysout_S8 =  '$lSysout_S8', isSysout_M =  '$isSysout_M', isSysout_S1 =  '$isSysout_S1', isSysout_S2 =  '$isSysout_S2', isSysout_S3 =  '$isSysout_S3', isSysout_S4 =  '$isSysout_S4', 
				isSysout_S5 =  '$isSysout_S5', isSysout_S6 =  '$isSysout_S6', isSysout_S7 =  '$isSysout_S7', isSysout_S8 =  '$isSysout_S8', 
				idSysout_M =  '$idSysout_M', idSysout_S1 =  '$idSysout_S1', idSysout_S2 =  '$idSysout_S2', idSysout_S3 =  '$idSysout_S3', 
				idSysout_S4 =  '$idSysout_S4', idSysout_S5 =  '$idSysout_S5', idSysout_S6 =  '$idSysout_S6', idSysout_S7 =  '$idSysout_S7', 
				idSysout_S8 =  '$idSysout_S8', adhoc_pendCount =  '$adhoc_pendCount', JR_pendCount =  '$JR_pendCount', mail_pendCount =  '$mail_pendCount', job_pend =  '$job_pend',
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	else {
		if(isset($_POST['submit_pg03'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			
			$sql1 = mysql_query ("INSERT INTO checklist_pg03 ( pend_file_M, pend_file_S1, pend_file_S2, pend_file_S3, pend_file_S4, pend_file_S5, pend_file_S6, pend_file_S7, pend_file_S8, 
			bulkFile_M_NFI, bulkFile_S1_NFI, bulkFile_S2_NFI, bulkFile_S3_NFI, bulkFile_S4_NFI, bulkFile_S5_NFI, bulkFile_S6_NFI, bulkFile_S7_NFI, bulkFile_S8_NFI, bulkFile_M_NFT, bulkFile_S1_NFT,
			bulkFile_S2_NFT, bulkFile_S3_NFT, bulkFile_S4_NFT, bulkFile_S5_NFT, bulkFile_S6_NFT, bulkFile_S7_NFT, bulkFile_S8_NFT, bulkFile_M_BNE, bulkFile_S1_BNE, bulkFile_S2_BNE, bulkFile_S3_BNE,
			bulkFile_S4_BNE, bulkFile_S5_BNE, bulkFile_S6_BNE, bulkFile_S7_BNE, bulkFile_S8_BNE, bulkFile_M_BRT, bulkFile_S1_BRT, bulkFile_S2_BRT, bulkFile_S3_BRT, bulkFile_S4_BRT, bulkFile_S5_BRT, 
			bulkFile_S6_BRT, bulkFile_S7_BRT, bulkFile_S8_BRT, bulkFile_M_RTG, bulkFile_S1_RTG, bulkFile_S2_RTG, bulkFile_S3_RTG, bulkFile_S4_RTG, bulkFile_S5_RTG, bulkFile_S6_RTG, bulkFile_S7_RTG,
			bulkFile_S8_RTG,sendCount_M,sendCount_S1,sendCount_S2,sendCount_S3,sendCount_S4,sendCount_S5,sendCount_S6,sendCount_S7,sendCount_S8, pendCount_NEFT_M, pendCount_NEFT_S1, pendCount_NEFT_S2,
			pendCount_NEFT_S3, pendCount_NEFT_S4, pendCount_NEFT_S5, pendCount_NEFT_S6, pendCount_NEFT_S7, pendCount_NEFT_S8, pendCount_TrickleFeed_M, pendCount_TrickleFeed_S1, pendCount_TrickleFeed_S2, 
			pendCount_TrickleFeed_S3, pendCount_TrickleFeed_S4, pendCount_TrickleFeed_S5, pendCount_TrickleFeed_S6, pendCount_TrickleFeed_S7, pendCount_TrickleFeed_S8, OCR_pendCount, idSpool_M, idSpool_S1,
			idSpool_S2, idSpool_S3, idSpool_S4, idSpool_S5, idSpool_S6, idSpool_S7, idSpool_S8, isSpool_M, isSpool_S1, isSpool_S2, isSpool_S3, isSpool_S4, isSpool_S5, isSpool_S6, isSpool_S7, isSpool_S8, 
			lSpool_M, lSpool_S1, lSpool_S2, lSpool_S3, lSpool_S4, lSpool_S5, lSpool_S6, lSpool_S7, lSpool_S8, lSysout_M, lSysout_S1, lSysout_S2, lSysout_S3, lSysout_S4, lSysout_S5, lSysout_S6, lSysout_S7,
			lSysout_S8, isSysout_M, isSysout_S1, isSysout_S2, isSysout_S3, isSysout_S4, isSysout_S5,isSysout_S6, isSysout_S7, isSysout_S8, idSysout_M, idSysout_S1, idSysout_S2, idSysout_S3, idSysout_S4,
			idSysout_S5, idSysout_S6, idSysout_S7, idSysout_S8, adhoc_pendCount, JR_pendCount, mail_pendCount, job_pend, Maker, Checker, time, status, Inst_Date )
			VALUES ( '$pend_file_M', '$pend_file_S1', '$pend_file_S2', '$pend_file_S3', '$pend_file_S4', '$pend_file_S5', '$pend_file_S6', '$pend_file_S7', 
			'$pend_file_S8',    '$bulkFile_M_NFI',  '$bulkFile_S1_NFI', '$bulkFile_S2_NFI', '$bulkFile_S3_NFI', '$bulkFile_S4_NFI', '$bulkFile_S5_NFI', 
			'$bulkFile_S6_NFI', '$bulkFile_S7_NFI', '$bulkFile_S8_NFI', '$bulkFile_M_NFT',  '$bulkFile_S1_NFT', '$bulkFile_S2_NFT', '$bulkFile_S3_NFT', 
			'$bulkFile_S4_NFT', '$bulkFile_S5_NFT', '$bulkFile_S6_NFT', '$bulkFile_S7_NFT', '$bulkFile_S8_NFT', '$bulkFile_M_BNE', '$bulkFile_S1_BNE', 
			'$bulkFile_S2_BNE', '$bulkFile_S3_BNE', '$bulkFile_S4_BNE', '$bulkFile_S5_BNE', '$bulkFile_S6_BNE', '$bulkFile_S7_BNE', '$bulkFile_S8_BNE', 
			'$bulkFile_M_BRT',  '$bulkFile_S1_BRT', '$bulkFile_S2_BRT', '$bulkFile_S3_BRT', '$bulkFile_S4_BRT', '$bulkFile_S5_BRT', '$bulkFile_S6_BRT', 
			'$bulkFile_S7_BRT', '$bulkFile_S8_BRT', '$bulkFile_M_RTG',  '$bulkFile_S1_RTG', '$bulkFile_S2_RTG', '$bulkFile_S3_RTG', '$bulkFile_S4_RTG', 
			'$bulkFile_S5_RTG', '$bulkFile_S6_RTG', '$bulkFile_S7_RTG', '$bulkFile_S8_RTG','$sendCount_M','$sendCount_S1','$sendCount_S2','$sendCount_S3','$sendCount_S4','$sendCount_S5','$sendCount_S6','$sendCount_S7','$sendCount_S8',	
			'$pendCount_NEFT_M', '$pendCount_NEFT_S1', '$pendCount_NEFT_S2', '$pendCount_NEFT_S3', '$pendCount_NEFT_S4', '$pendCount_NEFT_S5', 
			'$pendCount_NEFT_S6', '$pendCount_NEFT_S7', '$pendCount_NEFT_S8',
			'$pendCount_TrickleFeed_M', '$pendCount_TrickleFeed_S1', '$pendCount_TrickleFeed_S2', '$pendCount_TrickleFeed_S3', '$pendCount_TrickleFeed_S4', 
			'$pendCount_TrickleFeed_S5', '$pendCount_TrickleFeed_S6', '$pendCount_TrickleFeed_S7', '$pendCount_TrickleFeed_S8', '$OCR_pendCount', '$idSpool_M', 
			'$idSpool_S1', '$idSpool_S2', '$idSpool_S3', '$idSpool_S4', '$idSpool_S5', '$idSpool_S6', '$idSpool_S7', '$idSpool_S8', '$isSpool_M', '$isSpool_S1', 
			'$isSpool_S2', '$isSpool_S3', '$isSpool_S4', '$isSpool_S5', '$isSpool_S6', '$isSpool_S7', '$isSpool_S8', '$lSpool_M', '$lSpool_S1', '$lSpool_S2', 
			'$lSpool_S3', '$lSpool_S4', '$lSpool_S5', '$lSpool_S6', '$lSpool_S7', '$lSpool_S8', '$lSysout_M', '$lSysout_S1', '$lSysout_S2', '$lSysout_S3', 
			'$lSysout_S4', '$lSysout_S5', '$lSysout_S6', '$lSysout_S7', '$lSysout_S8', '$isSysout_M', '$isSysout_S1', '$isSysout_S2', '$isSysout_S3', 
			'$isSysout_S4', '$isSysout_S5', '$isSysout_S6', '$isSysout_S7', '$isSysout_S8', '$idSysout_M', '$idSysout_S1', '$idSysout_S2', '$idSysout_S3', 
			'$idSysout_S4', '$idSysout_S5', '$idSysout_S6', '$idSysout_S7', '$idSysout_S8', '$adhoc_pendCount', '$JR_pendCount','$mail_pendCount','$job_pend', '$Maker', '$Checker', '$time', '$status', '$crrdate') " );
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}


/*<!-------------------------------------------------Checklist Page 05------------------------------------------------------->*/
if(isset($_POST['save_pg05']) || isset($_POST['submit_pg05']))
	{ 
		$CardsChange_Count = $_POST['CardsChange_Count'];
		$cards_Name = $_POST['cards_Name'];
		//$trickleFeedFile_Count = $_POST['trickleFeedFile_Count'];
		//$trickleFeedReport_Count = $_POST['trickleFeedReport_Count'];
		//$trickleFeed_ResendReport_Count = $_POST['trickleFeed_ResendReport_Count'];
		$StatusCount = $_POST['StatusCount'];
		$processed_Count = $_POST['processed_Count'];
		$pending_Count = $_POST['pending_Count'];
		$failed_Count = $_POST['failed_Count'];
		$completion_Count = $_POST['completion_Count'];
		$RC_M = $_POST['RC_M'];
		$RC_S1 = $_POST['RC_S1'];
		$RC_S2 = $_POST['RC_S2'];
		$RC_S3 = $_POST['RC_S3'];
		$RC_S4 = $_POST['RC_S4'];
		$RC_S5 = $_POST['RC_S5'];
		$RC_S6 = $_POST['RC_S6'];
		$RC_S7 = $_POST['RC_S7'];
		$RC_S8 = $_POST['RC_S8'];
		$ORA_M = $_POST['ORA_M'];
		$ORA_S1 = $_POST['ORA_S1'];
		$ORA_S2 = $_POST['ORA_S2'];
		$ORA_S3 = $_POST['ORA_S3'];
		$ORA_S4 = $_POST['ORA_S4'];
		$ORA_S5 = $_POST['ORA_S5'];
		$ORA_S6 = $_POST['ORA_S6'];
		$ORA_S7 = $_POST['ORA_S7'];
		$ORA_S8 = $_POST['ORA_S8'];
		$Status_Count = $_POST['Status_Count'];
		$Count = $_POST['Count'];
		//$ATM_M = $_POST['ATM_M'];
		//$ATM_S1 = $_POST['ATM_S1'];
		//$ATM_S2 = $_POST['ATM_S2'];
		//$ATM_S3 = $_POST['ATM_S3'];
		//$ATM_S4 = $_POST['ATM_S4'];
		//$ATM_S5 = $_POST['ATM_S5'];
		//$ATM_S6 = $_POST['ATM_S6'];
		//$ATM_S7 = $_POST['ATM_S7'];
		//$ATM_S8 = $_POST['ATM_S8'];
		//$INB_M = $_POST['INB_M'];
		//$INB_S1 = $_POST['INB_S1'];
		//$INB_S2 = $_POST['INB_S2'];
		//$INB_S3 = $_POST['INB_S3'];
		//$INB_S4 = $_POST['INB_S4'];
		//$INB_S5 = $_POST['INB_S5'];
		//$INB_S6 = $_POST['INB_S6'];
		//$INB_S7 = $_POST['INB_S7'];
		//$INB_S8 = $_POST['INB_S8'];
		//$MR_M = $_POST['MR_M'];
		//$MR_S1 = $_POST['MR_S1'];
		//$MR_S2 = $_POST['MR_S2'];
		//$MR_S3 = $_POST['MR_S3'];
		//$MR_S4 = $_POST['MR_S4'];
		//$MR_S5 = $_POST['MR_S5'];
		//$MR_S6 = $_POST['MR_S6'];
		//$MR_S7 = $_POST['MR_S7'];
		//$MR_S8 = $_POST['MR_S8'];
		//$B24_M = $_POST['B24_M'];
		//$B24_S1 = $_POST['B24_S1'];
		//$B24_S2 = $_POST['B24_S2'];
		//$B24_S3 = $_POST['B24_S3'];
		//$B24_S4 = $_POST['B24_S4'];
		//$B24_S5 = $_POST['B24_S5'];
		//$B24_S6 = $_POST['B24_S6'];
		//$B24_S7 = $_POST['B24_S7'];
		//$B24_S8 = $_POST['B24_S8'];
		$JR_countTime = $_POST['JR_countTime'];
		$SY3000_M = $_POST['SY3000_M'];
		$SY3000_S1 = $_POST['SY3000_S1'];
		$SY3000_S2 = $_POST['SY3000_S2'];
		$SY3000_S3 = $_POST['SY3000_S3'];
		$SY3000_S4 = $_POST['SY3000_S4'];
		$SY3000_S5 = $_POST['SY3000_S5'];
		$SY3000_S6 = $_POST['SY3000_S6'];
		$SY3000_S7 = $_POST['SY3000_S7'];
		$SY3000_S8 = $_POST['SY3000_S8'];
		$M = $_POST['M'];
		$S1 = $_POST['S1'];
		$S2 = $_POST['S2'];
		$S3 = $_POST['S3'];
		$S4 = $_POST['S4'];
		$S5 = $_POST['S5'];
		$S6 = $_POST['S6'];
		$S7 = $_POST['S7'];
		$S8 = $_POST['S8'];
		$stat_Count = $_POST['stat_Count'];
		$IP_Count = $_POST['IP_Count'];
		$SID_Count = $_POST['SID_Count'];
		$Count_stat = $_POST['Count_stat'];
		$Maker = implode(",",$_POST['Maker']);
		$Checker = implode(",",$_POST['Checker']);
		$RcErrorWithJob = implode(",",$_POST['RcErrorWithJob']);
		$time = implode(",",$_POST['time']);
		$status='1';
		$crrdate = mflags();
		$ma=substr_count($Maker,",,");
		$ck=substr_count($Checker,",,");
		$tm=substr_count($time,",,");
		
		
		$set_remark = implode(",",$_POST['set_remark']);
		
		
		$query = mysql_query("select * from checklist_pg05 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg05 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
			echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
			if(isset($_POST['submit_pg05'])){
				if(($ma > 0) || ($ck > 0) || ($tm > 0)){
					echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
				}
				else{
				$sql = mysql_query ("update checklist_pg05 set 
				CardsChange_Count = '$CardsChange_Count', cards_Name = '$cards_Name', 
				StatusCount = '$StatusCount', processed_Count = '$processed_Count', pending_Count = '$pending_Count', failed_Count = '$failed_Count', completion_Count = '$completion_Count', 
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', 
				RC_S8 = '$RC_S8', ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', ORA_S8 = '$ORA_S8',Status_Count = '$Status_Count', Count = '$Count',JR_countTime = '$JR_countTime', 
				SY3000_M = '$SY3000_M', SY3000_S1 = '$SY3000_S1', SY3000_S2 = '$SY3000_S2', SY3000_S3 = '$SY3000_S3', SY3000_S4 = '$SY3000_S4', SY3000_S5 = '$SY3000_S5', SY3000_S6 = '$SY3000_S6', SY3000_S7 = '$SY3000_S7', SY3000_S8 = '$SY3000_S8', M = '$M', S1 = '$S1', S2 = '$S2', S3 = '$S3', S4 = '$S4', S5 = '$S5', S6 = '$S6', S7 = '$S7', S8 = '$S8', 
				stat_Count = '$stat_Count', IP_Count = '$IP_Count', SID_Count = '$SID_Count', Count_stat = '$Count_stat',set_remark = '$set_remark', 
				Maker = '$Maker', Checker = '$Checker', time = '$time', freeze = '1', RcErrorWithJob='$RcErrorWithJob' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		else { 
			$sql1 = mysql_query("update checklist_pg05 set 
				CardsChange_Count = '$CardsChange_Count', cards_Name = '$cards_Name', 
				StatusCount = '$StatusCount', 
				processed_Count = '$processed_Count', pending_Count = '$pending_Count', failed_Count = '$failed_Count', completion_Count = '$completion_Count', 
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', 
				RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', ORA_S8 = '$ORA_S8',
				Status_Count = '$Status_Count', Count = '$Count',
				JR_countTime = '$JR_countTime', SY3000_M = '$SY3000_M', SY3000_S1 = '$SY3000_S1', SY3000_S2 = '$SY3000_S2', SY3000_S3 = '$SY3000_S3', SY3000_S4 = '$SY3000_S4', SY3000_S5 = '$SY3000_S5', SY3000_S6 = '$SY3000_S6', SY3000_S7 = '$SY3000_S7', SY3000_S8 = '$SY3000_S8', 
				M = '$M', S1 = '$S1', S2 = '$S2', S3 = '$S3', S4 = '$S4', S5 = '$S5', S6 = '$S6', S7 = '$S7', S8 = '$S8',
				stat_Count = '$stat_Count', IP_Count = '$IP_Count', SID_Count = '$SID_Count', Count_stat = '$Count_stat',set_remark = '$set_remark', 
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time', RcErrorWithJob='$RcErrorWithJob' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg05'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			$sql1 = mysql_query ("INSERT INTO checklist_pg05 (  CardsChange_Count, cards_Name, StatusCount, processed_Count, pending_Count, failed_Count, completion_Count, RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, Status_Count, Count, JR_countTime, SY3000_M, SY3000_S1, SY3000_S2, SY3000_S3, SY3000_S4, SY3000_S5, SY3000_S6, SY3000_S7, SY3000_S8, M, S1, S2, S3, S4, S5, S6, S7, S8, stat_Count, IP_Count, SID_Count, Count_stat,set_remark, Maker, Checker, time, status, Inst_Date,RcErrorWithJob )
			    VALUES ( '$CardsChange_Count', '$cards_Name', '$StatusCount', '$processed_Count', '$pending_Count', '$failed_Count', '$completion_Count', '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', '$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', '$Status_Count', '$Count', '$JR_countTime', '$SY3000_M', '$SY3000_S1', '$SY3000_S2', '$SY3000_S3', '$SY3000_S4', '$SY3000_S5', '$SY3000_S6', '$SY3000_S7', '$SY3000_S8', '$M', '$S1', '$S2', '$S3', '$S4', '$S5', '$S6', '$S7', '$S8', '$stat_Count', '$IP_Count', '$SID_Count', '$Count_stat','$set_remark','$Maker', '$Checker', '$time', '$status', '$crrdate','$RcErrorWithJob')" );
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}

/*<!--------------------------------------------Checklist Page 06------------------------------------------>*/
if(isset($_POST['save_pg06']) || isset($_POST['submit_pg06'])){
			$M = $_POST['M'];
			$S1 = $_POST['S1'];
			$S2 = $_POST['S2'];
			$S3 = $_POST['S3'];
			$S4 = $_POST['S4'];
			$S5 = $_POST['S5'];
			$S6 = $_POST['S6'];
			$S7 = $_POST['S7'];
			$S8 = $_POST['S8'];
			$spool_Count = $_POST['spool_Count'];
			$data_Count = $_POST['data_Count'];
			$sysout_Count = $_POST['sysout_Count'];
			$Sutlej_Date = $_POST['Sutlej_Date'];
			$Neera_Date = $_POST['Neera_Date'];
			$DC0800card_M = $_POST['DC0800card_M'];
			$DC0800card_S1 = $_POST['DC0800card_S1'];
			$DC0800card_S2 = $_POST['DC0800card_S2'];
			$DC0800card_S3 = $_POST['DC0800card_S3'];
			$DC0800card_S4 = $_POST['DC0800card_S4'];
			$DC0800card_S5 = $_POST['DC0800card_S5'];
			$DC0800card_S6 = $_POST['DC0800card_S6'];
			$DC0800card_S7 = $_POST['DC0800card_S7'];
			$DC0800card_S8 = $_POST['DC0800card_S8'];
			$DEPP_Count = $_POST['DEPP_Count'];
			$LONP_Count = $_POST['LONP_Count'];
			$CTAP_Count = $_POST['CTAP_Count'];
			$ERMP_Count = $_POST['ERMP_Count'];
			$ED2P_Count = $_POST['ED2P_Count'];
			$ED1P_Count = $_POST['ED1P_Count'];
			$GLCP_Count = $_POST['GLCP_Count'];
			$GLPP_Count = $_POST['GLPP_Count'];
			$BR0501_RC_M = $_POST['BR0501_RC_M'];
			$BR0501_RC_S1 = $_POST['BR0501_RC_S1'];
			$BR0501_RC_S2 = $_POST['BR0501_RC_S2'];
			$BR0501_RC_S3 = $_POST['BR0501_RC_S3'];
			$BR0501_RC_S4 = $_POST['BR0501_RC_S4'];
			$BR0501_RC_S5 =  $_POST['BR0501_RC_S5'];
			$BR0501_RC_S6 = $_POST['BR0501_RC_S6'];
			$BR0501_RC_S7 = $_POST['BR0501_RC_S7'];
			$BR0501_RC_S8 = $_POST['BR0501_RC_S8'];
			$BR0501_ORA_M = $_POST['BR0501_ORA_M'];
			$BR0501_ORA_S1 = $_POST['BR0501_ORA_S1'];
			$BR0501_ORA_S2 =  $_POST['BR0501_ORA_S2'];
			$BR0501_ORA_S3 = $_POST['BR0501_ORA_S3'];
			$BR0501_ORA_S4  = $_POST['BR0501_ORA_S4'];
			$BR0501_ORA_S5 = $_POST['BR0501_ORA_S5'];
			$BR0501_ORA_S6 = $_POST['BR0501_ORA_S6'];
			$BR0501_ORA_S7 = $_POST['BR0501_ORA_S7'];
			$BR0501_ORA_S8 = $_POST['BR0501_ORA_S8'];
			$preCount_BORM = $_POST['preCount_BORM'];
			$postCount_BORTOGL = $_POST['postCount_BORTOGL'];
			$INVM_Count = $_POST['INVM_Count'];
			$INVTOGL_Count = $_POST['INVTOGL_Count'];
			$RC_M = $_POST['RC_M'];
			$RC_S1 = $_POST['RC_S1'];
			$RC_S2 =  $_POST['RC_S2'];
			$RC_S3 =  $_POST['RC_S3'];
			$RC_S4 = $_POST['RC_S4'];
			$RC_S5 = $_POST['RC_S5'];
			$RC_S6 = $_POST['RC_S6'];
			$RC_S7 = $_POST['RC_S7'];
			$RC_S8 = $_POST['RC_S8'];
			$ORA_M = $_POST['ORA_M'];
			$ORA_S1 = $_POST['ORA_S1'];
			$ORA_S2 = $_POST['ORA_S2'];
			$ORA_S3 = $_POST['ORA_S3'];
			$ORA_S4 = $_POST['ORA_S4'];
			$ORA_S5 = $_POST['ORA_S5'];
			$ORA_S6 = $_POST['ORA_S6'];
			$ORA_S7 = $_POST['ORA_S7'];
			$ORA_S8 = $_POST['ORA_S8'];
			
			$gl_status = $_POST['gl_status'];
			
			$GLIFINV_M = $_POST['GLIFINV_M'];
			$GLIFINV_S1=$_POST['GLIFINV_S1'];
			$GLIFINV_S2 = $_POST['GLIFINV_S2'];
			$GLIFINV_S3 = $_POST['GLIFINV_S3'];
			$GLIFINV_S4 = $_POST['GLIFINV_S4'];
			$GLIFINV_S5 = $_POST['GLIFINV_S5'];
			$GLIFINV_S6 = $_POST['GLIFINV_S6'];
			$GLIFINV_S7 = $_POST['GLIFINV_S7'];
			$GLIFINV_S8 = $_POST['GLIFINV_S8'];
			$tempMount_M = $_POST['tempMount_M'];
			$tempMount_S1 = $_POST['tempMount_S1'];
			$tempMount_S2 = $_POST['tempMount_S2'];
			$tempMount_S3 = $_POST['tempMount_S3'];
			$tempMount_S4 = $_POST['tempMount_S4'];
			$tempMount_S5 = $_POST['tempMount_S5'];
			$tempMount_S6 = $_POST['tempMount_S6'];
			$tempMount_S7 = $_POST['tempMount_S7'];
			$tempMount_S8 = $_POST['tempMount_S8'];
			$Maker = implode(",",$_POST['Maker']);
			$Checker = implode(",",$_POST['Checker']);
			$time = implode(",",$_POST['time']);
			$status='1';
			$crrdate = mflags();
			$ma=substr_count($Maker,",,");
			$ck=substr_count($Checker,",,");
			$tm=substr_count($time,",,");
			
			$query = mysql_query("select * from checklist_pg06 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
			$query1 = mysql_query("select * from checklist_pg06 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
			if(mysql_num_rows($query) > 0 ){
			echo "<script>alert('Record has already been inserted for the day!!')</script>";
			}
			elseif(mysql_num_rows($query1) > 0){
			if(isset($_POST['submit_pg06'])){
				if(($ma > 0) || ($ck > 0) || ($tm > 0)){
					echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
				}
			else{
				$sql = mysql_query ("update checklist_pg06 set 
				M = '$M', S1 = '$S1', S2 = '$S2', S3 = '$S3', S4 = '$S4', S5 = '$S5', S6 = '$S6', S7 = '$S7', 
				S8 = '$S8', 
				spool_Count = '$spool_Count', data_Count = '$data_Count', sysout_Count = '$sysout_Count', Sutlej_Date = '$Sutlej_Date', Neera_Date = '$Neera_Date', 
				DC0800card_M = '$DC0800card_M', DC0800card_S1 = '$DC0800card_S1', DC0800card_S2 = '$DC0800card_S2', DC0800card_S3 = '$DC0800card_S3', DC0800card_S4 = '$DC0800card_S4', DC0800card_S5 = '$DC0800card_S5', DC0800card_S6 = '$DC0800card_S6', DC0800card_S7 = '$DC0800card_S7', DC0800card_S8 = '$DC0800card_S8', 
				BR0501_RC_M = '$BR0501_RC_M', BR0501_RC_S1 = '$BR0501_RC_S1', BR0501_RC_S2 = '$BR0501_RC_S2', BR0501_RC_S3 = '$BR0501_RC_S3', BR0501_RC_S4 = '$BR0501_RC_S4', BR0501_RC_S5 = '$BR0501_RC_S5', BR0501_RC_S6 = '$BR0501_RC_S6', BR0501_RC_S7 = '$BR0501_RC_S7', BR0501_RC_S8 = '$BR0501_RC_S8', 
				BR0501_ORA_M = '$BR0501_ORA_M', BR0501_ORA_S1 = '$BR0501_ORA_S1', BR0501_ORA_S2 = '$BR0501_ORA_S2', BR0501_ORA_S3 = '$BR0501_ORA_S3', BR0501_ORA_S4 = '$BR0501_ORA_S4', BR0501_ORA_S5 = '$BR0501_ORA_S5', BR0501_ORA_S6 = '$BR0501_ORA_S6', BR0501_ORA_S7 = '$BR0501_ORA_S7', BR0501_ORA_S8 = '$BR0501_ORA_S8',
				preCount_BORM = '$preCount_BORM', postCount_BORTOGL = '$postCount_BORTOGL', INVM_Count = '$INVM_Count', INVTOGL_Count = '$INVTOGL_Count', 
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', ORA_S8 = '$ORA_S8',gl_status = '$gl_status',
				GLIFINV_M = '$GLIFINV_M', GLIFINV_S1 = '$GLIFINV_S1', GLIFINV_S2 = '$GLIFINV_S2', GLIFINV_S3='$GLIFINV_S3', GLIFINV_S4 = '$GLIFINV_S4', GLIFINV_S5 = '$GLIFINV_S5', GLIFINV_S6 = '$GLIFINV_S6', GLIFINV_S7 = '$GLIFINV_S7', GLIFINV_S8 = '$GLIFINV_S8',
				tempMount_M = '$tempMount_M', tempMount_S1 = '$tempMount_S1', tempMount_S2 = '$tempMount_S2', tempMount_S3 = '$tempMount_S3', tempMount_S4 = '$tempMount_S4', tempMount_S5 = '$tempMount_S5', tempMount_S6 = '$tempMount_S6', tempMount_S7 = '$tempMount_S7', tempMount_S8 = '$tempMount_S8', 
				DEPP_Count = '$DEPP_Count',  LONP_Count = '$LONP_Count',  CTAP_Count = '$CTAP_Count',  ERMP_Count = '$ERMP_Count',  ED2P_Count = '$ED2P_Count',  ED1P_Count = '$ED1P_Count',  GLCP_Count = '$GLCP_Count',  GLPP_Count = '$GLPP_Count',
				Maker = '$Maker', Checker = '$Checker', time = '$time', freeze = '1' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		
		else { 
			$sql1 = mysql_query("update checklist_pg06 set 
				 M = '$M', S1 = '$S1', S2 = '$S2', S3 = '$S3', S4 = '$S4', S5 = '$S5', S6 = '$S6', S7 = '$S7', 
				S8 = '$S8', 
				spool_Count = '$spool_Count', data_Count = '$data_Count', sysout_Count = '$sysout_Count', Sutlej_Date = '$Sutlej_Date', Neera_Date = '$Neera_Date', 
				DC0800card_M = '$DC0800card_M', DC0800card_S1 = '$DC0800card_S1', DC0800card_S2 = '$DC0800card_S2', DC0800card_S3 = '$DC0800card_S3', DC0800card_S4 = '$DC0800card_S4', DC0800card_S5 = '$DC0800card_S5', DC0800card_S6 = '$DC0800card_S6', DC0800card_S7 = '$DC0800card_S7', DC0800card_S8 = '$DC0800card_S8', 
				BR0501_RC_M = '$BR0501_RC_M', BR0501_RC_S1 = '$BR0501_RC_S1', BR0501_RC_S2 = '$BR0501_RC_S2', BR0501_RC_S3 = '$BR0501_RC_S3', BR0501_RC_S4 = '$BR0501_RC_S4', BR0501_RC_S5 = '$BR0501_RC_S5', BR0501_RC_S6 = '$BR0501_RC_S6', BR0501_RC_S7 = '$BR0501_RC_S7', BR0501_RC_S8 = '$BR0501_RC_S8', 
				BR0501_ORA_M = '$BR0501_ORA_M', BR0501_ORA_S1 = '$BR0501_ORA_S1', BR0501_ORA_S2 = '$BR0501_ORA_S2', BR0501_ORA_S3 = '$BR0501_ORA_S3', BR0501_ORA_S4 = '$BR0501_ORA_S4', BR0501_ORA_S5 = '$BR0501_ORA_S5', BR0501_ORA_S6 = '$BR0501_ORA_S6', BR0501_ORA_S7 = '$BR0501_ORA_S7', BR0501_ORA_S8 = '$BR0501_ORA_S8',
				preCount_BORM = '$preCount_BORM', postCount_BORTOGL = '$postCount_BORTOGL', INVM_Count = '$INVM_Count', INVTOGL_Count = '$INVTOGL_Count', 
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', ORA_S8 = '$ORA_S8', gl_status = '$gl_status',
				GLIFINV_M = '$GLIFINV_M', GLIFINV_S1 = '$GLIFINV_S1', GLIFINV_S2 = '$GLIFINV_S2', GLIFINV_S3='$GLIFINV_S3', GLIFINV_S4 = '$GLIFINV_S4', GLIFINV_S5 = '$GLIFINV_S5', GLIFINV_S6 = '$GLIFINV_S6', GLIFINV_S7 = '$GLIFINV_S7', GLIFINV_S8 = '$GLIFINV_S8',
				tempMount_M = '$tempMount_M', tempMount_S1 = '$tempMount_S1', tempMount_S2 = '$tempMount_S2', tempMount_S3 = '$tempMount_S3', tempMount_S4 = '$tempMount_S4', tempMount_S5 = '$tempMount_S5', tempMount_S6 = '$tempMount_S6', tempMount_S7 = '$tempMount_S7', tempMount_S8 = '$tempMount_S8',
				DEPP_Count = '$DEPP_Count',  LONP_Count = '$LONP_Count',  CTAP_Count = '$CTAP_Count',  ERMP_Count = '$ERMP_Count',  ED2P_Count = '$ED2P_Count',  ED1P_Count = '$ED1P_Count',  GLCP_Count = '$GLCP_Count',  GLPP_Count = '$GLPP_Count',
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg06'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {			
			$sql1 = mysql_query ("INSERT INTO checklist_pg06 ( M, S1, S2, S3, S4, S5, S6, S7, S8, spool_Count, data_Count, sysout_Count, Sutlej_Date, Neera_Date, DC0800card_M, DC0800card_S1, DC0800card_S2, DC0800card_S3, DC0800card_S4, DC0800card_S5, DC0800card_S6, DC0800card_S7, DC0800card_S8, BR0501_RC_M, BR0501_RC_S1, BR0501_RC_S2, BR0501_RC_S3, BR0501_RC_S4, BR0501_RC_S5, BR0501_RC_S6, BR0501_RC_S7, BR0501_RC_S8, BR0501_ORA_M, BR0501_ORA_S1, BR0501_ORA_S2, BR0501_ORA_S3, BR0501_ORA_S4, BR0501_ORA_S5, BR0501_ORA_S6, BR0501_ORA_S7, BR0501_ORA_S8, preCount_BORM, postCount_BORTOGL, INVM_Count, INVTOGL_Count, RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, gl_status, GLIFINV_M, GLIFINV_S1, GLIFINV_S2, GLIFINV_S3, GLIFINV_S4, GLIFINV_S5, GLIFINV_S6, GLIFINV_S7, GLIFINV_S8, tempMount_M, tempMount_S1, tempMount_S2, tempMount_S3, tempMount_S4, tempMount_S5, tempMount_S6, tempMount_S7, tempMount_S8, DEPP_Count, LONP_Count, CTAP_Count,  ERMP_Count, ED2P_Count, ED1P_Count, GLCP_Count, GLPP_Count, Maker, Checker, time, status, Inst_Date )
			    VALUES (  '$M', '$S1', '$S2', '$S3', '$S4', '$S5', '$S6', '$S7', '$S8', '$spool_Count', '$data_Count', '$sysout_Count', '$Sutlej_Date', '$Neera_Date', '$DC0800card_M', '$DC0800card_S1', '$DC0800card_S2', '$DC0800card_S3', '$DC0800card_S4', '$DC0800card_S5', '$DC0800card_S6', '$DC0800card_S7', '$DC0800card_S8', '$BR0501_RC_M', '$BR0501_RC_S1', '$BR0501_RC_S2', '$BR0501_RC_S3', '$BR0501_RC_S4', '$BR0501_RC_S5', '$BR0501_RC_S6', '$BR0501_RC_S7', '$BR0501_RC_S8', '$BR0501_ORA_M', '$BR0501_ORA_S1', '$BR0501_ORA_S2', '$BR0501_ORA_S3', '$BR0501_ORA_S4', '$BR0501_ORA_S5', '$BR0501_ORA_S6', '$BR0501_ORA_S7', '$BR0501_ORA_S8', '$preCount_BORM', '$postCount_BORTOGL', '$INVM_Count', '$INVTOGL_Count', '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', '$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', '$gl_status', '$GLIFINV_M', '$GLIFINV_S1', '$GLIFINV_S2', '$GLIFINV_S3', '$GLIFINV_S4', '$GLIFINV_S5', '$GLIFINV_S6', '$GLIFINV_S7', '$GLIFINV_S8', '$tempMount_M', '$tempMount_S1', '$tempMount_S2', '$tempMount_S3', '$tempMount_S4', '$tempMount_S5', '$tempMount_S6', '$tempMount_S7', '$tempMount_S8', '$DEPP_Count', '$LONP_Count', '$CTAP_Count',  '$ERMP_Count', '$ED2P_Count', '$ED1P_Count', '$GLCP_Count', '$GLPP_Count','$Maker', '$Checker', '$time', '$status', '$crrdate' )" );
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}


/*<!---------------------------------------------Checklist Page 07----------------------------------------->*/
if(isset($_POST['save_pg07']) || isset($_POST['submit_pg07'])){
		$Count = $_POST['Count'];
		$IN8899_Count = $_POST['IN8899_Count'];
		$IN8899_StartTime = $_POST['IN8899_StartTime'];
		$IN8899_EndTime = $_POST['IN8899_EndTime'];
		$SY0344_RC_Count = $_POST['SY0344_RC_Count'];
		$SY0344_ORA_Count = $_POST['SY0344_ORA_Count'];
		$SY0VVR_RC_Count = $_POST['SY0VVR_RC_Count'];
		$SY0VVR_ORA_Count = $_POST['SY0VVR_ORA_Count'];
		$SY0433_RC_Count = $_POST['SY0433_RC_Count'];
		$SY0433_ORA_Count = $_POST['SY0433_ORA_Count'];
		//$ftp_status = $_POST['ftp_status'];
		$RC_Count = $_POST['RC_Count'];
		$ORA_Count = $_POST['ORA_Count'];
		$NeeraCount_001 = implode(",",$_POST['NeeraCount_001']);
		$NeeraCount_HOLD = implode(",",$_POST['NeeraCount_HOLD']);
		$NeeraCount_MAN = implode(",",$_POST['NeeraCount_MAN']);
		$NeeraCount_SUSP = implode(",",$_POST['NeeraCount_SUSP']);
		$TargetCount_001 = implode(",",$_POST['TargetCount_001']);
		$TargetCount_HOLD = implode(",",$_POST['TargetCount_HOLD']);
		$TargetCount_MAN = implode(",",$_POST['TargetCount_MAN']);
		$TargetCount_SUSP = implode(",",$_POST['TargetCount_SUSP']);
		$file_status = implode(",",$_POST['file_status']);
		$IF4407_RC_Count = $_POST['IF4407_RC_Count'];
		$IF4407_ORA_Count = $_POST['IF4407_ORA_Count'];
		$NeeraCount_ACD = $_POST['NeeraCount_ACD'];
		$NeeraCount_DRD = $_POST['NeeraCount_DRD'];
		$NeeraCount_IOI = $_POST['NeeraCount_IOI'];
		$NeeraCount_IOIN = $_POST['NeeraCount_IOIN'];
		$GangaCount_ACD = $_POST['GangaCount_ACD'];
		$GangaCount_DRD = $_POST['GangaCount_DRD'];
		$GangaCount_IOI = $_POST['GangaCount_IOI'];
		$GangaCount_IOIN = $_POST['GangaCount_IOIN'];
		$SY0265_RC_Count = $_POST['SY0265_RC_Count'];
		$SY0265_ORA_Count = $_POST['SY0265_ORA_Count'];
		$gend0805 = implode(",",$_POST['gend0805']);
		$jonname = $_POST['jonname'];
		$Maker = implode(",",$_POST['Maker']);
		$Checker = implode(",",$_POST['Checker']);
		$time = implode(",",$_POST['time']);
		$status='1';
		$crrdate = mflags();
		$ma=substr_count($Maker,",,");
		$ck=substr_count($Checker,",,");
		$tm=substr_count($time,",,");
		
		$query = mysql_query("select * from checklist_pg07 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg07 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg07'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
			}
		else{
				$sql = mysql_query ("update checklist_pg07 set 
				Count = '$Count', IN8899_Count = '$IN8899_Count', IN8899_StartTime = '$IN8899_StartTime', IN8899_EndTime = '$IN8899_EndTime', 
				SY0344_RC_Count = '$SY0344_RC_Count', SY0344_ORA_Count = '$SY0344_ORA_Count', 
				SY0VVR_RC_Count = '$SY0VVR_RC_Count', SY0VVR_ORA_Count = '$SY0VVR_ORA_Count',
				SY0433_RC_Count = '$SY0433_RC_Count', SY0433_ORA_Count = '$SY0433_ORA_Count',
				RC_Count = '$RC_Count', ORA_Count = '$ORA_Count',
				NeeraCount_001 = '$NeeraCount_001', NeeraCount_HOLD = '$NeeraCount_HOLD', NeeraCount_MAN = '$NeeraCount_MAN', 
				NeeraCount_SUSP = '$NeeraCount_SUSP',
				TargetCount_001 = '$TargetCount_001', TargetCount_HOLD = '$TargetCount_HOLD', TargetCount_MAN = '$TargetCount_MAN', 
				TargetCount_SUSP = '$TargetCount_SUSP',
				file_status = '$file_status', 
				IF4407_RC_Count = '$IF4407_RC_Count', IF4407_ORA_Count = '$IF4407_RC_Count', 
				NeeraCount_ACD = '$NeeraCount_ACD',  NeeraCount_DRD = '$NeeraCount_DRD', NeeraCount_IOI = '$NeeraCount_IOI', 
				NeeraCount_IOIN = '$NeeraCount_IOIN',
				GangaCount_ACD = '$GangaCount_ACD',  GangaCount_DRD = '$GangaCount_DRD', GangaCount_IOI = '$GangaCount_IOI', 
				GangaCount_IOIN = '$GangaCount_IOIN',				
				SY0265_RC_Count = '$SY0265_RC_Count', SY0265_ORA_Count = '$SY0265_ORA_Count',gend0805 = '$gend0805', jonname = '$jonname', 
				Maker = '$Maker', Checker = '$Checker', time = '$time', freeze = '1' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		
		else { 
			$sql1 = mysql_query("update checklist_pg07 set 
				 Count = '$Count', IN8899_Count = '$IN8899_Count', IN8899_StartTime = '$IN8899_StartTime', IN8899_EndTime = '$IN8899_EndTime', 
				SY0344_RC_Count = '$SY0344_RC_Count', SY0344_ORA_Count = '$SY0344_ORA_Count', 
				SY0VVR_RC_Count = '$SY0VVR_RC_Count', SY0VVR_ORA_Count = '$SY0VVR_ORA_Count',
				SY0433_RC_Count = '$SY0433_RC_Count', SY0433_ORA_Count = '$SY0433_ORA_Count',
				RC_Count = '$RC_Count', ORA_Count = '$ORA_Count', 
				NeeraCount_001 = '$NeeraCount_001', NeeraCount_HOLD = '$NeeraCount_HOLD', NeeraCount_MAN = '$NeeraCount_MAN', 
				NeeraCount_SUSP = '$NeeraCount_SUSP',
				TargetCount_001 = '$TargetCount_001', TargetCount_HOLD = '$TargetCount_HOLD', TargetCount_MAN = '$TargetCount_MAN', 
				TargetCount_SUSP = '$TargetCount_SUSP', 
				file_status = '$file_status', 
				IF4407_RC_Count = '$IF4407_RC_Count', IF4407_ORA_Count = '$IF4407_RC_Count', 
				NeeraCount_ACD = '$NeeraCount_ACD',  NeeraCount_DRD = '$NeeraCount_DRD', NeeraCount_IOI = '$NeeraCount_IOI', 
				NeeraCount_IOIN = '$NeeraCount_IOIN',
				GangaCount_ACD = '$GangaCount_ACD',  GangaCount_DRD = '$GangaCount_DRD', GangaCount_IOI = '$GangaCount_IOI', 
				GangaCount_IOIN = '$GangaCount_IOIN',
				SY0265_RC_Count = '$SY0265_RC_Count', SY0265_ORA_Count = '$SY0265_ORA_Count',gend0805 = '$gend0805',jonname = '$jonname', 
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg07'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			$sql1 = mysql_query ("INSERT INTO checklist_pg07 (  Count, IN8899_Count, IN8899_StartTime, IN8899_EndTime, SY0344_RC_Count, SY0344_ORA_Count, SY0VVR_RC_Count, SY0VVR_ORA_Count, SY0433_RC_Count, SY0433_ORA_Count, RC_Count, ORA_Count, NeeraCount_001, NeeraCount_HOLD, NeeraCount_MAN, NeeraCount_SUSP,
				TargetCount_001, TargetCount_HOLD, TargetCount_MAN, TargetCount_SUSP, 
				file_status, IF4407_RC_Count, IF4407_ORA_Count, 
				NeeraCount_ACD, NeeraCount_DRD, NeeraCount_IOI, NeeraCount_IOIN,
				GangaCount_ACD, GangaCount_DRD, GangaCount_IOI, GangaCount_IOIN,
				SY0265_RC_Count, SY0265_ORA_Count,gend0805, jonname, Maker, Checker, time, status, Inst_Date )
			    VALUES (  '$Count', '$IN8899_Count', '$IN8899_StartTime', '$IN8899_EndTime', '$SY0344_RC_Count', '$SY0344_ORA_Count', '$SY0VVR_RC_Count', '$SY0VVR_ORA_Count', '$SY0433_RC_Count', '$SY0433_ORA_Count', '$RC_Count', '$ORA_Count', 
				'$NeeraCount_001', '$NeeraCount_HOLD', '$NeeraCount_MAN', '$NeeraCount_SUSP',
				'$TargetCount_001', '$TargetCount_HOLD', '$TargetCount_MAN', '$TargetCount_SUSP', 
				'$file_status', '$IF4407_RC_Count', '$IF4407_ORA_Count', 
				'$NeeraCount_ACD', '$NeeraCount_DRD', '$NeeraCount_IOI', '$NeeraCount_IOIN',
				'$GangaCount_ACD', '$GangaCount_DRD', '$GangaCount_IOI', '$GangaCount_IOIN', 
				'$SY0265_RC_Count', '$SY0265_ORA_Count','$gend0805','$jonname', '$Maker', '$Checker', '$time', '$status', '$crrdate' )");
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}
	

/*<!------------------------------Checklist Page 08------------------------------------------->*/
if(isset($_POST['save_pg08']) || isset($_POST['submit_pg08'])){
		//$GL807A_RC_Count = $_POST['GL807A_RC_Count'];
		$ORA_Count = implode($_POST['ORA_Count'],"||");
		$RC_Count = implode($_POST['RC_Count'],"||");
		$File_Status_Count = implode($_POST['File_Status_Count'],"||");
		$Count = $_POST['Count'];
		$PreSync_Time = $_POST['PreSync_Time'];
		$RC_M = $_POST['RC_M'];
		$RC_S1 = $_POST['RC_S1'];
		$RC_S2 =  $_POST['RC_S2'];
		$RC_S3 =  $_POST['RC_S3'];
		$RC_S4 = $_POST['RC_S4'];
		$RC_S5 = $_POST['RC_S5'];
		$RC_S6 = $_POST['RC_S6'];
		$RC_S7 = $_POST['RC_S7'];
		$RC_S8 = $_POST['RC_S8'];
		$ORA_M = $_POST['ORA_M'];
		$ORA_S1 = $_POST['ORA_S1'];
		$ORA_S2 = $_POST['ORA_S2'];
		$ORA_S3 = $_POST['ORA_S3'];
		$ORA_S4 = $_POST['ORA_S4'];
		$ORA_S5 = $_POST['ORA_S5'];
		$ORA_S6 = $_POST['ORA_S6'];
		$ORA_S7 = $_POST['ORA_S7'];
		$ORA_S8 = $_POST['ORA_S8'];
		$Sutlej_GW900T_Count = $_POST['Sutlej_GW900T_Count'];
		$Sutlej_GW900T_indv_Count = $_POST['Sutlej_GW900T_indv_Count'];
		$Sutlej_GLCC_Count = $_POST['Sutlej_GLCC_Count'];
		$Sutlej_GLCC_indv_Count = $_POST['Sutlej_GLCC_indv_Count'];
		$Sutlej_CreditAmt = $_POST['Sutlej_CreditAmt'];
		$Sutlej_DebitAmt = $_POST['Sutlej_DebitAmt'];
		$Ganga_GW900T_Count = $_POST['Ganga_GW900T_Count'];
		$Ganga_GW900T_indv_Count = $_POST['Ganga_GW900T_indv_Count'];
		$Ganga_GLCC_Count = $_POST['Ganga_GLCC_Count'];
		$Ganga_GLCC_indv_Count = $_POST['Ganga_GLCC_indv_Count'];
		$Ganga_CreditAmt =  $_POST['Ganga_CreditAmt'];
		$Ganga_DebitAmt = $_POST['Ganga_DebitAmt'];
		$Sharda_GW900T_Count = $_POST['Sharda_GW900T_Count'];
		$Sharda_GW900T_indv_Count = $_POST['Sharda_GW900T_indv_Count'];
		$Sharda_GLCC_Count = $_POST['Sharda_GLCC_Count'];
		$Sharda_GLCC_indv_Count = $_POST['Sharda_GLCC_indv_Count'];
		$Sharda_CreditAmt =  $_POST['Sharda_CreditAmt'];
		$Sharda_DebitAmt = $_POST['Sharda_DebitAmt'];
		$Girija_GW900T_Count  = $_POST['Girija_GW900T_Count'];
		$Girija_GLCC_indv_Count = $_POST['Girija_GLCC_indv_Count'];
		$Girija_GLCC_Count = $_POST['Girija_GLCC_Count'];
		$Girija_GW900T_indv_Count = $_POST['Girija_GW900T_indv_Count'];
		$Girija_CreditAmt = $_POST['Girija_CreditAmt'];
		$Girija_DebitAmt = $_POST['Girija_DebitAmt'];
		$Jamuna_GW900T_Count = $_POST['Jamuna_GW900T_Count'];
		$Jamuna_GW900T_indv_Count = $_POST['Jamuna_GW900T_indv_Count'];
		$Jamuna_GLCC_Count = $_POST['Jamuna_GLCC_Count'];
		$Jamuna_GLCC_indv_Count = $_POST['Jamuna_GLCC_indv_Count'];
		$Jamuna_CreditAmt = $_POST['Jamuna_CreditAmt'];
		$Jamuna_DebitAmt =  $_POST['Jamuna_DebitAmt'];
		$Jhelum_GW900T_Count =  $_POST['Jhelum_GW900T_Count'];
		$Jhelum_GW900T_indv_Count = $_POST['Jhelum_GW900T_indv_Count'];
		$Jhelum_GLCC_Count = $_POST['Jhelum_GLCC_Count'];
		$Jhelum_GLCC_indv_Count = $_POST['Jhelum_GLCC_indv_Count'];
		$Jhelum_CreditAmt = $_POST['Jhelum_CreditAmt'];
		$Jhelum_DebitAmt = $_POST['Jhelum_DebitAmt'];
		$Bhargavi_GW900T_Count = $_POST['Bhargavi_GW900T_Count'];
		$Bhargavi_GW900T_indv_Count = $_POST['Bhargavi_GW900T_indv_Count'];
		$Bhargavi_GLCC_Count = $_POST['Bhargavi_GLCC_Count'];
		$Bhargavi_GLCC_indv_Count = $_POST['Bhargavi_GLCC_indv_Count'];
		$Bhargavi_CreditAmt = $_POST['Bhargavi_CreditAmt'];
		$Bhargavi_DebitAmt = $_POST['Bhargavi_DebitAmt'];
		$Mandovi_GW900T_Count = $_POST['Mandovi_GW900T_Count'];
		$Mandovi_GW900T_indv_Count = $_POST['Mandovi_GW900T_indv_Count'];
		$Mandovi_GLCC_Count = $_POST['Mandovi_GLCC_Count'];
		$Mandovi_GLCC_indv_Count = $_POST['Mandovi_GLCC_indv_Count'];
		$Mandovi_CreditAmt=$_POST['Mandovi_CreditAmt'];
		$Mandovi_DebitAmt = $_POST['Mandovi_DebitAmt'];
		$Terna_GW900T_Count = $_POST['Terna_GW900T_Count'];
		$Terna_GW900T_indv_Count = $_POST['Terna_GW900T_indv_Count'];
		$Terna_GLCC_Count = $_POST['Terna_GLCC_Count'];
		$Terna_GLCC_indv_Count = $_POST['Terna_GLCC_indv_Count'];
		$Terna_CreditAmt = $_POST['Terna_CreditAmt'];
		$Terna_DebitAmt = $_POST['Terna_DebitAmt'];
		$cmt = $_POST['cmt'];
		//$path=implode($_POST['path'],",");
		$Sutlej=implode($_POST['Sutlej'],",");
		$Finance_One=implode($_POST['Finance_One'],",");
		$Maker = implode(",",$_POST['Maker']);
		$Checker = implode(",",$_POST['Checker']);
		$time = implode(",",$_POST['time']);
		$status='1';
		$crrdate = mflags();
		$ma=substr_count($Maker,",,");
		$ck=substr_count($Checker,",,");
		$tm=substr_count($time,",,");
		
		$query = mysql_query("select * from checklist_pg08 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg08 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg08'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Maker | Checker | Checked Time;')</script>";
			}
		else{
				$sql = mysql_query ("update checklist_pg08 set 
				ORA_Count = '$ORA_Count', RC_Count = '$RC_Count', File_Status_Count = '$File_Status_Count',
				Count = '$Count', PreSync_Time = '$PreSync_Time', 
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				
				Sutlej_GW900T_Count = '$Sutlej_GW900T_Count', Sutlej_GW900T_indv_Count = '$Sutlej_GW900T_indv_Count', Sutlej_GLCC_Count = '$Sutlej_GLCC_Count', Sutlej_GLCC_indv_Count = '$Sutlej_GLCC_indv_Count',
				Sutlej_CreditAmt = '$Sutlej_CreditAmt', Sutlej_DebitAmt = '$Sutlej_DebitAmt',
				
				Ganga_GW900T_Count = '$Ganga_GW900T_Count', Ganga_GW900T_indv_Count = '$Ganga_GW900T_indv_Count', Ganga_GLCC_Count = '$Ganga_GLCC_Count', Ganga_GLCC_indv_Count = '$Ganga_GLCC_indv_Count',
				Ganga_CreditAmt = '$Ganga_CreditAmt', Ganga_DebitAmt = '$Ganga_DebitAmt',
				
				Sharda_GW900T_Count = '$Sharda_GW900T_Count', Sharda_GW900T_indv_Count = '$Sharda_GW900T_indv_Count', Sharda_GLCC_Count = '$Sharda_GLCC_Count', Sharda_GLCC_indv_Count = '$Sharda_GLCC_indv_Count',
				Sharda_CreditAmt = '$Sharda_CreditAmt', Sharda_DebitAmt = '$Sharda_DebitAmt',
				
				Girija_GW900T_Count = '$Girija_GW900T_Count', Girija_GW900T_indv_Count = '$Girija_GW900T_indv_Count', Girija_GLCC_Count = '$Girija_GLCC_Count', Girija_GLCC_indv_Count = '$Girija_GLCC_indv_Count',
				Girija_CreditAmt = '$Girija_CreditAmt', Girija_DebitAmt = '$Girija_DebitAmt',
				
				Jamuna_GW900T_Count = '$Jamuna_GW900T_Count', Jamuna_GW900T_indv_Count = '$Jamuna_GW900T_indv_Count', Jamuna_GLCC_Count = '$Jamuna_GLCC_Count', Jamuna_GLCC_indv_Count = '$Jamuna_GLCC_indv_Count',
				Jamuna_CreditAmt = '$Jamuna_CreditAmt', Jamuna_DebitAmt = '$Jamuna_DebitAmt',
				
				Jhelum_GW900T_Count = '$Jhelum_GW900T_Count', Jhelum_GW900T_indv_Count = '$Jhelum_GW900T_indv_Count', Jhelum_GLCC_Count = '$Jhelum_GLCC_Count', Jhelum_GLCC_indv_Count = '$Jhelum_GLCC_indv_Count',
				Jhelum_CreditAmt = '$Jhelum_CreditAmt', Jhelum_DebitAmt = '$Jhelum_DebitAmt',
				
				Bhargavi_GW900T_Count = '$Bhargavi_GW900T_Count', Bhargavi_GW900T_indv_Count = '$Bhargavi_GW900T_indv_Count', Bhargavi_GLCC_Count = '$Bhargavi_GLCC_Count', Bhargavi_GLCC_indv_Count = '$Bhargavi_GLCC_indv_Count',
				Bhargavi_CreditAmt = '$Bhargavi_CreditAmt', Bhargavi_DebitAmt = '$Bhargavi_DebitAmt',
				
				Mandovi_GW900T_Count = '$Mandovi_GW900T_Count', Mandovi_GW900T_indv_Count = '$Mandovi_GW900T_indv_Count', Mandovi_GLCC_Count = '$Mandovi_GLCC_Count', Mandovi_GLCC_indv_Count = '$Mandovi_GLCC_indv_Count',
				Mandovi_CreditAmt = '$Mandovi_CreditAmt', Mandovi_DebitAmt = '$Mandovi_DebitAmt',
				
				Terna_GW900T_Count = '$Terna_GW900T_Count', Terna_GW900T_indv_Count = '$Terna_GW900T_indv_Count', Terna_GLCC_Count = '$Terna_GLCC_Count', Terna_GLCC_indv_Count = '$Terna_GLCC_indv_Count',
				Terna_CreditAmt = '$Terna_CreditAmt', Terna_DebitAmt = '$Terna_DebitAmt',
				
				Maker = '$Maker', Checker = '$Checker',  Sutlej = '$Sutlej', Finance_One = '$Finance_One', time = '$time', cmt = '$cmt', freeze = '1' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}	
		
		else { 
			$sql1 = mysql_query("update checklist_pg08 set 
				 ORA_Count = '$ORA_Count', RC_Count = '$RC_Count', File_Status_Count = '$File_Status_Count',
				Count = '$Count',  PreSync_Time = '$PreSync_Time', 
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				
				Sutlej_GW900T_Count = '$Sutlej_GW900T_Count', Sutlej_GW900T_indv_Count = '$Sutlej_GW900T_indv_Count', Sutlej_GLCC_Count = '$Sutlej_GLCC_Count', Sutlej_GLCC_indv_Count = '$Sutlej_GLCC_indv_Count',
				Sutlej_CreditAmt = '$Sutlej_CreditAmt', Sutlej_DebitAmt = '$Sutlej_DebitAmt',
				
				Ganga_GW900T_Count = '$Ganga_GW900T_Count', Ganga_GW900T_indv_Count = '$Ganga_GW900T_indv_Count', Ganga_GLCC_Count = '$Ganga_GLCC_Count', Ganga_GLCC_indv_Count = '$Ganga_GLCC_indv_Count',
				Ganga_CreditAmt = '$Ganga_CreditAmt', Ganga_DebitAmt = '$Ganga_DebitAmt',
				
				Sharda_GW900T_Count = '$Sharda_GW900T_Count', Sharda_GW900T_indv_Count = '$Sharda_GW900T_indv_Count', Sharda_GLCC_Count = '$Sharda_GLCC_Count', Sharda_GLCC_indv_Count = '$Sharda_GLCC_indv_Count',
				Sharda_CreditAmt = '$Sharda_CreditAmt', Sharda_DebitAmt = '$Sharda_DebitAmt',
				
				Girija_GW900T_Count = '$Girija_GW900T_Count', Girija_GW900T_indv_Count = '$Girija_GW900T_indv_Count', Girija_GLCC_Count = '$Girija_GLCC_Count', Girija_GLCC_indv_Count = '$Girija_GLCC_indv_Count',
				Girija_CreditAmt = '$Girija_CreditAmt', Girija_DebitAmt = '$Girija_DebitAmt',
				
				Jamuna_GW900T_Count = '$Jamuna_GW900T_Count', Jamuna_GW900T_indv_Count = '$Jamuna_GW900T_indv_Count', Jamuna_GLCC_Count = '$Jamuna_GLCC_Count', Jamuna_GLCC_indv_Count = '$Jamuna_GLCC_indv_Count',
				Jamuna_CreditAmt = '$Jamuna_CreditAmt', Jamuna_DebitAmt = '$Jamuna_DebitAmt',
				
				Jhelum_GW900T_Count = '$Jhelum_GW900T_Count', Jhelum_GW900T_indv_Count = '$Jhelum_GW900T_indv_Count', Jhelum_GLCC_Count = '$Jhelum_GLCC_Count', Jhelum_GLCC_indv_Count = '$Jhelum_GLCC_indv_Count',
				Jhelum_CreditAmt = '$Jhelum_CreditAmt', Jhelum_DebitAmt = '$Jhelum_DebitAmt',
				
				Bhargavi_GW900T_Count = '$Bhargavi_GW900T_Count', Bhargavi_GW900T_indv_Count = '$Bhargavi_GW900T_indv_Count', Bhargavi_GLCC_Count = '$Bhargavi_GLCC_Count', Bhargavi_GLCC_indv_Count = '$Bhargavi_GLCC_indv_Count',
				Bhargavi_CreditAmt = '$Bhargavi_CreditAmt', Bhargavi_DebitAmt = '$Bhargavi_DebitAmt',
				
				Mandovi_GW900T_Count = '$Mandovi_GW900T_Count', Mandovi_GW900T_indv_Count = '$Mandovi_GW900T_indv_Count', Mandovi_GLCC_Count = '$Mandovi_GLCC_Count', Mandovi_GLCC_indv_Count = '$Mandovi_GLCC_indv_Count',
				Mandovi_CreditAmt = '$Mandovi_CreditAmt', Mandovi_DebitAmt = '$Mandovi_DebitAmt',
				
				Terna_GW900T_Count = '$Terna_GW900T_Count', Terna_GW900T_indv_Count = '$Terna_GW900T_indv_Count', Terna_GLCC_Count = '$Terna_GLCC_Count', Terna_GLCC_indv_Count = '$Terna_GLCC_indv_Count',
				Terna_CreditAmt = '$Terna_CreditAmt', Terna_DebitAmt = '$Terna_DebitAmt',
				Maker =  '$Maker', Checker =  '$Checker',  Sutlej = '$Sutlej', Finance_One = '$Finance_One',  cmt = '$cmt', time =  '$time' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Updated')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg08'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			$sql1 = mysql_query ("INSERT INTO checklist_pg08 (  Count, ORA_Count, RC_Count, File_Status_Count ,PreSync_Time, RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, Sutlej_GW900T_Count, Sutlej_GW900T_indv_Count, Sutlej_GLCC_Count, Sutlej_GLCC_indv_Count, Sutlej_CreditAmt, Sutlej_DebitAmt, Ganga_GW900T_Count, Ganga_GW900T_indv_Count, Ganga_GLCC_Count, Ganga_GLCC_indv_Count, Ganga_CreditAmt, Ganga_DebitAmt, Sharda_GW900T_Count, Sharda_GW900T_indv_Count, Sharda_GLCC_Count, Sharda_GLCC_indv_Count, Sharda_CreditAmt, Sharda_DebitAmt, Girija_GW900T_Count, Girija_GW900T_indv_Count, Girija_GLCC_Count, Girija_GLCC_indv_Count, Girija_CreditAmt, Girija_DebitAmt, Jamuna_GW900T_Count, Jamuna_GW900T_indv_Count, Jamuna_GLCC_Count, Jamuna_GLCC_indv_Count, Jamuna_CreditAmt, Jamuna_DebitAmt, Jhelum_GW900T_Count, Jhelum_GW900T_indv_Count, Jhelum_GLCC_Count, Jhelum_GLCC_indv_Count, Jhelum_CreditAmt, Jhelum_DebitAmt, Bhargavi_GW900T_Count, Bhargavi_GW900T_indv_Count, Bhargavi_GLCC_Count, Bhargavi_GLCC_indv_Count, Bhargavi_CreditAmt, Bhargavi_DebitAmt, Mandovi_GW900T_Count, Mandovi_GW900T_indv_Count, Mandovi_GLCC_Count, Mandovi_GLCC_indv_Count, Mandovi_CreditAmt, Mandovi_DebitAmt, Terna_GW900T_Count, Terna_GW900T_indv_Count, Terna_GLCC_Count, Terna_GLCC_indv_Count, Terna_CreditAmt, Terna_DebitAmt, Maker, Checker,Sutlej , Finance_One, time, status, cmt, Inst_Date )
			    VALUES (  '$Count', '$ORA_Count', '$RC_Count', '$File_Status_Count', '$PreSync_Time', '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', '$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', '$Sutlej_GW900T_Count', '$Sutlej_GW900T_indv_Count', '$Sutlej_GLCC_Count', '$Sutlej_GLCC_indv_Count', '$Sutlej_CreditAmt', '$Sutlej_DebitAmt', '$Ganga_GW900T_Count', '$Ganga_GW900T_indv_Count', '$Ganga_GLCC_Count', '$Ganga_GLCC_indv_Count', '$Ganga_CreditAmt', '$Ganga_DebitAmt', '$Sharda_GW900T_Count', '$Sharda_GW900T_indv_Count', '$Sharda_GLCC_Count', '$Sharda_GLCC_indv_Count', '$Sharda_CreditAmt', '$Sharda_DebitAmt', '$Girija_GW900T_Count', '$Girija_GW900T_indv_Count', '$Girija_GLCC_Count', '$Girija_GLCC_indv_Count', '$Girija_CreditAmt', '$Girija_DebitAmt', '$Jamuna_GW900T_Count', '$Jamuna_GW900T_indv_Count', '$Jamuna_GLCC_Count', '$Jamuna_GLCC_indv_Count', '$Jamuna_CreditAmt', '$Jamuna_DebitAmt', '$Jhelum_GW900T_Count', '$Jhelum_GW900T_indv_Count', '$Jhelum_GLCC_Count', '$Jhelum_GLCC_indv_Count', '$Jhelum_CreditAmt', '$Jhelum_DebitAmt', '$Bhargavi_GW900T_Count', '$Bhargavi_GW900T_indv_Count', '$Bhargavi_GLCC_Count', '$Bhargavi_GLCC_indv_Count', '$Bhargavi_CreditAmt', '$Bhargavi_DebitAmt', '$Mandovi_GW900T_Count', '$Mandovi_GW900T_indv_Count', '$Mandovi_GLCC_Count', '$Mandovi_GLCC_indv_Count', '$Mandovi_CreditAmt', '$Mandovi_DebitAmt', '$Terna_GW900T_Count', '$Terna_GW900T_indv_Count', '$Terna_GLCC_Count', '$Terna_GLCC_indv_Count', '$Terna_CreditAmt', '$Terna_DebitAmt', '$Maker', '$Checker','$Sutlej' , '$Finance_One' , '$time', '$status', '$cmt', '$crrdate' ) ");
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}


/*<!--------------------------------------------Checklist Page 09------------------------------------>*/
if(isset($_POST['save_pg09']) || isset($_POST['submit_pg09'])){
			$PostEOD_StartTime = $_POST['PostEOD_StartTime'];
			$PostEOD_EndTime = $_POST['PostEOD_EndTime'];
			$M_Count = $_POST['M_Count'];
			$S1_Count = $_POST['S1_Count'];
			$S2_Count = $_POST['S2_Count'];
			$S3_Count = $_POST['S3_Count'];
			$S4_Count = $_POST['S4_Count'];
			$S5_Count = $_POST['S5_Count'];
			$S6_Count = $_POST['S6_Count'];
			$S7_Count = $_POST['S7_Count'];
			$S8_Count = $_POST['S8_Count'];
			$M_CurrentDate = $_POST['M_CurrentDate'];
			$M_DaySystemDate = $_POST['M_DaySystemDate'];
			$M_NightSystemDate = $_POST['M_NightSystemDate'];
			$S1_CurrentDate = $_POST['S1_CurrentDate'];
			$S1_DaySystemDate = $_POST['S1_DaySystemDate'];
			$S1_NightSystemDate = $_POST['S1_NightSystemDate'];
			$S2_CurrentDate = $_POST['S2_CurrentDate'];
			$S2_DaySystemDate = $_POST['S2_DaySystemDate'];
			$S2_NightSystemDate = $_POST['S2_NightSystemDate'];
			$S3_CurrentDate = $_POST['S3_CurrentDate'];
			$S3_DaySystemDate = $_POST['S3_DaySystemDate'];
			$S3_NightSystemDate = $_POST['S3_NightSystemDate'];
			$S4_CurrentDate = $_POST['S4_CurrentDate'];
			$S4_DaySystemDate = $_POST['S4_DaySystemDate'];
			$S4_NightSystemDate = $_POST['S4_NightSystemDate'];
			$S5_CurrentDate = $_POST['S5_CurrentDate'];
			$S5_DaySystemDate = $_POST['S5_DaySystemDate'];
			$S5_NightSystemDate =  $_POST['S5_NightSystemDate'];
			$S6_CurrentDate = $_POST['S6_CurrentDate'];
			$S6_DaySystemDate = $_POST['S6_DaySystemDate'];
			$S6_NightSystemDate = $_POST['S6_NightSystemDate'];
			$S7_CurrentDate = $_POST['S7_CurrentDate'];
			$S7_DaySystemDate = $_POST['S7_DaySystemDate'];
			$S7_NightSystemDate =  $_POST['S7_NightSystemDate'];
			$S8_CurrentDate = $_POST['S8_CurrentDate'];
			$S8_DaySystemDate  = $_POST['S8_DaySystemDate'];
			$S8_NightSystemDate = $_POST['S8_NightSystemDate'];
			$DEPP_Count = $_POST['DEPP_Count'];
			$LONP_Count = $_POST['LONP_Count'];
			$CTAP_Count = $_POST['CTAP_Count'];
			$ERMP_Count = $_POST['ERMP_Count'];
			$ED2P_Count = $_POST['ED2P_Count'];
			$ED1P_Count = $_POST['ED1P_Count'];
			$GLCP_Count = $_POST['GLCP_Count'];
			$GLPP_Count = $_POST['GLPP_Count'];
			$idSpool_M = $_POST['idSpool_M'];
			$idSpool_S1 =  $_POST['idSpool_S1'];
			$idSpool_S2 =  $_POST['idSpool_S2'];
			$idSpool_S3 = $_POST['idSpool_S3'];
			$idSpool_S4 = $_POST['idSpool_S4'];
			$idSpool_S5 = $_POST['idSpool_S5'];
			$idSpool_S6 = $_POST['idSpool_S6'];
			$idSpool_S7 = $_POST['idSpool_S7'];
			$idSpool_S8 = $_POST['idSpool_S8'];
			$lSpool_M = $_POST['lSpool_M'];
			$lSpool_S1 = $_POST['lSpool_S1'];
			$lSpool_S2 = $_POST['lSpool_S2'];
			$lSpool_S3 = $_POST['lSpool_S3'];
			$lSpool_S4 = $_POST['lSpool_S4'];
			$lSpool_S5 = $_POST['lSpool_S5'];
			$lSpool_S6 = $_POST['lSpool_S6'];
			$lSpool_S7 = $_POST['lSpool_S7'];
			$lSpool_S8 = $_POST['lSpool_S8'];
			$lSysout_M=$_POST['lSysout_M'];
			$lSysout_S1 = $_POST['lSysout_S1'];
			$lSysout_S2 = $_POST['lSysout_S2'];
			$lSysout_S3 = $_POST['lSysout_S3'];
			$lSysout_S4 = $_POST['lSysout_S4'];
			$lSysout_S5 = $_POST['lSysout_S5'];
			$lSysout_S6 = $_POST['lSysout_S6'];
			$lSysout_S7 = $_POST['lSysout_S7'];
			$lSysout_S8 = $_POST['lSysout_S8'];
			$idSysout_M = $_POST['idSysout_M'];
			$idSysout_S1 = $_POST['idSysout_S1'];
			$idSysout_S2 = $_POST['idSysout_S2'];
			$idSysout_S3 = $_POST['idSysout_S3'];
			$idSysout_S4 = $_POST['idSysout_S4'];
			$idSysout_S5 = $_POST['idSysout_S5'];
			$idSysout_S6 = $_POST['idSysout_S6'];
			$idSysout_S7 = $_POST['idSysout_S7'];
			$idSysout_S8 = $_POST['idSysout_S8'];
			$M = $_POST['M'];
			$S1 = $_POST['S1'];
			$S2 = $_POST['S2'];
			$S3 = $_POST['S3'];
			$S4 = $_POST['S4'];
			$S5 = $_POST['S5'];
			$S6 = $_POST['S6'];
			$S7 = $_POST['S7'];
			$S8 = $_POST['S8'];
			$Repli_M = $_POST['Repli_M'];
			$Repli_S1 = $_POST['Repli_S1'];
			$Repli_S2 = $_POST['Repli_S2'];
			$Repli_S3 = $_POST['Repli_S3'];
			$Repli_S4 = $_POST['Repli_S4'];
			$Repli_S5 = $_POST['Repli_S5'];
			$Repli_S6 = $_POST['Repli_S6'];
			$Repli_S7 = $_POST['Repli_S7'];
			$Repli_S8 = $_POST['Repli_S8'];
			$Maker = implode(",",$_POST['Maker']);
			$Checker = implode(",",$_POST['Checker']);
			$time = implode(",",$_POST['time']);
			$status='1';
			$crrdate = mflags();
			$ma=substr_count($Maker,",,");
			$ck=substr_count($Checker,",,");
			$tm=substr_count($time,",,");
			
			
			
			$unset_remark = implode(",",$_POST['unset_remark']);
			
			
			
			
		$query = mysql_query("select * from checklist_pg09 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg09 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg09'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
			}
		else{
				$sql = mysql_query ("update checklist_pg09 set 
				PostEOD_StartTime = '$PostEOD_StartTime', PostEOD_EndTime = '$PostEOD_EndTime', 
				M_Count = '$M_Count', S1_Count = '$S1_Count', S2_Count = '$S2_Count', S3_Count = '$S3_Count', S4_Count = '$S4_Count', S5_Count = '$S5_Count', S6_Count = '$S6_Count', S7_Count = '$S7_Count', S8_Count = '$S8_Count', 
				M_CurrentDate = '$M_CurrentDate', M_DaySystemDate = '$M_DaySystemDate', M_NightSystemDate = '$M_NightSystemDate',
				S1_CurrentDate = '$S1_CurrentDate', S1_DaySystemDate = '$S1_DaySystemDate', S1_NightSystemDate = '$S1_NightSystemDate',
				S2_CurrentDate = '$S2_CurrentDate', S2_DaySystemDate = '$S2_DaySystemDate', S2_NightSystemDate = '$S2_NightSystemDate', 
				S3_CurrentDate = '$S3_CurrentDate', S3_DaySystemDate = '$S3_DaySystemDate', S3_NightSystemDate = '$S3_NightSystemDate', 
				S4_CurrentDate = '$S4_CurrentDate', S4_DaySystemDate = '$S4_DaySystemDate', S4_NightSystemDate = '$S4_NightSystemDate', 
				S5_CurrentDate = '$S5_CurrentDate', S5_DaySystemDate = '$S5_DaySystemDate', S5_NightSystemDate = '$S5_NightSystemDate', 
				S6_CurrentDate = '$S6_CurrentDate', S6_DaySystemDate = '$S6_DaySystemDate', S6_NightSystemDate = '$S6_NightSystemDate', 
				S7_CurrentDate = '$S7_CurrentDate', S7_DaySystemDate = '$S7_DaySystemDate', S7_NightSystemDate = '$S7_NightSystemDate', 
				S8_CurrentDate = '$S8_CurrentDate', S8_DaySystemDate = '$S8_DaySystemDate', S8_NightSystemDate = '$S8_NightSystemDate', 
				DEPP_Count = '$DEPP_Count', LONP_Count = '$LONP_Count', CTAP_Count = '$CTAP_Count', ERMP_Count = '$ERMP_Count', ED2P_Count = '$ED2P_Count', ED1P_Count = '$ED1P_Count', GLCP_Count = '$GLCP_Count', GLPP_Count = '$GLPP_Count', 
				idSpool_M = '$idSpool_M', idSpool_S1 = '$idSpool_S1', idSpool_S2 = '$idSpool_S2', idSpool_S3 = '$idSpool_S3', idSpool_S4 = '$idSpool_S4', idSpool_S5 = '$idSpool_S5', idSpool_S6 = '$idSpool_S6', idSpool_S7 = '$idSpool_S7', idSpool_S8 = '$idSpool_S8',
				lSpool_M = '$lSpool_M', lSpool_S1 = '$lSpool_S1', lSpool_S2 = '$lSpool_S2', lSpool_S3 = '$lSpool_S3', lSpool_S4 = '$lSpool_S4', lSpool_S5 = '$lSpool_S5', lSpool_S6 = '$lSpool_S6', lSpool_S7 = '$lSpool_S7', lSpool_S8 = '$lSpool_S8',
				lSysout_M = '$lSysout_M', lSysout_S1 = '$lSysout_S1', lSysout_S2 = '$lSysout_S2', lSysout_S3 = '$lSysout_S3', lSysout_S4 = '$lSysout_S4', lSysout_S5 = '$lSysout_S5', lSysout_S6 = '$lSysout_S6', lSysout_S7 = '$lSysout_S7', lSysout_S8 = '$lSysout_S8',
				idSysout_M = '$idSysout_M', idSysout_S1 = '$idSysout_S1', idSysout_S2 = '$idSysout_S2', idSysout_S3 = '$idSysout_S3', idSysout_S4 = '$idSysout_S4', idSysout_S5 = '$idSysout_S5', idSysout_S6 = '$idSysout_S6', idSysout_S7 = '$idSysout_S7', idSysout_S8 = '$idSysout_S8',
				M = '$M', S1 = '$S1', S2 = '$S2', S3='$S3', S4 = '$S4', S5 = '$S5', S6 = '$S6', S7 = '$S7', S8 = '$S8',
				Repli_M = '$Repli_M', Repli_S1 = '$Repli_S1', Repli_S2 = '$Repli_S2', Repli_S3 = '$Repli_S3', Repli_S4 = '$Repli_S4', Repli_S5 = '$Repli_S5', Repli_S6 = '$Repli_S6', Repli_S7 = '$Repli_S7', Repli_S8 = '$Repli_S8',unset_remark = '$unset_remark',
				Maker = '$Maker', Checker = '$Checker', time = '$time', freeze = '1' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		
		else { 
			$sql1 = mysql_query("update checklist_pg09 set 
				 PostEOD_StartTime = '$PostEOD_StartTime', PostEOD_EndTime = '$PostEOD_EndTime', 
				M_Count = '$M_Count', S1_Count = '$S1_Count', S2_Count = '$S2_Count', S3_Count = '$S3_Count', S4_Count = '$S4_Count', S5_Count = '$S5_Count', S6_Count = '$S6_Count', S7_Count = '$S7_Count', S8_Count = '$S8_Count', 
				M_CurrentDate = '$M_CurrentDate', M_DaySystemDate = '$M_DaySystemDate', M_NightSystemDate = '$M_NightSystemDate',
				S1_CurrentDate = '$S1_CurrentDate', S1_DaySystemDate = '$S1_DaySystemDate', S1_NightSystemDate = '$S1_NightSystemDate',
				S2_CurrentDate = '$S2_CurrentDate', S2_DaySystemDate = '$S2_DaySystemDate', S2_NightSystemDate = '$S2_NightSystemDate', 
				S3_CurrentDate = '$S3_CurrentDate', S3_DaySystemDate = '$S3_DaySystemDate', S3_NightSystemDate = '$S3_NightSystemDate', 
				S4_CurrentDate = '$S4_CurrentDate', S4_DaySystemDate = '$S4_DaySystemDate', S4_NightSystemDate = '$S4_NightSystemDate', 
				S5_CurrentDate = '$S5_CurrentDate', S5_DaySystemDate = '$S5_DaySystemDate', S5_NightSystemDate = '$S5_NightSystemDate', 
				S6_CurrentDate = '$S6_CurrentDate', S6_DaySystemDate = '$S6_DaySystemDate', S6_NightSystemDate = '$S6_NightSystemDate', 
				S7_CurrentDate = '$S7_CurrentDate', S7_DaySystemDate = '$S7_DaySystemDate', S7_NightSystemDate = '$S7_NightSystemDate', 
				S8_CurrentDate = '$S8_CurrentDate', S8_DaySystemDate = '$S8_DaySystemDate', S8_NightSystemDate = '$S8_NightSystemDate', 
				DEPP_Count = '$DEPP_Count', LONP_Count = '$LONP_Count', CTAP_Count = '$CTAP_Count', ERMP_Count = '$ERMP_Count', ED2P_Count = '$ED2P_Count', ED1P_Count = '$ED1P_Count', GLCP_Count = '$GLCP_Count', GLPP_Count = '$GLPP_Count', 
				idSpool_M = '$idSpool_M', idSpool_S1 = '$idSpool_S1', idSpool_S2 = '$idSpool_S2', idSpool_S3 = '$idSpool_S3', idSpool_S4 = '$idSpool_S4', idSpool_S5 = '$idSpool_S5', idSpool_S6 = '$idSpool_S6', idSpool_S7 = '$idSpool_S7', idSpool_S8 = '$idSpool_S8',
				lSpool_M = '$lSpool_M', lSpool_S1 = '$lSpool_S1', lSpool_S2 = '$lSpool_S2', lSpool_S3 = '$lSpool_S3', lSpool_S4 = '$lSpool_S4', lSpool_S5 = '$lSpool_S5', lSpool_S6 = '$lSpool_S6', lSpool_S7 = '$lSpool_S7', lSpool_S8 = '$lSpool_S8',
				lSysout_M = '$lSysout_M', lSysout_S1 = '$lSysout_S1', lSysout_S2 = '$lSysout_S2', lSysout_S3 = '$lSysout_S3', lSysout_S4 = '$lSysout_S4', lSysout_S5 = '$lSysout_S5', lSysout_S6 = '$lSysout_S6', lSysout_S7 = '$lSysout_S7', lSysout_S8 = '$lSysout_S8',
				idSysout_M = '$idSysout_M', idSysout_S1 = '$idSysout_S1', idSysout_S2 = '$idSysout_S2', idSysout_S3 = '$idSysout_S3', idSysout_S4 = '$idSysout_S4', idSysout_S5 = '$idSysout_S5', idSysout_S6 = '$idSysout_S6', idSysout_S7 = '$idSysout_S7', idSysout_S8 = '$idSysout_S8',
				M = '$M', S1 = '$S1', S2 = '$S2', S3='$S3', S4 = '$S4', S5 = '$S5', S6 = '$S6', S7 = '$S7', S8 = '$S8',
				Repli_M = '$Repli_M', Repli_S1 = '$Repli_S1', Repli_S2 = '$Repli_S2', Repli_S3 = '$Repli_S3', Repli_S4 = '$Repli_S4', Repli_S5 = '$Repli_S5', Repli_S6 = '$Repli_S6', Repli_S7 = '$Repli_S7', Repli_S8 = '$Repli_S8',unset_remark = '$unset_remark',
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg09'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			$sql1 = mysql_query ("INSERT INTO checklist_pg09 ( PostEOD_StartTime, PostEOD_EndTime, M_Count, S1_Count, S2_Count, S3_Count, S4_Count, S5_Count, S6_Count, S7_Count, S8_Count, M_CurrentDate, M_DaySystemDate, M_NightSystemDate, S1_CurrentDate, S1_DaySystemDate, S1_NightSystemDate, S2_CurrentDate, S2_DaySystemDate, S2_NightSystemDate, S3_CurrentDate, S3_DaySystemDate, S3_NightSystemDate, S4_CurrentDate, S4_DaySystemDate, S4_NightSystemDate, S5_CurrentDate, S5_DaySystemDate, S5_NightSystemDate, S6_CurrentDate, S6_DaySystemDate, S6_NightSystemDate, S7_CurrentDate, S7_DaySystemDate, S7_NightSystemDate, S8_CurrentDate, S8_DaySystemDate, S8_NightSystemDate, DEPP_Count, LONP_Count, CTAP_Count, ERMP_Count, ED2P_Count, ED1P_Count, GLCP_Count, GLPP_Count, idSpool_M, idSpool_S1, idSpool_S2, idSpool_S3, idSpool_S4, idSpool_S5, idSpool_S6, idSpool_S7, idSpool_S8, lSpool_M, lSpool_S1, lSpool_S2, lSpool_S3, lSpool_S4, lSpool_S5, lSpool_S6, lSpool_S7, lSpool_S8, lSysout_M, lSysout_S1, lSysout_S2, lSysout_S3, lSysout_S4, lSysout_S5, lSysout_S6, lSysout_S7, lSysout_S8, idSysout_M, idSysout_S1, idSysout_S2, idSysout_S3, idSysout_S4, idSysout_S5, idSysout_S6, idSysout_S7, idSysout_S8, M, S1, S2, S3, S4, S5, S6, S7, S8, Repli_M, Repli_S1, Repli_S2, Repli_S3, Repli_S4, Repli_S5, Repli_S6, Repli_S7, Repli_S8, unset_remark, Maker, Checker, time, status, Inst_Date  )
			    VALUES (  '$PostEOD_StartTime', '$PostEOD_EndTime', '$M_Count', '$S1_Count', '$S2_Count', '$S3_Count', '$S4_Count', '$S5_Count', '$S6_Count', '$S7_Count', '$S8_Count', '$M_CurrentDate', '$M_DaySystemDate', '$M_NightSystemDate', '$S1_CurrentDate', '$S1_DaySystemDate', '$S1_NightSystemDate', '$S2_CurrentDate', '$S2_DaySystemDate', '$S2_NightSystemDate', '$S3_CurrentDate', '$S3_DaySystemDate', '$S3_NightSystemDate', '$S4_CurrentDate', '$S4_DaySystemDate', '$S4_NightSystemDate', '$S5_CurrentDate', '$S5_DaySystemDate', '$S5_NightSystemDate', '$S6_CurrentDate', '$S6_DaySystemDate', '$S6_NightSystemDate', '$S7_CurrentDate', '$S7_DaySystemDate', '$S7_NightSystemDate', '$S8_CurrentDate', '$S8_DaySystemDate', '$S8_NightSystemDate', '$DEPP_Count', '$LONP_Count', '$CTAP_Count', '$ERMP_Count', '$ED2P_Count', '$ED1P_Count', '$GLCP_Count', '$GLPP_Count', '$idSpool_M', '$idSpool_S1', '$idSpool_S2', '$idSpool_S3', '$idSpool_S4', '$idSpool_S5', '$idSpool_S6', '$idSpool_S7', '$idSpool_S8', '$lSpool_M', '$lSpool_S1', '$lSpool_S2', '$lSpool_S3', '$lSpool_S4', '$lSpool_S5', '$lSpool_S6', '$lSpool_S7', '$lSpool_S8', '$lSysout_M', '$lSysout_S1', '$lSysout_S2', '$lSysout_S3', '$lSysout_S4', '$lSysout_S5', '$lSysout_S6', '$lSysout_S7', '$lSysout_S8', '$idSysout_M', '$idSysout_S1', '$idSysout_S2', '$idSysout_S3', '$idSysout_S4', '$idSysout_S5', '$idSysout_S6', '$idSysout_S7', '$idSysout_S8', '$M', '$S1', '$S2', '$S3', '$S4', '$S5', '$S6', '$S7', '$S8', '$Repli_M', '$Repli_S1', '$Repli_S2', '$Repli_S3', '$Repli_S4', '$Repli_S5', '$Repli_S6', '$Repli_S7', '$Repli_S8','$unset_remark','$Maker', '$Checker', '$time', '$status', '$crrdate' ) ");
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}
	

	
/*<!--------------------------------------Checklist Page 10----------------------------------------------->*/
if(isset($_POST['save_pg10']) || isset($_POST['submit_pg10'])){
		
		$RcErrorWithJob = implode(",",$_POST['RcErrorWithJob']);
		$ATM = implode(",",$_POST['ATM']);
		$INB = implode(",",$_POST['INB']);
		$MR = implode(",",$_POST['MR']);
		$B24 = implode(",",$_POST['B24']);
		$M  = $_POST['M'];
		$S1 = $_POST['S1'];
		$S2 = $_POST['S2'];
		$S3 = $_POST['S3'];
		$S4 = $_POST['S4'];
		$S5 = $_POST['S5'];
		$S6 = $_POST['S6'];
		$S7 = $_POST['S7'];
		$S8 = $_POST['S8'];
		$M_ATM = $_POST['M_ATM'];
		$S1_ATM = $_POST['S1_ATM'];
		$S2_ATM =  $_POST['S2_ATM'];
		$S3_ATM =  $_POST['S3_ATM'];
		$S4_ATM = $_POST['S4_ATM'];
		$S5_ATM = $_POST['S5_ATM'];
		$S6_ATM = $_POST['S6_ATM'];
		$S7_ATM = $_POST['S7_ATM'];
		$S8_ATM = $_POST['S8_ATM'];
		$M_INB = $_POST['M_INB'];
		$S1_INB = $_POST['S1_INB'];
		$S2_INB =  $_POST['S2_INB'];
		$S3_INB =  $_POST['S3_INB'];
		$S4_INB = $_POST['S4_INB'];
		$S5_INB = $_POST['S5_INB'];
		$S6_INB = $_POST['S6_INB'];
		$S7_INB = $_POST['S7_INB'];
		$S8_INB = $_POST['S8_INB'];
		$M_MR = $_POST['M_MR'];
		$S1_MR = $_POST['S1_MR'];
		$S2_MR =  $_POST['S2_MR'];
		$S3_MR =  $_POST['S3_MR'];
		$S4_MR = $_POST['S4_MR'];
		$S5_MR = $_POST['S5_MR'];
		$S6_MR = $_POST['S6_MR'];
		$S7_MR = $_POST['S7_MR'];
		$S8_MR = $_POST['S8_MR'];
		$M_B24 = $_POST['M_B24'];
		$S1_B24 = $_POST['S1_B24'];
		$S2_B24 =  $_POST['S2_B24'];
		$S3_B24 =  $_POST['S3_B24'];
		$S4_B24 = $_POST['S4_B24'];
		$S5_B24 = $_POST['S5_B24'];
		$S6_B24 = $_POST['S6_B24'];
		$S7_B24 = $_POST['S7_B24'];
		$S8_B24 = $_POST['S8_B24'];
		$EOD_mailStatus = $_POST['EOD_mailStatus'];
		$B24_DropCount_mailStatus = $_POST['DropCount_mailStatus'];
		$INB_DropCount_mailStatus = $_POST['INB_DropCount_mailStatus'];
		$ATM_DropCount_mailStatus = $_POST['ATM_DropCount_mailStatus'];
		$OLTAS_EASIEST_Extract_mailStatus = $_POST['OLTAS_EASIEST_Extract_mailStatus'];
		$regionStat_M = $_POST['regionStat_M'];
		$regionStat_S1 = $_POST['regionStat_S1'];
		$regionStat_S2 = $_POST['regionStat_S2'];
		$regionStat_S3 = $_POST['regionStat_S3'];
		$regionStat_S4=$_POST['regionStat_S4'];
		$regionStat_S5 = $_POST['regionStat_S5'];
		$regionStat_S6 = $_POST['regionStat_S6'];
		$regionStat_S7 = $_POST['regionStat_S7'];
		$regionStat_S8 = $_POST['regionStat_S8'];
		$gateway_M = $_POST['gateway_M'];
		$gateway_S1 = $_POST['gateway_S1'];
		$gateway_S2 = $_POST['gateway_S2'];
		$gateway_S3 = $_POST['gateway_S3'];
		$gateway_S4 = $_POST['gateway_S4'];
		$gateway_S5 = $_POST['gateway_S5'];
		$gateway_S6 = $_POST['gateway_S6'];
		$gateway_S7 = $_POST['gateway_S7'];
		$gateway_S8 = $_POST['gateway_S8'];
		$queues_M = $_POST['queues_M'];
		$queues_S1 = $_POST['queues_S1'];
		$queues_S2 = $_POST['queues_S2'];
		$queues_S3 = $_POST['queues_S3'];
		$queues_S4 = $_POST['queues_S4'];
		$queues_S5 = $_POST['queues_S5'];
		$queues_S6 = $_POST['queues_S6'];
		$queues_S7 = $_POST['queues_S7'];
		$queues_S8 = $_POST['queues_S8'];
		$RC_M = $_POST['RC_M'];
		$RC_S1 = $_POST['RC_S1'];
		$RC_S2 =  $_POST['RC_S2'];
		$RC_S3 =  $_POST['RC_S3'];
		$RC_S4 = $_POST['RC_S4'];
		$RC_S5 = $_POST['RC_S5'];
		$RC_S6 = $_POST['RC_S6'];
		$RC_S7 = $_POST['RC_S7'];
		$RC_S8 = $_POST['RC_S8'];
		$ORA_M = $_POST['ORA_M'];
		$ORA_S1 = $_POST['ORA_S1'];
		$ORA_S2 = $_POST['ORA_S2'];
		$ORA_S3 = $_POST['ORA_S3'];
		$ORA_S4 = $_POST['ORA_S4'];
		$ORA_S5 = $_POST['ORA_S5'];
		$ORA_S6 = $_POST['ORA_S6'];
		$ORA_S7 = $_POST['ORA_S7'];
		$ORA_S8 = $_POST['ORA_S8'];
		$status_M = $_POST['status_M'];
		$status_S1 = $_POST['status_S1'];
		$status_S2 = $_POST['status_S2'];
		$status_S3 = $_POST['status_S3'];
		$status_S4 = $_POST['status_S4'];
		$status_S5 = $_POST['status_S5'];
		$status_S6 = $_POST['status_S6'];
		$status_S7 = $_POST['status_S7'];
		$status_S8 = $_POST['status_S8'];
		$protime = implode(",",$_POST['protime']);
		$bdf = implode(",",$_POST['bdf']);
		$showerfeed_status = implode(",",$_POST['showerfeed_status']);
		$Maker = implode(",",$_POST['Maker']);
		$Checker = implode(",",$_POST['Checker']);
		$time = implode(",",$_POST['time']);
		$status='1';
		$crrdate = mflags();
		$ma=substr_count($Maker,",,");
		$ck=substr_count($Checker,",,");
		$tm=substr_count($time,",,");
		
		$query = mysql_query("select * from checklist_pg10 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg10 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg10'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
			}
		else{
		//record freeze		
				$sql = mysql_query ("update checklist_pg10 set 
				ATM = '$ATM', INB = '$INB', MR = '$MR', B24 = '$B24', 
				M = '$M', S1 = '$S1', S2 = '$S2', S3 = '$S3', S4 = '$S4', S5 = '$S5', S6 = '$S6', S7 = '$S7', S8 = '$S8',
				M_ATM = '$M_ATM', S1_ATM = '$S1_ATM', S2_ATM = '$S2_ATM', S3_ATM = '$S3_ATM', S4_ATM = '$S4_ATM', S5_ATM = '$S5_ATM', S6_ATM = '$S6_ATM', S7_ATM = '$S7_ATM', S8_ATM = '$S8_ATM',
				M_INB = '$M_INB', S1_INB = '$S1_INB', S2_INB = '$S2_INB', S3_INB = '$S3_INB', S4_INB = '$S4_INB', S5_INB = '$S5_INB', S6_INB = '$S6_INB', S7_INB = '$S7_INB', S8_INB = '$S8_INB',
				M_MR = '$M_MR', S1_MR = '$S1_MR', S2_MR = '$S2_MR', S3_MR = '$S3_MR', S4_MR = '$S4_MR', S5_MR = '$S5_MR', S6_MR = '$S6_MR', S7_MR = '$S7_MR', S8_MR = '$S8_MR',
				M_B24 = '$M_B24', S1_B24 = '$S1_B24', S2_B24 = '$S2_B24', S3_B24 = '$S3_B24', S4_B24 = '$S4_B24', S5_B24 = '$S5_B24', S6_B24 = '$S6_B24', S7_B24 = '$S7_B24', S8_B24 = '$S8_B24',
				EOD_mailStatus = '$EOD_mailStatus', B24_DropCount_mailStatus = '$B24_DropCount_mailStatus', INB_DropCount_mailStatus = '$INB_DropCount_mailStatus', ATM_DropCount_mailStatus = '$ATM_DropCount_mailStatus', OLTAS_EASIEST_Extract_mailStatus = '$OLTAS_EASIEST_Extract_mailStatus', 
				
				regionStat_M = '$regionStat_M', regionStat_S1 = '$regionStat_S1', regionStat_S2 = '$regionStat_S2', regionStat_S3 = '$regionStat_S3', regionStat_S4 = '$regionStat_S4', regionStat_S5 = '$regionStat_S5', regionStat_S6 = '$regionStat_S6', regionStat_S7 = '$regionStat_S7', regionStat_S8 = '$regionStat_S8',
				
				gateway_M = '$gateway_M', gateway_S1 = '$gateway_S1', gateway_S2 = '$gateway_S2', gateway_S3 = '$gateway_S3', gateway_S4 = '$gateway_S4', gateway_S5 = '$gateway_S5', gateway_S6 = '$gateway_S6', gateway_S7 = '$gateway_S7', gateway_S8 = '$gateway_S8',
				
				queues_M = '$queues_M', queues_S1 = '$queues_S1', queues_S2 = '$queues_S2', queues_S3 = '$queues_S3', queues_S4 = '$queues_S4', queues_S5 = '$queues_S5', queues_S6 = '$queues_S6', queues_S7 = '$queues_S7', queues_S8 = '$queues_S8',
				
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				
				status_M = '$status_M', status_S1 = '$status_S1', status_S2 = '$status_S2', status_S3 = '$status_S3', status_S4 = '$status_S4', status_S5 = '$status_S5', status_S6 = '$status_S6', status_S7 = '$status_S7', status_S8 = '$status_S8',protime = '$protime',bdf = '$bdf',showerfeed_status = '$showerfeed_status',
				
				Maker = '$Maker', Checker = '$Checker', time = '$time', freeze = '1', RcErrorWithJob = '$RcErrorWithJob' 
				where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		//record update
		else {  
				
				$sql1 = mysql_query("update checklist_pg10 set 
				ATM = '$ATM', INB = '$INB', MR = '$MR', B24 = '$B24', 
				M = '$M', S1 = '$S1', S2 = '$S2', S3 = '$S3', S4 = '$S4', S5 = '$S5', S6 = '$S6', S7 = '$S7', S8 = '$S8',
				M_ATM = '$M_ATM', S1_ATM = '$S1_ATM', S2_ATM = '$S2_ATM', S3_ATM = '$S3_ATM', S4_ATM = '$S4_ATM', S5_ATM = '$S5_ATM', S6_ATM = '$S6_ATM', S7_ATM = '$S7_ATM', S8_ATM = '$S8_ATM',
				M_INB = '$M_INB', S1_INB = '$S1_INB', S2_INB = '$S2_INB', S3_INB = '$S3_INB', S4_INB = '$S4_INB', S5_INB = '$S5_INB', S6_INB = '$S6_INB', S7_INB = '$S7_INB', S8_INB = '$S8_INB',
				M_MR = '$M_MR', S1_MR = '$S1_MR', S2_MR = '$S2_MR', S3_MR = '$S3_MR', S4_MR = '$S4_MR', S5_MR = '$S5_MR', S6_MR = '$S6_MR', S7_MR = '$S7_MR', S8_MR = '$S8_MR',
				M_B24 = '$M_B24', S1_B24 = '$S1_B24', S2_B24 = '$S2_B24', S3_B24 = '$S3_B24', S4_B24 = '$S4_B24', S5_B24 = '$S5_B24', S6_B24 = '$S6_B24', S7_B24 = '$S7_B24', S8_B24 = '$S8_B24',
				
				EOD_mailStatus = '$EOD_mailStatus', B24_DropCount_mailStatus = '$B24_DropCount_mailStatus', INB_DropCount_mailStatus = '$INB_DropCount_mailStatus', ATM_DropCount_mailStatus = '$ATM_DropCount_mailStatus', OLTAS_EASIEST_Extract_mailStatus = '$OLTAS_EASIEST_Extract_mailStatus', 
				
				regionStat_M = '$regionStat_M', regionStat_S1 = '$regionStat_S1', regionStat_S2 = '$regionStat_S2', regionStat_S3 = '$regionStat_S3', regionStat_S4 = '$regionStat_S4', regionStat_S5 = '$regionStat_S5', regionStat_S6 = '$regionStat_S6', regionStat_S7 = '$regionStat_S7', regionStat_S8 = '$regionStat_S8',
				
				gateway_M = '$gateway_M', gateway_S1 = '$gateway_S1', gateway_S2 = '$gateway_S2', gateway_S3 = '$gateway_S3', gateway_S4 = '$gateway_S4', gateway_S5 = '$gateway_S5', gateway_S6 = '$gateway_S6', gateway_S7 = '$gateway_S7', gateway_S8 = '$gateway_S8',
				
				queues_M = '$queues_M', queues_S1 = '$queues_S1', queues_S2 = '$queues_S2', queues_S3 = '$queues_S3', queues_S4 = '$queues_S4', queues_S5 = '$queues_S5', queues_S6 = '$queues_S6', queues_S7 = '$queues_S7', queues_S8 = '$queues_S8',
				
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				
				status_M = '$status_M', status_S1 = '$status_S1', status_S2 = '$status_S2', status_S3 = '$status_S3', status_S4 = '$status_S4', status_S5 = '$status_S5', status_S6 = '$status_S6', status_S7 = '$status_S7', status_S8 = '$status_S8', protime = '$protime', bdf = '$bdf',showerfeed_status = '$showerfeed_status',
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time', RcErrorWithJob = '$RcErrorWithJob' 
				where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg10'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			//record insert		
			$sql1 = mysql_query ("INSERT INTO checklist_pg10 (  ATM, INB, MR, B24, M, S1, S2, S3, S4, S5, S6, S7, S8, M_ATM, S1_ATM, S2_ATM, S3_ATM, S4_ATM, S5_ATM, S6_ATM, S7_ATM, S8_ATM, M_INB, S1_INB, S2_INB, S3_INB, S4_INB, S5_INB, S6_INB, S7_INB, S8_INB, M_MR, S1_MR, S2_MR, S3_MR, S4_MR, S5_MR, S6_MR, S7_MR, S8_MR, M_B24, S1_B24, S2_B24, S3_B24, S4_B24, S5_B24, S6_B24, S7_B24, S8_B24, EOD_mailStatus, B24_DropCount_mailStatus, INB_DropCount_mailStatus, ATM_DropCount_mailStatus, OLTAS_EASIEST_Extract_mailStatus, regionStat_M, regionStat_S1, regionStat_S2, regionStat_S3, regionStat_S4, regionStat_S5, regionStat_S6, regionStat_S7, regionStat_S8, gateway_M, gateway_S1, gateway_S2, gateway_S3, gateway_S4, gateway_S5, gateway_S6, gateway_S7, gateway_S8, queues_M, queues_S1, queues_S2, queues_S3, queues_S4, queues_S5, queues_S6, queues_S7, queues_S8, RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, status_M, status_S1, status_S2, status_S3, status_S4, status_S5, status_S6, status_S7, status_S8, protime, bdf, showerfeed_status, Maker, Checker, time, status, Inst_Date, RcErrorWithJob  )
			    VALUES (  '$ATM', '$INB', '$MR', '$B24', '$M', '$S1', '$S2', '$S3', '$S4', '$S5', '$S6', '$S7', '$S8', '$M_ATM', '$S1_ATM', '$S2_ATM', '$S3_ATM', '$S4_ATM', '$S5_ATM', '$S6_ATM', '$S7_ATM', '$S8_ATM', '$M_INB', '$S1_INB', '$S2_INB', '$S3_INB', '$S4_INB', '$S5_INB', '$S6_INB', '$S7_INB', '$S8_INB', '$M_MR', '$S1_MR', '$S2_MR', '$S3_MR', '$S4_MR', '$S5_MR', '$S6_MR', '$S7_MR', '$S8_MR', '$M_B24', '$S1_B24', '$S2_B24', '$S3_B24', '$S4_B24', '$S5_B24', '$S6_B24', '$S7_B24', '$S8_B24', '$EOD_mailStatus', '$B24_DropCount_mailStatus', '$INB_DropCount_mailStatus', '$ATM_DropCount_mailStatus', '$OLTAS_EASIEST_Extract_mailStatus', '$regionStat_M', '$regionStat_S1', '$regionStat_S2', '$regionStat_S3', '$regionStat_S4', '$regionStat_S5', '$regionStat_S6', '$regionStat_S7', '$regionStat_S8', '$gateway_M', '$gateway_S1', '$gateway_S2', '$gateway_S3', '$gateway_S4', '$gateway_S5', '$gateway_S6', '$gateway_S7', '$gateway_S8', '$queues_M', '$queues_S1', '$queues_S2', '$queues_S3', '$queues_S4', '$queues_S5', '$queues_S6', '$queues_S7', '$queues_S8', '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', '$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', '$status_M', '$status_S1', '$status_S2', '$status_S3', '$status_S4', '$status_S5', '$status_S6', '$status_S7', '$status_S8','$protime','$bdf','$showerfeed_status','$Maker', '$Checker', '$time', '$status', '$crrdate', '$RcErrorWithJob' ) ");
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}


/*<!--------------------------------Checklist Page 11--------------------------------------------------->*/
if(isset($_POST['save_pg11']) || isset($_POST['submit_pg11'])){
		$tfdrtrig_M = $_POST['tfdrtrig_M'];
		$tfdrtrig_S1 = $_POST['tfdrtrig_S1'];
		$tfdrtrig_S2 = $_POST['tfdrtrig_S2'];
		$tfdrtrig_S3 = $_POST['tfdrtrig_S3'];
		$tfdrtrig_S4 = $_POST['tfdrtrig_S4'];
		$tfdrtrig_S5 = $_POST['tfdrtrig_S5'];
		$tfdrtrig_S6 = $_POST['tfdrtrig_S6'];
		$tfdrtrig_S7 = $_POST['tfdrtrig_S7'];
		$tfdrtrig_S8 = $_POST['tfdrtrig_S8'];
		$rtgs_M = $_POST['rtgs_M'];
		$rtgs_S1 = $_POST['rtgs_S1'];
		$rtgs_S2 = $_POST['rtgs_S2'];
		$rtgs_S3 = $_POST['rtgs_S3'];
		$rtgs_S4 = $_POST['rtgs_S4'];
		$rtgs_S5 = $_POST['rtgs_S5'];
		$rtgs_S6 = $_POST['rtgs_S6'];
		$rtgs_S7 = $_POST['rtgs_S7'];
		$rtgs_S8 = $_POST['rtgs_S8'];
		$neft_M = $_POST['neft_M'];
		$neft_S1 = $_POST['neft_S1'];
		$neft_S2 = $_POST['neft_S2'];
		$neft_S3 = $_POST['neft_S3'];
		$neft_S4 = $_POST['neft_S4'];
		$neft_S5 = $_POST['neft_S5'];
		$neft_S6 = $_POST['neft_S6'];
		$neft_S7 = $_POST['neft_S7'];
		$neft_S8 = $_POST['neft_S8'];
		$SY1000_M = $_POST['SY1000_M'];
		$SY1000_S1 =  $_POST['SY1000_S1'];
		$SY1000_S2 = $_POST['SY1000_S2'];
		$SY1000_S3 = $_POST['SY1000_S3'];
		$SY1000_S4 = $_POST['SY1000_S4'];
		$SY1000_S5 = $_POST['SY1000_S5'];
		$SY1000_S6 = $_POST['SY1000_S6'];
		$SY1000_S7 =  $_POST['SY1000_S7'];
		$SY1000_S8 = $_POST['SY1000_S8'];
		$SY3000_M  = $_POST['SY3000_M'];
		$SY3000_S1 = $_POST['SY3000_S1'];
		$SY3000_S2 = $_POST['SY3000_S2'];
		$SY3000_S3 = $_POST['SY3000_S3'];
		$SY3000_S4 = $_POST['SY3000_S4'];
		$SY3000_S5 = $_POST['SY3000_S5'];
		$SY3000_S6 = $_POST['SY3000_S6'];
		$SY3000_S7 = $_POST['SY3000_S7'];
		$SY3000_S8 = $_POST['SY3000_S8'];
		$processed_Count = $_POST['processed_Count'];
		$pending_Count = $_POST['pending_Count'];
		$failed_Count =  $_POST['failed_Count'];
		$completion_Count =  $_POST['completion_Count'];
		$RC_M = $_POST['RC_M'];
		$RC_S1 = $_POST['RC_S1'];
		$RC_S2 = $_POST['RC_S2'];
		$RC_S3 = $_POST['RC_S3'];
		$RC_S4 = $_POST['RC_S4'];
		$RC_S5 = $_POST['RC_S5'];
		$RC_S6 = $_POST['RC_S6'];
		$RC_S7 = $_POST['RC_S7'];
		$RC_S8 = $_POST['RC_S8'];
		$ORA_M = $_POST['ORA_M'];
		$ORA_S1 = $_POST['ORA_S1'];
		$ORA_S2 = $_POST['ORA_S2'];
		$ORA_S3 = $_POST['ORA_S3'];
		$ORA_S4 = $_POST['ORA_S4'];
		$ORA_S5 = $_POST['ORA_S5'];
		$ORA_S6=$_POST['ORA_S6'];
		$ORA_S7 = $_POST['ORA_S7'];
		$ORA_S8 = $_POST['ORA_S8'];
		$Count = $_POST['Count'];
		$IF9897_startTime = $_POST['IF9897_startTime'];
		$IF9897_endTime = $_POST['IF9897_endTime'];
		$REPI_Count = $_POST['REPI_Count'];
		$Maker = implode(",",$_POST['Maker']);
		$Checker = implode(",",$_POST['Checker']);
		$time = implode(",",$_POST['time']);
		$status='1';
		$crrdate = mflags();
		$ma=substr_count($Maker,",,");
		$ck=substr_count($Checker,",,");
		$tm=substr_count($time,",,");
		
		$query = mysql_query("select * from checklist_pg11 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg11 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg11'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
			}
		
		else{
				$sql = mysql_query ("update checklist_pg11 set 
				tfdrtrig_M = '$tfdrtrig_M', tfdrtrig_S1 = '$tfdrtrig_S1', tfdrtrig_S2 = '$tfdrtrig_S2', tfdrtrig_S3 = '$tfdrtrig_S3', tfdrtrig_S4 = '$tfdrtrig_S4', tfdrtrig_S5 = '$tfdrtrig_S5', tfdrtrig_S6 = '$tfdrtrig_S6', tfdrtrig_S7 = '$tfdrtrig_S7', tfdrtrig_S8 = '$tfdrtrig_S8',
				
				rtgs_M = '$rtgs_M', rtgs_S1 = '$rtgs_S1', rtgs_S2 = '$rtgs_S2', rtgs_S3 = '$rtgs_S3', rtgs_S4 = '$rtgs_S4', rtgs_S5 = '$rtgs_S5', rtgs_S6 = '$rtgs_S6', rtgs_S7 = '$rtgs_S7', rtgs_S8 = '$rtgs_S8',
				
				neft_M = '$neft_M', neft_S1 = '$neft_S1', neft_S2 = '$neft_S2', neft_S3 = '$neft_S3', neft_S4 = '$neft_S4', neft_S5 = '$neft_S5', neft_S6 = '$neft_S6', neft_S7 = '$neft_S7', neft_S8 = '$neft_S8',
				
				SY1000_M = '$SY1000_M', SY1000_S1 = '$SY1000_S1', SY1000_S2 = '$SY1000_S2', SY1000_S3 = '$SY1000_S3', SY1000_S4 = '$SY1000_S4', SY1000_S5 = '$SY1000_S5', SY1000_S6 = '$SY1000_S6', SY1000_S7 = '$SY1000_S7', SY1000_S8 = '$SY1000_S8',
				
				SY3000_M = '$SY3000_M', SY3000_S1 = '$SY3000_S1', SY3000_S2 = '$SY3000_S2', SY3000_S3 = '$SY3000_S3', SY3000_S4 = '$SY3000_S4', SY3000_S5 = '$SY3000_S5', SY3000_S6 = '$SY3000_S6', SY3000_S7 = '$SY3000_S7', SY3000_S8 = '$SY3000_S8',
				
				 processed_Count = '$processed_Count', pending_Count = '$pending_Count', failed_Count = '$failed_Count', completion_Count = '$completion_Count', 
				
				
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				
				Count = '$Count', IF9897_startTime = '$IF9897_startTime', IF9897_endTime = '$IF9897_endTime', REPI_Count = '$REPI_Count', 
				
				Maker = '$Maker', Checker = '$Checker', time = '$time', freeze = '1' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		
		else { 
			$sql1 = mysql_query("update checklist_pg11 set 
				tfdrtrig_M = '$tfdrtrig_M', tfdrtrig_S1 = '$tfdrtrig_S1', tfdrtrig_S2 = '$tfdrtrig_S2', tfdrtrig_S3 = '$tfdrtrig_S3', tfdrtrig_S4 = '$tfdrtrig_S4', tfdrtrig_S5 = '$tfdrtrig_S5', tfdrtrig_S6 = '$tfdrtrig_S6', tfdrtrig_S7 = '$tfdrtrig_S7', tfdrtrig_S8 = '$tfdrtrig_S8',
				
				rtgs_M = '$rtgs_M', rtgs_S1 = '$rtgs_S1', rtgs_S2 = '$rtgs_S2', rtgs_S3 = '$rtgs_S3', rtgs_S4 = '$rtgs_S4', rtgs_S5 = '$rtgs_S5', rtgs_S6 = '$rtgs_S6', rtgs_S7 = '$rtgs_S7', rtgs_S8 = '$rtgs_S8',
				
				neft_M = '$neft_M', neft_S1 = '$neft_S1', neft_S2 = '$neft_S2', neft_S3 = '$neft_S3', neft_S4 = '$neft_S4', neft_S5 = '$neft_S5', neft_S6 = '$neft_S6', neft_S7 = '$neft_S7', neft_S8 = '$neft_S8',
				
				SY1000_M = '$SY1000_M', SY1000_S1 = '$SY1000_S1', SY1000_S2 = '$SY1000_S2', SY1000_S3 = '$SY1000_S3', SY1000_S4 = '$SY1000_S4', SY1000_S5 = '$SY1000_S5', SY1000_S6 = '$SY1000_S6', SY1000_S7 = '$SY1000_S7', SY1000_S8 = '$SY1000_S8',
				
				SY3000_M = '$SY3000_M', SY3000_S1 = '$SY3000_S1', SY3000_S2 = '$SY3000_S2', SY3000_S3 = '$SY3000_S3', SY3000_S4 = '$SY3000_S4', SY3000_S5 = '$SY3000_S5', SY3000_S6 = '$SY3000_S6', SY3000_S7 = '$SY3000_S7', SY3000_S8 = '$SY3000_S8',
				
				 processed_Count = '$processed_Count', pending_Count = '$pending_Count', failed_Count = '$failed_Count', completion_Count = '$completion_Count', 
				
				
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				
				Count = '$Count', IF9897_startTime = '$IF9897_startTime', IF9897_endTime = '$IF9897_endTime', REPI_Count = '$REPI_Count', 
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Inserted')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg11'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			$sql1 = mysql_query ("INSERT INTO checklist_pg11 (  tfdrtrig_M, tfdrtrig_S1, tfdrtrig_S2, tfdrtrig_S3, tfdrtrig_S4, tfdrtrig_S5, tfdrtrig_S6, tfdrtrig_S7, tfdrtrig_S8, rtgs_M, rtgs_S1, rtgs_S2, rtgs_S3, rtgs_S4, rtgs_S5, rtgs_S6, rtgs_S7, rtgs_S8, neft_M, neft_S1, neft_S2, neft_S3, neft_S4, neft_S5, neft_S6, neft_S7, neft_S8, SY1000_M, SY1000_S1, SY1000_S2, SY1000_S3, SY1000_S4, SY1000_S5, SY1000_S6, SY1000_S7, SY1000_S8, SY3000_M, SY3000_S1, SY3000_S2, SY3000_S3, SY3000_S4, SY3000_S5, SY3000_S6, SY3000_S7, SY3000_S8, processed_Count, pending_Count, failed_Count, completion_Count, RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, Count, IF9897_startTime, IF9897_endTime, REPI_Count, Maker, Checker, time, status, Inst_Date  )
			    VALUES (  '$tfdrtrig_M', '$tfdrtrig_S1', '$tfdrtrig_S2', '$tfdrtrig_S3', '$tfdrtrig_S4', '$tfdrtrig_S5', '$tfdrtrig_S6', '$tfdrtrig_S7', '$tfdrtrig_S8', '$rtgs_M', '$rtgs_S1', '$rtgs_S2', '$rtgs_S3', '$rtgs_S4', '$rtgs_S5', '$rtgs_S6', '$rtgs_S7', '$rtgs_S8', '$neft_M', '$neft_S1', '$neft_S2', '$neft_S3', '$neft_S4', '$neft_S5', '$neft_S6', '$neft_S7', '$neft_S8', '$SY1000_M', '$SY1000_S1', '$SY1000_S2', '$SY1000_S3', '$SY1000_S4', '$SY1000_S5', '$SY1000_S6', '$SY1000_S7', '$SY1000_S8', '$SY3000_M', '$SY3000_S1', '$SY3000_S2', '$SY3000_S3', '$SY3000_S4', '$SY3000_S5', '$SY3000_S6', '$SY3000_S7', '$SY3000_S8', '$processed_Count', '$pending_Count', '$failed_Count', '$completion_Count', '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', '$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', '$Count', '$IF9897_startTime', '$IF9897_endTime', '$REPI_Count', '$Maker', '$Checker', '$time', '$status', '$crrdate' ) ");
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}


/*<!-----------------------------------------Checklist Page 12------------------------------------->*/
if(isset($_POST['save_pg12']) || isset($_POST['submit_pg12'])){
			$MRFAILED_MULR_DDMMYYYY_sutlej_size = $_POST['MRFAILED_MULR_DDMMYYYY_sutlej_size'];
			$MRFAILED_MULR_DDMMYYYY_destination_size = $_POST['MRFAILED_MULR_DDMMYYYY_destination_size'];
			$MRFAILED_PSGI_DDMMYYYY_sutlej_size = $_POST['MRFAILED_PSGI_DDMMYYYY_sutlej_size'];
			$MRFAILED_PSGI_DDMMYYYY_destination_size = $_POST['MRFAILED_PSGI_DDMMYYYY_destination_size'];
			$ATM_FAILED_DDMMYYYY_sutlej_size = $_POST['ATM_FAILED_DDMMYYYY_sutlej_size'];
			$ATM_FAILED_DDMMYYYY_destination_size = $_POST['ATM_FAILED_DDMMYYYY_destination_size'];
			$inb_98888_DDMMYY_sutlej_size = $_POST['inb_98888_DDMMYY_sutlej_size'];
			$inb_98888_DDMMYY_destination_size = $_POST['inb_98888_DDMMYY_destination_size'];
			$B24FAIL_yyyymmdd_sutlej_size = $_POST['B24FAIL_yyyymmdd_sutlej_size'];
			$B24FAIL_yyyymmdd_destination_size = $_POST['B24FAIL_yyyymmdd_destination_size'];
			$repost_INB_Count = $_POST['repost_INB_Count'];
			$repost_MR_Count = $_POST['repost_MR_Count'];
			$repost_ATM_Count = $_POST['repost_ATM_Count'];
			$repost_B24_Count = $_POST['repost_B24_Count'];
			$M = $_POST['M'];
			$Sutlej_Count = $_POST['Sutlej_Count'];
			$Mithi_Count = $_POST['Mithi_Count'];
			$QUATER_CHECK = $_POST['QUATER_CHECK'];
			$PMON_CHECK = $_POST['PMON_CHECK'];
			$DB_CONNECTIVITY_CHECK = $_POST['DB_CONNECTIVITY_CHECK'];
			$DATA_BASEMODE_CHECK = $_POST['DATA_BASEMODE_CHECK'];
			$DB_SPACE_CHECK = $_POST['DB_SPACE_CHECK'];
			$DB_PARTITION_CHECK = $_POST['DB_PARTITION_CHECK'];
			$Mount_Point_SPACE_CHECK = $_POST['Mount_Point_SPACE_CHECK'];
			$RC_M = $_POST['RC_M'];
			$RC_S1 = $_POST['RC_S1'];
			$RC_S2 = $_POST['RC_S2'];
			$RC_S3 = $_POST['RC_S3'];
			$RC_S4 = $_POST['RC_S4'];
			$RC_S5 = $_POST['RC_S5'];
			$RC_S6 = $_POST['RC_S6'];
			$RC_S7 =  $_POST['RC_S7'];
			$RC_S8 = $_POST['RC_S8'];
			$ORA_M = $_POST['ORA_M'];
			$ORA_S1 = $_POST['ORA_S1'];
			$ORA_S2 = $_POST['ORA_S2'];
			$ORA_S3 = $_POST['ORA_S3'];
			$ORA_S4 =  $_POST['ORA_S4'];
			$ORA_S5 = $_POST['ORA_S5'];
			$ORA_S6  = $_POST['ORA_S6'];
			$ORA_S7 = $_POST['ORA_S7'];
			$ORA_S8 = $_POST['ORA_S8'];
			$processed_Count = $_POST['processed_Count'];
			$pending_Count = $_POST['pending_Count'];
			$failed_Count = $_POST['failed_Count'];
			$completion_Count = $_POST['completion_Count'];
			$SI_RC_M = $_POST['SI_RC_M'];
			$SI_RC_S1 = $_POST['SI_RC_S1'];
			$SI_RC_S2 = $_POST['SI_RC_S2'];
			$SI_RC_S3 = $_POST['SI_RC_S3'];
			$SI_RC_S4 =  $_POST['SI_RC_S4'];
			$SI_RC_S5 =  $_POST['SI_RC_S5'];
			$SI_RC_S6 = $_POST['SI_RC_S6'];
			$SI_RC_S7 = $_POST['SI_RC_S7'];
			$SI_RC_S8 = $_POST['SI_RC_S8'];
			$SI_ORA_M = $_POST['SI_ORA_M'];
			$SI_ORA_S1 = $_POST['SI_ORA_S1'];
			$SI_ORA_S2 = $_POST['SI_ORA_S2'];
			$SI_ORA_S3 = $_POST['SI_ORA_S3'];
			$SI_ORA_S4 = $_POST['SI_ORA_S4'];
			$SI_ORA_S5 = $_POST['SI_ORA_S5'];
			$SI_ORA_S6 = $_POST['SI_ORA_S6'];
			$SI_ORA_S7 = $_POST['SI_ORA_S7'];
			$SI_ORA_S8 = $_POST['SI_ORA_S8'];
			$table_space = implode(",",$_POST['table_space']);
			$Maker = implode(",",$_POST['Maker']);
			$arch = $_POST['arch'];
			$arch1 = $_POST['arch1'];
			$PSGI=$_POST['PSGI'];
			$repost_failure=$_POST['repost_failure'];
			$Checker = implode(",",$_POST['Checker']);
			$time = implode(",",$_POST['time']);
			$status='1';
			$crrdate = mflags();
			$ma=substr_count($Maker,",,");
			$ck=substr_count($Checker,",,");
			$tm=substr_count($time,",,");
		
		$query = mysql_query("select * from checklist_pg12 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg12 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg12'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
			}
		else{
				$sql = mysql_query ("update checklist_pg12 set 
				MRFAILED_MULR_DDMMYYYY_sutlej_size = '$MRFAILED_MULR_DDMMYYYY_sutlej_size', 
				MRFAILED_MULR_DDMMYYYY_destination_size = '$MRFAILED_MULR_DDMMYYYY_destination_size', 
				MRFAILED_PSGI_DDMMYYYY_sutlej_size = '$MRFAILED_PSGI_DDMMYYYY_sutlej_size',
				MRFAILED_PSGI_DDMMYYYY_destination_size = '$MRFAILED_PSGI_DDMMYYYY_destination_size', 
				ATM_FAILED_DDMMYYYY_sutlej_size = '$ATM_FAILED_DDMMYYYY_sutlej_size',
				ATM_FAILED_DDMMYYYY_destination_size = '$ATM_FAILED_DDMMYYYY_destination_size', 
				inb_98888_DDMMYY_sutlej_size = '$inb_98888_DDMMYY_sutlej_size', 
				inb_98888_DDMMYY_destination_size = '$inb_98888_DDMMYY_destination_size', 
				B24FAIL_yyyymmdd_sutlej_size= '$B24FAIL_yyyymmdd_sutlej_size',
				B24FAIL_yyyymmdd_destination_size= '$B24FAIL_yyyymmdd_destination_size',
				repost_INB_Count = '$repost_INB_Count', repost_MR_Count = '$repost_MR_Count', 
				repost_ATM_Count = '$repost_ATM_Count', repost_B24_Count = '$repost_B24_Count', M = '$M', Sutlej_Count = '$Sutlej_Count', 
				Mithi_Count = '$Mithi_Count', QUATER_CHECK = '$QUATER_CHECK', PMON_CHECK = '$PMON_CHECK', 
				DB_CONNECTIVITY_CHECK = '$DB_CONNECTIVITY_CHECK', 
				DATA_BASEMODE_CHECK = '$DATA_BASEMODE_CHECK', 
				DB_SPACE_CHECK = '$DB_SPACE_CHECK', DB_PARTITION_CHECK = '$DB_PARTITION_CHECK', 
				Mount_Point_SPACE_CHECK = '$Mount_Point_SPACE_CHECK', 
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				processed_Count = '$processed_Count', pending_Count = '$pending_Count', failed_Count = '$failed_Count', completion_Count = '$completion_Count',
				SI_RC_M = '$SI_RC_M', SI_RC_S1 = '$SI_RC_S1', SI_RC_S2 = '$SI_RC_S2', SI_RC_S3 = '$SI_RC_S3', SI_RC_S4 = '$SI_RC_S4', SI_RC_S5 = '$SI_RC_S5', SI_RC_S6 = '$SI_RC_S6', SI_RC_S7 = '$SI_RC_S7', SI_RC_S8 = '$SI_RC_S8', 
				SI_ORA_M = '$SI_ORA_M', SI_ORA_S1 = '$SI_ORA_S1', SI_ORA_S2 = '$SI_ORA_S2', SI_ORA_S3='$SI_ORA_S3', SI_ORA_S4 = '$SI_ORA_S4', SI_ORA_S5 = '$SI_ORA_S5', SI_ORA_S6 = '$SI_ORA_S6', SI_ORA_S7 = '$SI_ORA_S7', SI_ORA_S8 = '$SI_ORA_S8',
				Maker = '$Maker', Checker = '$Checker', arch = '$arch', arch1 = '$arch1',PSGI='$PSGI',repost_failure='$repost_failure',table_space= '$table_space', time = '$time', freeze = '1' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script>";
					
				}
			}	
		}
		
		else { 
			$sql1 = mysql_query("update checklist_pg12 set 
				MRFAILED_MULR_DDMMYYYY_sutlej_size = '$MRFAILED_MULR_DDMMYYYY_sutlej_size', 
				MRFAILED_MULR_DDMMYYYY_destination_size = '$MRFAILED_MULR_DDMMYYYY_destination_size', 
				MRFAILED_PSGI_DDMMYYYY_sutlej_size = '$MRFAILED_PSGI_DDMMYYYY_sutlej_size',
				MRFAILED_PSGI_DDMMYYYY_destination_size = '$MRFAILED_PSGI_DDMMYYYY_destination_size', 
				ATM_FAILED_DDMMYYYY_sutlej_size = '$ATM_FAILED_DDMMYYYY_sutlej_size',
				ATM_FAILED_DDMMYYYY_destination_size = '$ATM_FAILED_DDMMYYYY_destination_size', 
				inb_98888_DDMMYY_sutlej_size = '$inb_98888_DDMMYY_sutlej_size', 
				inb_98888_DDMMYY_destination_size = '$inb_98888_DDMMYY_destination_size', 
				B24FAIL_yyyymmdd_sutlej_size= '$B24FAIL_yyyymmdd_sutlej_size',
				B24FAIL_yyyymmdd_destination_size= '$B24FAIL_yyyymmdd_destination_size',
				repost_INB_Count = '$repost_INB_Count', repost_MR_Count = '$repost_MR_Count', 
				repost_ATM_Count = '$repost_ATM_Count', repost_B24_Count = '$repost_B24_Count', M = '$M', Sutlej_Count = '$Sutlej_Count', 
				Mithi_Count = '$Mithi_Count', QUATER_CHECK = '$QUATER_CHECK', PMON_CHECK = '$PMON_CHECK', 
				DB_CONNECTIVITY_CHECK = '$DB_CONNECTIVITY_CHECK', 
				DATA_BASEMODE_CHECK = '$DATA_BASEMODE_CHECK', 
				DB_SPACE_CHECK = '$DB_SPACE_CHECK', DB_PARTITION_CHECK = '$DB_PARTITION_CHECK', 
				Mount_Point_SPACE_CHECK = '$Mount_Point_SPACE_CHECK', 
				RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				processed_Count = '$processed_Count', pending_Count = '$pending_Count', failed_Count = '$failed_Count', completion_Count = '$completion_Count',
				SI_RC_M = '$SI_RC_M', SI_RC_S1 = '$SI_RC_S1', SI_RC_S2 = '$SI_RC_S2', SI_RC_S3 = '$SI_RC_S3', SI_RC_S4 = '$SI_RC_S4', SI_RC_S5 = '$SI_RC_S5', SI_RC_S6 = '$SI_RC_S6', SI_RC_S7 = '$SI_RC_S7', SI_RC_S8 = '$SI_RC_S8', 
				SI_ORA_M = '$SI_ORA_M', SI_ORA_S1 = '$SI_ORA_S1', SI_ORA_S2 = '$SI_ORA_S2', SI_ORA_S3='$SI_ORA_S3', SI_ORA_S4 = '$SI_ORA_S4', SI_ORA_S5 = '$SI_ORA_S5', SI_ORA_S6 = '$SI_ORA_S6', SI_ORA_S7 = '$SI_ORA_S7', SI_ORA_S8 = '$SI_ORA_S8',table_space= '$table_space',
				Maker =  '$Maker', Checker = '$Checker', arch = '$arch', arch1 = '$arch1',PSGI='$PSGI',repost_failure='$repost_failure', time =  '$time' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Updated')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg12'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Maker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			$sql1 = mysql_query ("INSERT INTO checklist_pg12 (  MRFAILED_MULR_DDMMYYYY_sutlej_size, MRFAILED_MULR_DDMMYYYY_destination_size, MRFAILED_PSGI_DDMMYYYY_sutlej_size, MRFAILED_PSGI_DDMMYYYY_destination_size, ATM_FAILED_DDMMYYYY_sutlej_size, ATM_FAILED_DDMMYYYY_destination_size, inb_98888_DDMMYY_sutlej_size, inb_98888_DDMMYY_destination_size,B24FAIL_yyyymmdd_sutlej_size,B24FAIL_yyyymmdd_destination_size, repost_INB_Count, repost_MR_Count, repost_ATM_Count,repost_B24_Count, M, Sutlej_Count, Mithi_Count, QUATER_CHECK, PMON_CHECK, DB_CONNECTIVITY_CHECK, DATA_BASEMODE_CHECK, DB_SPACE_CHECK, DB_PARTITION_CHECK, Mount_Point_SPACE_CHECK, RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, processed_Count, pending_Count, failed_Count, completion_Count, SI_RC_M, SI_RC_S1, SI_RC_S2, SI_RC_S3, SI_RC_S4, SI_RC_S5, SI_RC_S6, SI_RC_S7, SI_RC_S8, SI_ORA_M, SI_ORA_S1, SI_ORA_S2, SI_ORA_S3, SI_ORA_S4, SI_ORA_S5, SI_ORA_S6, SI_ORA_S7, SI_ORA_S8, arch, arch1,PSGI,repost_failure, table_space, Maker, Checker, time, status, Inst_Date )
			    VALUES (   '$MRFAILED_MULR_DDMMYYYY_sutlej_size', '$MRFAILED_MULR_DDMMYYYY_destination_size', '$MRFAILED_PSGI_DDMMYYYY_sutlej_size', '$MRFAILED_PSGI_DDMMYYYY_destination_size', '$ATM_FAILED_DDMMYYYY_sutlej_size', '$ATM_FAILED_DDMMYYYY_destination_size', '$inb_98888_DDMMYY_sutlej_size', '$inb_98888_DDMMYY_destination_size','$B24FAIL_yyyymmdd_sutlej_size', '$B24FAIL_yyyymmdd_destination_size', '$repost_INB_Count', '$repost_MR_Count', '$repost_ATM_Count','$repost_B24_Count' ,'$M', '$Sutlej_Count', '$Mithi_Count', '$QUATER_CHECK', '$PMON_CHECK', '$DB_CONNECTIVITY_CHECK', '$DATA_BASEMODE_CHECK', '$DB_SPACE_CHECK', '$DB_PARTITION_CHECK', '$Mount_Point_SPACE_CHECK', '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', '$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', '$processed_Count', '$pending_Count', '$failed_Count', '$completion_Count', '$SI_RC_M', '$SI_RC_S1', '$SI_RC_S2', '$SI_RC_S3', '$SI_RC_S4', '$SI_RC_S5', '$SI_RC_S6', '$SI_RC_S7', '$SI_RC_S8', '$SI_ORA_M', '$SI_ORA_S1', '$SI_ORA_S2', '$SI_ORA_S3', '$SI_ORA_S4', '$SI_ORA_S5', '$SI_ORA_S6', '$SI_ORA_S7', '$SI_ORA_S8', '$arch', '$arch1','$PSGI','$repost_failure', '$table_space','$Maker', '$Checker', '$time', '$status', '$crrdate' ) ");
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}


/*<!----------------------------------------------Checklist Page 13-------------------------------------------------->*/
if(isset($_POST['save_pg13']) || isset($_POST['submit_pg13'])){
	
			$NeeraCount_001 = $_POST['NeeraCount_001'];
			$NeeraCount_HOLD = $_POST['NeeraCount_HOLD'];
			$NeeraCount_MAN = $_POST['NeeraCount_MAN'];
			$NeeraCount_SUSP = $_POST['NeeraCount_SUSP'];
			$TargetCount_001 = $_POST['TargetCount_001'];
			$TargetCount_HOLD = $_POST['TargetCount_HOLD'];
			$TargetCount_MAN = $_POST['TargetCount_MAN'];
			$TargetCount_SUSP = $_POST['TargetCount_SUSP'];
			$ATM_Status = $_POST['ATM_Status'];
			$GECAP_Neera_Count = $_POST['GECAP_Neera_Count'];
			$GECAP_Target_Count = $_POST['GECAP_Target_Count'];
			$GECAP_Status = $_POST['GECAP_Status'];
			$BROKER_Neera_Count = $_POST['BROKER_Neera_Count'];
			$BROKER_Target_Count = $_POST['BROKER_Target_Count'];
			$BROKER_Status = $_POST['BROKER_Status'];
			$failedLog_M = $_POST['failedLog_M'];
			$failedLog_S1 = $_POST['failedLog_S1'];
			$failedLog_S2 = $_POST['failedLog_S2'];
			$failedLog_S3 = $_POST['failedLog_S3'];
			$failedLog_S4 = $_POST['failedLog_S4'];
			$failedLog_S5 = $_POST['failedLog_S5'];
			$failedLog_S6 = $_POST['failedLog_S6'];
			$failedLog_S7 = $_POST['failedLog_S7'];
			$failedLog_S8 = $_POST['failedLog_S8'];
			$ignoredLog_M = $_POST['ignoredLog_M'];
			$ignoredLog_S1 = $_POST['ignoredLog_S1'];
			$ignoredLog_S2 = $_POST['ignoredLog_S2'];
			$ignoredLog_S3 = $_POST['ignoredLog_S3'];
			$ignoredLog_S4 = $_POST['ignoredLog_S4'];
			$ignoredLog_S5 = $_POST['ignoredLog_S5'];
			$ignoredLog_S6 = $_POST['ignoredLog_S6'];
			$ignoredLog_S7 = $_POST['ignoredLog_S7'];
			$ignoredLog_S8 = $_POST['ignoredLog_S8'];
			$noPushLog_M = $_POST['noPushLog_M'];
			$noPushLog_S1 =  $_POST['noPushLog_S1'];
			$noPushLog_S2 = $_POST['noPushLog_S2'];
			$noPushLog_S3 = $_POST['noPushLog_S3'];
			$noPushLog_S4 = $_POST['noPushLog_S4'];
			$noPushLog_S5 = $_POST['noPushLog_S5'];
			$noPushLog_S6 = $_POST['noPushLog_S6'];
			$noPushLog_S7 =  $_POST['noPushLog_S7'];
			$noPushLog_S8 = $_POST['noPushLog_S8'];
			$db_Space  = $_POST['db_Space'];
			$MountPoint_Space = $_POST['MountPoint_Space'];
			$Gliftobrch_Status = $_POST['Gliftobrch_Status'];
			$ftp_Time = $_POST['ftp_Time'];
			$Ftped_Count = $_POST['Ftped_Count'];
			$comments = $_POST['comments'];
			$comments1 = $_POST['comments1'];
			$err_file = $_POST['err_file'];
			$INCT_offline_loading = $_POST['INCT_offline_loading'];
			$GECT_offline_loading = $_POST['GECT_offline_loading'];
			$INCT_off_load_comp = $_POST['INCT_off_load_comp'];
			$GECT_off_load_comp = $_POST['GECT_off_load_comp'];
			$mountpoint_narmada = implode(",",$_POST['mountpoint_narmada']);
			$gend0805 = implode(",",$_POST['gend0805']);
			$Maker = implode(",",$_POST['Maker']);
			$Checker = implode(",",$_POST['Checker']);
			$time = implode(",",$_POST['time']);
			$status='1';
			$crrdate = mflags();
			$ma=substr_count($Maker,",,");
			$ck=substr_count($Checker,",,");
			$tm=substr_count($time,",,");
		
		$query = mysql_query("select * from checklist_pg13 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg13 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
		if(isset($_POST['submit_pg13'])){
			if(($ma > 0) || ($ck > 0) || ($tm > 0)){
				echo "<script>alert('(!)Checked Properly You Have missed |Marker | Checker | Checked Time;')</script>";
			}
		else{
				$sql = mysql_query ("update checklist_pg13 set 
				NeeraCount_001 = '$NeeraCount_001', NeeraCount_HOLD = '$NeeraCount_HOLD', NeeraCount_MAN = '$NeeraCount_MAN', 
				NeeraCount_SUSP = '$NeeraCount_SUSP',
				TargetCount_001 = '$TargetCount_001', TargetCount_HOLD = '$TargetCount_HOLD', TargetCount_MAN = '$TargetCount_MAN', 
				TargetCount_SUSP = '$TargetCount_SUSP',
				ATM_Status = '$ATM_Status',
				GECAP_Neera_Count = '$GECAP_Neera_Count', 
				GECAP_Target_Count = '$GECAP_Target_Count',
				GECAP_Status = '$GECAP_Status', 
				BROKER_Neera_Count = '$BROKER_Neera_Count', 
				BROKER_Target_Count = '$BROKER_Target_Count', 
				BROKER_Status = '$BROKER_Status', 
				failedLog_M = '$failedLog_M', failedLog_S1 = '$failedLog_S1', failedLog_S2 = '$failedLog_S2', failedLog_S3 = '$failedLog_S3', failedLog_S4 = '$failedLog_S4', 
				failedLog_S5 = '$failedLog_S5', failedLog_S6 = '$failedLog_S6', failedLog_S7 = '$failedLog_S7', failedLog_S8 = '$failedLog_S8',
				ignoredLog_M = '$ignoredLog_M', ignoredLog_S1 = '$ignoredLog_S1', ignoredLog_S2 = '$ignoredLog_S2', ignoredLog_S3 = '$ignoredLog_S3', ignoredLog_S4 = '$ignoredLog_S4', 
				ignoredLog_S5 = '$ignoredLog_S5', ignoredLog_S6 = '$ignoredLog_S6', ignoredLog_S7 = '$ignoredLog_S7', ignoredLog_S8 = '$ignoredLog_S8', 
				noPushLog_M = '$noPushLog_M', noPushLog_S1 = '$noPushLog_S1', noPushLog_S2 = '$noPushLog_S2', noPushLog_S3 = '$noPushLog_S3', noPushLog_S4 = '$noPushLog_S4', 
				noPushLog_S5 = '$noPushLog_S5', noPushLog_S6 = '$noPushLog_S6', noPushLog_S7 = '$noPushLog_S7', noPushLog_S8 = '$noPushLog_S8',
				db_Space = '$db_Space', 
				MountPoint_Space = '$MountPoint_Space', Gliftobrch_Status = '$Gliftobrch_Status', ftp_Time = '$ftp_Time', 
				Ftped_Count = '$Ftped_Count', err_file = '$err_file', INCT_offline_loading = '$INCT_offline_loading', GECT_offline_loading = '$GECT_offline_loading', INCT_off_load_comp = '$INCT_off_load_comp', GECT_off_load_comp = '$GECT_off_load_comp',mountpoint_narmada = '$mountpoint_narmada',gend0805 = '$gend0805',
				Maker = '$Maker', Checker = '$Checker', time = '$time', comments = '$comments',comments1 = '$comments1', freeze = '1' where status = '1' && Inst_Date = '$crrdate'");
				if($sql)
				{ 	
					echo "<script>alert('Record has been freezed');window.location.href='../dashboard.php';</script> ";
					
				}
			}	
		}
		
		else { 
			$sql1 = mysql_query("update checklist_pg13 set 
				NeeraCount_001 = '$NeeraCount_001', NeeraCount_HOLD = '$NeeraCount_HOLD', NeeraCount_MAN = '$NeeraCount_MAN', 
				NeeraCount_SUSP = '$NeeraCount_SUSP',
				TargetCount_001 = '$TargetCount_001', TargetCount_HOLD = '$TargetCount_HOLD', TargetCount_MAN = '$TargetCount_MAN', 
				TargetCount_SUSP = '$TargetCount_SUSP',
				ATM_Status = '$ATM_Status',
				GECAP_Neera_Count = '$GECAP_Neera_Count', 
				GECAP_Target_Count = '$GECAP_Target_Count',
				GECAP_Status = '$GECAP_Status', 
				BROKER_Neera_Count = '$BROKER_Neera_Count', 
				BROKER_Target_Count = '$BROKER_Target_Count', 
				BROKER_Status = '$BROKER_Status', 
				failedLog_M = '$failedLog_M', failedLog_S1 = '$failedLog_S1', failedLog_S2 = '$failedLog_S2', failedLog_S3 = '$failedLog_S3', failedLog_S4 = '$failedLog_S4', 
				failedLog_S5 = '$failedLog_S5', failedLog_S6 = '$failedLog_S6', failedLog_S7 = '$failedLog_S7', failedLog_S8 = '$failedLog_S8',
				ignoredLog_M = '$ignoredLog_M', ignoredLog_S1 = '$ignoredLog_S1', ignoredLog_S2 = '$ignoredLog_S2', ignoredLog_S3 = '$ignoredLog_S3', ignoredLog_S4 = '$ignoredLog_S4', 
				ignoredLog_S5 = '$ignoredLog_S5', ignoredLog_S6 = '$ignoredLog_S6', ignoredLog_S7 = '$ignoredLog_S7', ignoredLog_S8 = '$ignoredLog_S8', 
				noPushLog_M = '$noPushLog_M', noPushLog_S1 = '$noPushLog_S1', noPushLog_S2 = '$noPushLog_S2', noPushLog_S3 = '$noPushLog_S3', noPushLog_S4 = '$noPushLog_S4', 
				noPushLog_S5 = '$noPushLog_S5', noPushLog_S6 = '$noPushLog_S6', noPushLog_S7 = '$noPushLog_S7', noPushLog_S8 = '$noPushLog_S8',
				db_Space = '$db_Space', 
				MountPoint_Space = '$MountPoint_Space', Gliftobrch_Status = '$Gliftobrch_Status', ftp_Time = '$ftp_Time', 
				Ftped_Count = '$Ftped_Count', err_file = '$err_file', INCT_offline_loading = '$INCT_offline_loading', GECT_offline_loading = '$GECT_offline_loading', INCT_off_load_comp = '$INCT_off_load_comp', GECT_off_load_comp = '$GECT_off_load_comp',mountpoint_narmada = '$mountpoint_narmada',gend0805 = '$gend0805',
				Maker =  '$Maker', Checker =  '$Checker',  comments = '$comments',comments1 = '$comments1', time =  '$time' where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully updated')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg13'])){
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0)){ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Marker | Checker | Checked Time;')</script>";
			}
		}	
		else {
			$sql1 = mysql_query ("INSERT INTO checklist_pg13(NeeraCount_001, NeeraCount_HOLD, NeeraCount_MAN, NeeraCount_SUSP,TargetCount_001, TargetCount_HOLD, TargetCount_MAN, TargetCount_SUSP,  ATM_Status, GECAP_Neera_Count, GECAP_Target_Count, GECAP_Status, BROKER_Neera_Count, BROKER_Target_Count, BROKER_Status, failedLog_M, failedLog_S1, failedLog_S2, failedLog_S3, failedLog_S4, failedLog_S5, failedLog_S6, failedLog_S7, failedLog_S8, ignoredLog_M, ignoredLog_S1, ignoredLog_S2, ignoredLog_S3, ignoredLog_S4, ignoredLog_S5, ignoredLog_S6, ignoredLog_S7, ignoredLog_S8, noPushLog_M, noPushLog_S1, noPushLog_S2, noPushLog_S3, noPushLog_S4, noPushLog_S5, noPushLog_S6, noPushLog_S7, noPushLog_S8, db_Space, MountPoint_Space, Gliftobrch_Status, Ftped_Count, ftp_Time, err_file,INCT_offline_loading, GECT_offline_loading, INCT_off_load_comp, GECT_off_load_comp, mountpoint_narmada,gend0805, Maker, Checker, time, comments,comments1, status, Inst_Date )VALUES ('$NeeraCount_001', '$NeeraCount_HOLD', '$NeeraCount_MAN', '$NeeraCount_SUSP','$TargetCount_001', '$TargetCount_HOLD', '$TargetCount_MAN', '$TargetCount_SUSP',  '$ATM_Status', '$GECAP_Neera_Count', '$GECAP_Target_Count', '$GECAP_Status', '$BROKER_Neera_Count', '$BROKER_Target_Count', '$BROKER_Status', '$failedLog_M', '$failedLog_S1', '$failedLog_S2', '$failedLog_S3', '$failedLog_S4', '$failedLog_S5', '$failedLog_S6', '$failedLog_S7', '$failedLog_S8', '$ignoredLog_M', '$ignoredLog_S1', '$ignoredLog_S2', '$ignoredLog_S3', '$ignoredLog_S4', '$ignoredLog_S5', '$ignoredLog_S6', '$ignoredLog_S7', '$ignoredLog_S8', '$noPushLog_M', '$noPushLog_S1', '$noPushLog_S2', '$noPushLog_S3', '$noPushLog_S4', '$noPushLog_S5', '$noPushLog_S6', '$noPushLog_S7', '$noPushLog_S8', '$db_Space', '$MountPoint_Space', '$Gliftobrch_Status', '$Ftped_Count', '$ftp_Time', '$err_file', '$INCT_offline_loading', '$GECT_offline_loading', '$INCT_off_load_comp', '$GECT_off_load_comp','$mountpoint_narmada','$gend0805','$Maker', '$Checker', '$time', '$comments','$comments1', '$status', '$crrdate' ) ");
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "INSERT INTO checklist_pg13(NeeraCount_001, NeeraCount_HOLD, NeeraCount_MAN, NeeraCount_SUSP,TargetCount_001, TargetCount_HOLD, TargetCount_MAN, TargetCount_SUSP,  ATM_Status, GECAP_Neera_Count, GECAP_Target_Count, GECAP_Status, BROKER_Neera_Count, BROKER_Target_Count, BROKER_Status, failedLog_M, failedLog_S1, failedLog_S2, failedLog_S3, failedLog_S4, failedLog_S5, failedLog_S6, failedLog_S7, failedLog_S8, ignoredLog_M, ignoredLog_S1, ignoredLog_S2, ignoredLog_S3, ignoredLog_S4, ignoredLog_S5, ignoredLog_S6, ignoredLog_S7, ignoredLog_S8, noPushLog_M, noPushLog_S1, noPushLog_S2, noPushLog_S3, noPushLog_S4, noPushLog_S5, noPushLog_S6, noPushLog_S7, noPushLog_S8, db_Space, MountPoint_Space, Gliftobrch_Status, Ftped_Count, ftp_Time, err_file,INCT_offline_loading, GECT_offline_loading, INCT_off_load_comp, GECT_off_load_comp, mountpoint_narmada,gend0805, Maker, Checker, time, comments,comments1, status, Inst_Date )VALUES ('$NeeraCount_001', '$NeeraCount_HOLD', '$NeeraCount_MAN', '$NeeraCount_SUSP','$TargetCount_001', '$TargetCount_HOLD', '$TargetCount_MAN', '$TargetCount_SUSP',  '$ATM_Status', '$GECAP_Neera_Count', '$GECAP_Target_Count', '$GECAP_Status', '$BROKER_Neera_Count', '$BROKER_Target_Count', '$BROKER_Status', '$failedLog_M', '$failedLog_S1', '$failedLog_S2', '$failedLog_S3', '$failedLog_S4', '$failedLog_S5', '$failedLog_S6', '$failedLog_S7', '$failedLog_S8', '$ignoredLog_M', '$ignoredLog_S1', '$ignoredLog_S2', '$ignoredLog_S3', '$ignoredLog_S4', '$ignoredLog_S5', '$ignoredLog_S6', '$ignoredLog_S7', '$ignoredLog_S8', '$noPushLog_M', '$noPushLog_S1', '$noPushLog_S2', '$noPushLog_S3', '$noPushLog_S4', '$noPushLog_S5', '$noPushLog_S6', '$noPushLog_S7', '$noPushLog_S8', '$db_Space', '$MountPoint_Space', '$Gliftobrch_Status', '$Ftped_Count', '$ftp_Time', '$err_file', '$INCT_offline_loading', '$GECT_offline_loading', '$INCT_off_load_comp', '$GECT_off_load_comp','$mountpoint_narmada','$gend0805','$Maker', '$Checker', '$time', '$comments','$comments1', '$status', '$crrdate' )";
			}
		}	
	}
}


/*<!--------------------------------------------Checklist Page 14-------------------------------------------------->*/
if(isset($_POST['save_pg14']) || isset($_POST['submit_pg14'])){	
			
			
			$RC_M = $_POST['RC_M'];
			$RC_S1 = $_POST['RC_S1'];
			$RC_S2 = $_POST['RC_S2'];
			$RC_S3 = $_POST['RC_S3'];
			$RC_S4 = $_POST['RC_S4'];
			$RC_S5 = $_POST['RC_S5'];
			$RC_S6 = $_POST['RC_S6'];
			$RC_S7 = $_POST['RC_S7'];
			$RC_S8 = $_POST['RC_S8'];
			$ORA_M = $_POST['ORA_M'];
			$ORA_S1 = $_POST['ORA_S1'];
			$ORA_S2 = $_POST['ORA_S2'];
			$ORA_S3 = $_POST['ORA_S3'];
			$ORA_S4 = $_POST['ORA_S4'];
			$ORA_S5 = $_POST['ORA_S5'];
			$ORA_S6 = $_POST['ORA_S6'];
			$ORA_S7 = $_POST['ORA_S7'];
			$ORA_S8 = $_POST['ORA_S8'];
			$INCT_archival_date = $_POST['INCT_archival_date'];
			$INCT_loading_status = $_POST['INCT_loading_status'];
			$GECT_archival_date = $_POST['GECT_archival_date'];
			$GECT_loading_status = $_POST['GECT_loading_status'];
			$CGL_Count = $_POST['CGL_Count'];
			$Balance_Count = $_POST['Balance_Count'];
			$amt_Report = $_POST['amt_Report'];
			$diff_Count = $_POST['diff_Count'];
			$unmapped_CGL_Count = $_POST['unmapped_CGL_Count'];
			$mail_Status = $_POST['mail_Status'];
			$approved = $_POST['approved'];
			$reason = $_POST['reason'];
			$repost_failure_mail = $_POST['repost_failure_mail'];
			$Maker = implode(",",$_POST['Maker']);
			$Checker = implode(",",$_POST['Checker']);
			$time = implode(",",$_POST['time']);
			$RcErrorWithJob = implode(",",$_POST['RcErrorWithJob']);
			$status='1';
			$crrdate = ($_POST['freeze'] != '') ? $_POST['freeze'] : mflags();
			$ma=substr_count($Maker,",,");
			$ck=substr_count($Checker,",,");
			$tm=substr_count($time,",,");
		
		$query = mysql_query("select * from checklist_pg14 where status='1' && Inst_Date='$crrdate' && freeze = '1'");
		$query1 = mysql_query("select * from checklist_pg14 where status='1' && Inst_Date='$crrdate' && freeze != '1'");
		if(mysql_num_rows($query) > 0 ){
		echo "<script>alert('Record has already been inserted for the day!!')</script>";
		}
		elseif(mysql_num_rows($query1) > 0){
			if(isset($_POST['submit_pg14'])){
				if(($ma > 0) || ($ck > 0) || ($tm > 0)){
					echo "<script>alert('(!)Checked Properly You Have missed |Maker | Checker | Checked Time;')</script>";
				}
			else{
				$qe = mysql_query("
					select 'checklist_pg01' as 'pagename' from checklist_pg01 where freeze='' AND Inst_Date = '$crrdate'
					union
					select 'checklist_pg02' as 'pagename' from checklist_pg02 where freeze='' AND Inst_Date = '$crrdate'
					union                  
					select 'checklist_pg03' as 'pagename' from checklist_pg03 where freeze='' AND Inst_Date = '$crrdate'
					union                  
					select 'checklist_pg05' as 'pagename' from checklist_pg05 where freeze='' AND Inst_Date = '$crrdate'
					union  
					select 'checklist_pg06' as 'pagename' from checklist_pg06 where freeze='' AND Inst_Date = '$crrdate'
					union  
					select 'checklist_pg07' as 'pagename' from checklist_pg07 where freeze='' AND Inst_Date = '$crrdate'
					union  
					select 'checklist_pg08' as 'pagename' from checklist_pg08 where freeze='' AND Inst_Date = '$crrdate'
					union  
					select 'checklist_pg09' as 'pagename' from checklist_pg09 where freeze='' AND Inst_Date = '$crrdate'
					union  
					select 'checklist_pg10' as 'pagename' from checklist_pg10 where freeze='' AND Inst_Date = '$crrdate'
					union  
					select 'checklist_pg11' as 'pagename' from checklist_pg11 where freeze='' AND Inst_Date = '$crrdate'
					union  
					select 'checklist_pg12' as 'pagename' from checklist_pg12 where freeze='' AND Inst_Date = '$crrdate'
					union  
					select 'checklist_pg13' as 'pagename' from checklist_pg13 where freeze='' AND Inst_Date = '$crrdate'
					");
					$pagename1 = array();
					while($te=mysql_fetch_assoc($qe))
					{ 
						$pagenamecutter= str_replace('ec','',$te['pagename']);
						$pagename1[] = identityProvider($pagenamecutter); 
					}
					if(mysql_num_rows($qe)>0)
					{
						$pagename1 = implode($pagename1,',');
						echo "<script>alert('All Pages have not been filled for the current Mflags Date $crrdate ! Please Submit these pages ($pagename1) first')</script>";
					}						
					else
					{
						$sql = mysql_query ("update checklist_pg14 set 
						RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
						RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
						ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
						ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
						ORA_S8 = '$ORA_S8',
						INCT_archival_date = '$INCT_archival_date', INCT_loading_status = '$INCT_loading_status', GECT_archival_date = '$GECT_archival_date', GECT_loading_status = '$GECT_loading_status', 
						CGL_Count = '$CGL_Count', Balance_Count = '$Balance_Count', amt_Report = '$amt_Report', diff_Count = '$diff_Count', unmapped_CGL_Count = '$unmapped_CGL_Count',
						mail_Status = '$mail_Status', approved = '$approved', reason = '$reason', repost_failure_mail = '$repost_failure_mail',
						Maker = '$Maker', Checker = '$Checker', time = '$time', freeze = '1', RcErrorWithJob = '$RcErrorWithJob' 
						where status = '1' && Inst_Date = '$crrdate'");
						$sql = mysql_query("update mflags set status='0', freeze='1', modifiedtime=NOW() where mflags = '$crrdate'");	
						if($sql)
						{
							echo "<script>alert('Record has been freezed! Please LogOut And Change The Mflags Date');window.location.href='../logout.php';</script>";
						}
					}
				}	
			}	

		else { 
			$sql1 = mysql_query("update checklist_pg14 set 
				 RC_M = '$RC_M', RC_S1 = '$RC_S1', RC_S2 = '$RC_S2', RC_S3 = '$RC_S3', RC_S4 = '$RC_S4', 
				RC_S5 = '$RC_S5', RC_S6 = '$RC_S6', RC_S7 = '$RC_S7', RC_S8 = '$RC_S8', 
				ORA_M = '$ORA_M', ORA_S1 = '$ORA_S1', ORA_S2 = '$ORA_S2', ORA_S3='$ORA_S3', 
				ORA_S4 = '$ORA_S4', ORA_S5 = '$ORA_S5', ORA_S6 = '$ORA_S6', ORA_S7 = '$ORA_S7', 
				ORA_S8 = '$ORA_S8',
				INCT_archival_date = '$INCT_archival_date', INCT_loading_status = '$INCT_loading_status', GECT_archival_date = '$GECT_archival_date', GECT_loading_status = '$GECT_loading_status', 
				CGL_Count = '$CGL_Count', Balance_Count = '$Balance_Count', amt_Report = '$amt_Report', diff_Count = '$diff_Count', unmapped_CGL_Count = '$unmapped_CGL_Count',
				mail_Status = '$mail_Status',approved = '$approved', reason = '$reason' ,repost_failure_mail = '$repost_failure_mail',
				Maker =  '$Maker', Checker =  '$Checker', time =  '$time', RcErrorWithJob = '$RcErrorWithJob' 
				where status = '1' && Inst_Date = '$crrdate'"); 
			 
			 if($sql1)
				{
					echo "<script>alert('Record has been Successfully Updated')</script>";
					
				}
		}	
	}
	
	else {
		if(isset($_POST['submit_pg14']))
		{
			if(($ma > 0) || ($ck > 0 ) || ($tm > 0))
			{ 
					echo "<script>alert('(!)Checked Properly You Have missed  |Maker | Checker | Checked Time;')</script>";
			}
		}	
		else 
		{
				
			$sql1 = mysql_query ("INSERT INTO checklist_pg14 ( RC_M, RC_S1, RC_S2, RC_S3, RC_S4, RC_S5, RC_S6, RC_S7, RC_S8, ORA_M, ORA_S1, ORA_S2, ORA_S3, ORA_S4, ORA_S5, ORA_S6, ORA_S7, ORA_S8, INCT_archival_date, INCT_loading_status, GECT_archival_date, GECT_loading_status, CGL_Count, Balance_Count, amt_Report, diff_Count, unmapped_CGL_Count, mail_Status,  approved, reason,repost_failure_mail,Maker, Checker, time, status, Inst_Date, RcErrorWithJob )
			    VALUES (  '$RC_M', '$RC_S1', '$RC_S2', '$RC_S3', '$RC_S4', '$RC_S5', '$RC_S6', '$RC_S7', '$RC_S8', '$ORA_M', '$ORA_S1', '$ORA_S2', '$ORA_S3', '$ORA_S4', '$ORA_S5', '$ORA_S6', '$ORA_S7', '$ORA_S8', '$INCT_archival_date', '$INCT_loading_status', '$GECT_archival_date', '$GECT_loading_status', '$CGL_Count', '$Balance_Count', '$amt_Report', '$diff_Count', '$unmapped_CGL_Count', '$mail_Status','$approved', '$reason','$repost_failure_mail','$Maker', '$Checker', '$time', '$status', '$crrdate', '$RcErrorWithJob' ) ");
			
			if($sql1)
			{
				echo "<script>alert('Record has been inserted')</script>";
				
			}	
			else	
			{
				echo "<script>alert('Data is not inserted')</script>";
			}
		}	
	}
}

/*----------------------Training Region-----------------------------*/

if(isset($_POST['submit_training'])|| isset($_POST['save_training'])){
	$Maker=implode(",",$_POST['Maker']);
	$time=implode(",",$_POST['time']);
	$select1=$_POST['select1'];
	$select2=$_POST['select2'];
	$select3=$_POST['select3'];
	if($select3=='NO')
	{
		array_pop($_POST['checked_count']);
	}
	$checked_count=implode(",",$_POST['checked_count']);
	$Inst_Date=date('Y-m-d');
	
    $query = mysql_query("select * from training_region where freeze = '1' && status='1' && Inst_Date = '$Inst_Date'");
	$query1 = mysql_query("select * from training_region where freeze != '1' && status='1' && Inst_Date = '$Inst_Date'");
	if(mysql_num_rows($query) > 0 )
	{
		echo "<script>alert('Record has already been inserted for the day!!')
					  window.location.href='".$hostName."ChecklistFinal/pages/chklist_training_region.php';
			</script>";
	}
	elseif(mysql_num_rows($query1) > 0 )
	{
				if(isset($_POST['submit_training']))
				{
					$sql3 = mysql_query ("update training_region set 
					 select1='$select1' ,select2='$select2',select3='$select3',checked_count='$checked_count',Maker='$Maker',time='$time', freeze = '1' where status = '1' && Inst_Date = '$Inst_Date'");
					
					if($sql3)
					{ 	
						echo "<script>alert('Record has been freezed') 
						window.location.href='".$hostName."ChecklistFinal/pages/chklist_training_region.php';</script>";
						
					}
					else
					{
							echo "<script>alert('It failed')</script>";
					}
				}
					
				elseif(isset($_POST['save_training'])) 
				{ 
					$sql3 = mysql_query("update training_region set 
					select1='$select1', select2='$select2',select3='$select3',checked_count='$checked_count',Maker='$Maker',time='$time' where status = '1' && Inst_Date = '$Inst_Date'");
					if($sql3)
					{
						echo "<script>alert('Record has been Successfully Updated') 
						window.location.href='".$hostName."ChecklistFinal/pages/chklist_training_region.php';</script>";
						
					}	
					else
					{
						echo "<script>alert('Insertion failed')</script>";
					}
				}
				
	}
	
	else 
	{
			if(isset($_POST['save_training']))
			{
				$sql3=mysql_query("INSERT INTO training_region (select1, select2, select3, checked_count, time, Maker, status, freeze, Inst_Date) 
					VALUES ('$select1', '$select2','$select3','$checked_count', '$time', '$Maker','1', '0', '$Inst_Date')");
				if($sql3)
				{
					echo "<script>alert('Record has been inserted') 
					window.location.href='".$hostName."ChecklistFinal/pages/chklist_training_region.php';</script>";
		
				}	
				else	
				{
					echo "<script>alert('Data is not inserted')</script>";
				}
			}	
	}
	
	
}

/*----------------------Raise Issues--------------------------------*/

if (isset($_REQUEST['submit_pg'])) 
{
	//$Checklist=$_POST['Checklist'];
	$issue=mysql_real_escape_string($_POST['issue']);
	$IssueCall_id=$_POST['IssueCall_id'];
	$issue_date=$_POST['issue_date'];
	$raise_by=$_POST['raise_by'];
	$query=mysql_real_escape_string($_POST['query']);
	if($IssueCall_id != '')
	{
		$sql1=mysql_query("update ticket_raise set 
		issue='$issue',issue_date='$issue_date',query='$query',status='pending',Inst_Date=now() where IssueCall_id='$IssueCall_id'");
	}
	else
	{
		$sql = mysql_query ("INSERT INTO ticket_raise(issue, issue_date, raise_by, query, status, Inst_Date) 
		VALUES ('$issue', '$issue_date', '$raise_by', '$query', 'pending', NOW() ) " );
	}
	if($sql)
	{
		echo "<script>alert('Record Entered Successfully')</script>";
		//header("location:new.php");
	}
	elseif($sql1)
	{
		echo "<script>alert('Record Updated Successfully');window.location.href='".$hostName."ChecklistFinal/pages/new.php'</script>";
	}	
	else
	{
		echo  "<script>alert('Data is not inserted')</script>";
		//header("location:new.php");
	}

}
//page force submit

if (isset($_POST['submit_page_force'])) 
{
	$pagename=str_ireplace('chklist','checklist',$_POST['pagename']);
	$pageRealName=$_POST['pageRealName'];
	$checkid=$_POST['checkid'];
	$assigned_by=$_POST['assigned_by'];
	$assigned_to=$_POST['assigned_to'];
	$on_behalf=$_POST['on_behalf'];
	$ids =  ( $pagename == 'running_checklist'  ?  'run_cklid' : 'CheckedTime_Id' );
	$reason=$_POST['reason'];
	if($pagename == 'running_checklist'){ 
		$tablename= "run_ckl";
		$sqlUpdate =  mysql_query("update $tablename set freeze='1' , status='0' where $ids='$checkid'");
	}
	elseif ($pagename == 'checklist_training_region'){
		$tablename="training_region";
		$sqlUpdate =   mysql_query("update $tablename set freeze='1' where $ids='$checkid'");
	}
	else{
		$sqlUpdate =   mysql_query("update $pagename set freeze='1' where $ids='$checkid'");
		//echo "update $pagename set freeze='1' where $ids='$checkid'";
	}
	echo "update $pagename set freeze='1' where $ids='$checkid'";
	//echo "update $tablename set freeze='1' , status='0' where $ids='$checkid'";
	//$sql = mysql_query("update mflags set status='0', freeze='1', modifiedtime=NOW() where mflags = '$crrdate'");	
	
	if($sqlUpdate)
	{
		
		$sqlRemarks=mysql_query("INSERT INTO remarks(pagename,checkid, assigned_to, assigned_by, on_behalf, reason, Inst_Date) VALUES ( '$pagename', '$checkid', '$assigned_to', '$assigned_by','$on_behalf','$reason', NOW() ) ");
		echo "<script>
				alert('".$pagename." has been Freezed Successfully')
				window.location.href='".$hostName."checklistfinal/dashboard.php';	
			</script>";
		//header("location:../dashboard.php");
	}	
	else
	{
		echo "<script>alert('Data is not inserted');</script>";
		//header("location:new.php");
	}

	
	
}
if (isset($_POST['pagestats']))
{
	
	$remarks=mysql_real_escape_string($_REQUEST['remarks']);
	$ticketId=$_POST['ticketId'];
	//echo "update ticket_raise set remarks='$remarks',status='Resolved' where IssueCall_id='$ticketId'";
	//$mj22=mysql_query("update ticket_raise set remarks='$remarks' where IssueCall_id='$ticketId'");
	
	if($remarks == '')
		{
		echo "<script>
				alert('Enter Remarks First !!! ')
				window.location.href='".$hostName."checklistfinal/dashboard.php';
			</script>";
		}
	else
		{
		$sqlmj11=mysql_query("update ticket_raise set remarks='$remarks',status='Resolved' where IssueCall_id='$ticketId'");
		if($sqlmj11)
			{
				echo "<script>
						alert('Issue Status has been Changed Successfully')
						window.location.href='".$hostName."checklistfinal/dashboard.php';	
					</script>";
				//header("location:../dashboard.php");
			}	
			else
			{
				echo  "<script>alert(Status is not Changed !)</script>";
				//header("location:new.php");
			}
		}	
}
?>
