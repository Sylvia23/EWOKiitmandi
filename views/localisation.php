<!-- /* 
Filename : ../views/localisation.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 07-07-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php
$lang = $_GET['lang'];
$langarray = array('en','hi');
$found = false;

if (in_array($lang, $langarray)) {
  $found = true;
}

if (!$found) {
  $lang = 'en';
}

$xml=simplexml_load_file("languages.xml") or die("xml not found!");
$title=$xml->title->$lang;
$t1=$xml->t1->$lang;
$t2=$xml->t2->$lang;
$t3=$xml->t3->$lang;
$t4=$xml->t4->$lang;
$t5=$xml->t5->$lang;
$t6=$xml->t6->$lang;
$t7=$xml->t7->$lang;
$t8=$xml->t8->$lang;
$t9=$xml->t9->$lang;
$t10=$xml->t10->$lang;
$t11=$xml->t11->$lang;
$t12=$xml->t12->$lang;
$t13=$xml->t13->$lang;
$t14=$xml->t14->$lang;
$t15=$xml->t15->$lang;
$t16=$xml->t16->$lang;
$t17=$xml->t17->$lang;
$t18=$xml->t18->$lang;
$t19=$xml->t19->$lang;
$t20=$xml->t20->$lang;
$t21=$xml->t21->$lang;
$t22=$xml->t22->$lang;
$t23=$xml->t23->$lang;
$t24=$xml->t24->$lang;
$t25=$xml->t25->$lang;
$t26=$xml->t26->$lang;
$t27=$xml->t27->$lang;
$t28=$xml->t28->$lang;
$t29=$xml->t29->$lang;
$t30=$xml->t30->$lang;
$t31=$xml->t31->$lang;
$t32=$xml->t32->$lang;
$t33=$xml->t33->$lang;
$t34=$xml->t34->$lang;
$t35=$xml->t35->$lang;
$t36=$xml->t36->$lang;
$t37=$xml->t37->$lang;
$t38=$xml->t38->$lang;
$t39=$xml->t39->$lang;
$t40=$xml->t40->$lang;
$t41=$xml->t41->$lang;
$t42=$xml->t42->$lang;
$t43=$xml->t43->$lang;
$t44=$xml->t44->$lang;
$t45=$xml->t45->$lang;
$t46=$xml->t46->$lang;
$t47=$xml->t47->$lang;
$t48=$xml->t48->$lang;
$t49=$xml->t49->$lang;
$t50=$xml->t50->$lang;
$t51=$xml->t51->$lang;
$t52=$xml->t52->$lang;
$t53=$xml->t53->$lang;
$t54=$xml->t54->$lang;
$t55=$xml->t55->$lang;
$t56=$xml->t56->$lang;
$t57=$xml->t57->$lang;
$t58=$xml->t58->$lang;
$t59=$xml->t59->$lang;
$t60=$xml->t60->$lang;
$t61=$xml->t61->$lang;
$t62=$xml->t62->$lang;
$t63=$xml->t63->$lang;
$t64=$xml->t64->$lang;
$t65=$xml->t65->$lang;
$t66=$xml->t66->$lang;
$t67=$xml->t67->$lang;
$t68=$xml->t68->$lang;
$t69=$xml->t69->$lang;
$t70=$xml->t70->$lang;
$t71=$xml->t71->$lang;
$t72=$xml->t72->$lang;
$t73=$xml->t73->$lang;
$t74=$xml->t74->$lang;
$t75=$xml->t75->$lang;
$t76=$xml->t76->$lang;
$t77=$xml->t77->$lang;
$t78=$xml->t78->$lang;
$t79=$xml->t79->$lang;
?>