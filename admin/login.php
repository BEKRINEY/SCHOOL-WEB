<?php
session_start ();
include 'lib/Database.Pdo.class.php';
$db = new database ();
if (isset ( $_POST ['user'] ) && isset ( $_POST ['pass'] ) && $_POST ['user'] != null) {
	$rs = $db->doQuery ( 'select (case  when t_student.c_id is null then t_teacher.c_id else  t_student.c_id end) as id ' . ', t_group.c_group from t_user join t_group on t_user.c_group=t_group.c_id  ' . ' left JOIN t_student on t_student.c_cne=t_user.c_username ' . ' left join t_teacher on t_teacher.c_pptr=t_user.c_username ' . ' where c_username = ? and c_password = ?', array (
			'ss',
			$_POST ['user'],
			$_POST ['pass'] 
	) );
	if (count ( $rs [0] ) > 0) {
		
		$_SESSION ['SID'] = $rs [0] ['id'];
		$_SESSION['user']=$_POST ['user'] ;
		$_SESSION['pass']=$_POST ['pass'];
		$_SESSION ['TYPE'] = $rs [0] ['c_group'];
		if ($_SESSION ['TYPE'] == 'STUDENT') {
			$_SESSION['owner']='Etudiant';
			$rs = $db->doQuery ( 'SELECT * FROM t_student where c_id=' . $_SESSION ['SID'] );
		} else {
			$rs = $db->doQuery ( 'SELECT * FROM t_teacher where c_id=' . $_SESSION ['SID'] );
			if ($_SESSION ['TYPE'] == 'GS')
				$_SESSION['owner']='Surveillant Général';
			elseif ($_SESSION ['TYPE'] == 'TEACHER')
				$_SESSION['owner']='Professeur';
			else
				$_SESSION['owner']='Directeur';
		}
		$_SESSION ['FULLNAME'] = $rs [0] [1] . ' ' . $rs [0] [2];
		header ( "location: home.php" );
	} else {
		session_destroy ();
		header ( "location: index.php?EREUR=informations de connexion invalides" );
	}
} else {
	header ( "location: index.php?EREUR=veuillez entrer vos informations de connexion" );
}
?>