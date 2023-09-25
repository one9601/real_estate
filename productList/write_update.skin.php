<?php
$wr_11_chk = sql_fetch("SHOW COLUMNS FROM `$write_table`  WHERE `Field` = 'wr_11'");
if($wr_11_chk['Field'] == "")		sql_query("ALTER TABLE `$write_table` ADD `wr_11` VARCHAR( 255 ) NOT NULL AFTER `wr_10` ");

$wr_12_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_12'");
if($wr_12_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_12` VARCHAR( 255 ) NOT NULL AFTER `wr_11` ");

$wr_13_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_13'");
if($wr_13_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_13` VARCHAR( 255 ) NOT NULL AFTER `wr_12` ");

$wr_14_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_14'");
if($wr_14_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_14` VARCHAR( 255 ) NOT NULL AFTER `wr_13` ");

$wr_15_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_15'");
if($wr_15_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_15` VARCHAR( 255 ) NOT NULL AFTER `wr_14` ");

$wr_16_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_16'");
if($wr_16_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_16` VARCHAR( 255 ) NOT NULL AFTER `wr_15` ");

$wr_17_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_17'");
if($wr_17_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_17` VARCHAR( 255 ) NOT NULL AFTER `wr_16` ");

$wr_18_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_18'");
if($wr_18_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_18` VARCHAR( 255 ) NOT NULL AFTER `wr_17` ");

$wr_19_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_19'");
if($wr_19_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_19` VARCHAR( 255 ) NOT NULL AFTER `wr_18` ");

$wr_20_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_20'");
if($wr_20_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_20` VARCHAR( 255 ) NOT NULL AFTER `wr_19` ");

$wr_21_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_21'");
if($wr_21_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_21` VARCHAR( 255 ) NOT NULL AFTER `wr_20` ");

$wr_22_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_22'");
if($wr_22_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_22` VARCHAR( 255 ) NOT NULL AFTER `wr_21` ");

$wr_23_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_23'");
if($wr_23_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_23` VARCHAR( 255 ) NOT NULL AFTER `wr_22` ");

$wr_24_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_24'");
if($wr_24_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_24` VARCHAR( 255 ) NOT NULL AFTER `wr_23` ");

$wr_25_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_25'");
if($wr_25_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_25` VARCHAR( 255 ) NOT NULL AFTER `wr_24` ");

$wr_26_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_26'");
if($wr_26_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_26` VARCHAR( 255 ) NOT NULL AFTER `wr_25` ");

$wr_27_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_27'");
if($wr_27_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_27` VARCHAR( 255 ) NOT NULL AFTER `wr_26` ");

$wr_28_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_28'");
if($wr_28_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_28` VARCHAR( 255 ) NOT NULL AFTER `wr_27` ");

$wr_29_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_29'");
if($wr_29_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_29` VARCHAR( 255 ) NOT NULL AFTER `wr_28` ");

$wr_30_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_30'");
if($wr_30_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_30` VARCHAR( 255 ) NOT NULL AFTER `wr_29` ");

$wr_31_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_31'");
if($wr_31_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_31` VARCHAR( 255 ) NOT NULL AFTER `wr_30` ");

$wr_32_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_32'");
if($wr_32_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_32` VARCHAR( 255 ) NOT NULL AFTER `wr_31` ");

$wr_33_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_33'");
if($wr_33_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_33` VARCHAR( 255 ) NOT NULL AFTER `wr_32` ");

$wr_34_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_34'");
if($wr_34_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_34` VARCHAR( 255 ) NOT NULL AFTER `wr_33` ");

$wr_35_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_35'");
if($wr_35_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_35` VARCHAR( 255 ) NOT NULL AFTER `wr_34` ");

$wr_36_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_36'");
if($wr_36_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_36` VARCHAR( 255 ) NOT NULL AFTER `wr_35` ");

$wr_37_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_37'");
if($wr_37_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_37` VARCHAR( 255 ) NOT NULL AFTER `wr_36` ");

$wr_38_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_38'");
if($wr_38_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_38` VARCHAR( 255 ) NOT NULL AFTER `wr_37` ");

$wr_39_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_39'");
if($wr_39_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_39` VARCHAR( 255 ) NOT NULL AFTER `wr_38` ");

$wr_40_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_40'");
if($wr_40_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_40` VARCHAR( 255 ) NOT NULL AFTER `wr_39` ");

$wr_41_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_41'");
if($wr_41_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_41` VARCHAR( 255 ) NOT NULL AFTER `wr_40` ");

$wr_42_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_42'");
if($wr_42_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_42` VARCHAR( 255 ) NOT NULL AFTER `wr_41` ");

$wr_43_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_43'");
if($wr_43_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_43` VARCHAR( 255 ) NOT NULL AFTER `wr_42` ");

$wr_44_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_44'");
if($wr_44_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_44` VARCHAR( 255 ) NOT NULL AFTER `wr_43` ");

$wr_45_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_45'");
if($wr_45_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_45` VARCHAR( 255 ) NOT NULL AFTER `wr_44` ");

$wr_46_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_46'");
if($wr_46_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_46` VARCHAR( 255 ) NOT NULL AFTER `wr_45` ");

$wr_47_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_47'");
if($wr_47_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_47` VARCHAR( 255 ) NOT NULL AFTER `wr_46` ");

$wr_48_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_48'");
if($wr_48_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_48` VARCHAR( 255 ) NOT NULL AFTER `wr_47` ");

$wr_49_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_49'");
if($wr_49_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_49` VARCHAR( 255 ) NOT NULL AFTER `wr_48` ");

$wr_50_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_50'");
if($wr_50_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_50` VARCHAR( 255 ) NOT NULL AFTER `wr_49` ");

$wr_51_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_51'");
if($wr_51_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_51` VARCHAR( 255 ) NOT NULL AFTER `wr_50` ");

$wr_52_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_52'");
if($wr_52_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_52` VARCHAR( 255 ) NOT NULL AFTER `wr_51` ");

$wr_53_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_53'");
if($wr_53_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_53` VARCHAR( 255 ) NOT NULL AFTER `wr_52` ");

$wr_54_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_54'");
if($wr_54_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_54` VARCHAR( 255 ) NOT NULL AFTER `wr_53` ");

$wr_55_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_55'");
if($wr_55_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_55` VARCHAR( 255 ) NOT NULL AFTER `wr_54` ");

$wr_56_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_56'");
if($wr_56_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_56` VARCHAR( 255 ) NOT NULL AFTER `wr_55` ");

$wr_57_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_57'");
if($wr_57_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_57` VARCHAR( 255 ) NOT NULL AFTER `wr_56` ");

$wr_58_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_58'");
if($wr_58_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_58` VARCHAR( 255 ) NOT NULL AFTER `wr_57` ");

$wr_59_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_59'");
if($wr_59_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_59` VARCHAR( 255 ) NOT NULL AFTER `wr_58` ");

$wr_60_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_60'");
if($wr_60_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_60` VARCHAR( 255 ) NOT NULL AFTER `wr_59` ");

$wr_61_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_61'");
if($wr_61_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_61` VARCHAR( 255 ) NOT NULL AFTER `wr_60` ");

$wr_62_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_62'");
if($wr_62_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_62` VARCHAR( 255 ) NOT NULL AFTER `wr_61` ");

$wr_63_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_63'");
if($wr_63_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_63` VARCHAR( 255 ) NOT NULL AFTER `wr_62` ");

$wr_64_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_64'");
if($wr_64_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_64` VARCHAR( 255 ) NOT NULL AFTER `wr_63` ");

$wr_65_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_65'");
if($wr_65_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_65` VARCHAR( 255 ) NOT NULL AFTER `wr_64` ");

$wr_66_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_66'");
if($wr_66_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_66` VARCHAR( 255 ) NOT NULL AFTER `wr_65` ");

$wr_67_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_67'");
if($wr_67_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_67` VARCHAR( 255 ) NOT NULL AFTER `wr_66` ");

$wr_68_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_68'");
if($wr_68_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_68` VARCHAR( 255 ) NOT NULL AFTER `wr_67` ");

$wr_69_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_69'");
if($wr_69_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_69` VARCHAR( 255 ) NOT NULL AFTER `wr_68` ");

$wr_70_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_70'");
if($wr_70_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_70` VARCHAR( 255 ) NOT NULL AFTER `wr_69` ");

$wr_71_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_71'");
if($wr_71_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_71` VARCHAR( 255 ) NOT NULL AFTER `wr_70` ");

$wr_72_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_72'");
if($wr_72_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_72` VARCHAR( 255 ) NOT NULL AFTER `wr_71` ");

$wr_73_chk = sql_fetch("SHOW COLUMNS FROM $write_table  WHERE `Field` = 'wr_73'");
if($wr_73_chk['Field'] == "")		sql_query("ALTER TABLE $write_table ADD `wr_73` VARCHAR( 255 ) NOT NULL AFTER `wr_72` ");




// $wr_1 = $wr_1_0;
// $wr_2 = $wr_2_0;
// $wr_3 = $wr_3_0;
// $wr_4 = $wr_4_0;
// $wr_5 = $wr_5_0;
// $wr_6 = $wr_6_0;
// $wr_7 = $wr_7_0;
// $wr_8 = $wr_8_0;
// $wr_9 = $wr_9_0;
// $wr_10 = $wr_10_0;
// $wr_10 = $wr_10_0.",".$wr_10_1.",".$wr_10_2.",".$wr_10_3.",".$wr_10_4;


$sql =" update $write_table 
			set 


				wr_11 = '$wr_11',
				wr_12 = '$wr_12',
				wr_13 = '$wr_13',
				wr_14 = '$wr_14',
				wr_15 = '$wr_15',
				wr_16 = '$wr_16',
				wr_17 = '$wr_17',
				wr_18 = '$wr_18',
				wr_19 = '$wr_19',
				wr_20 = '$wr_20',
				wr_21 = '$wr_21',
				wr_22 = '$wr_22',
				wr_23 = '$wr_23',
				wr_24 = '$wr_24',
				wr_25 = '$wr_25',
				wr_26 = '$wr_26',
				wr_27 = '$wr_27',
				wr_28 = '$wr_28',
				wr_29 = '$wr_29',
				wr_30 = '$wr_30',
				wr_31 = '$wr_31',
				wr_32 = '$wr_32',
				wr_33 = '$wr_33',
				wr_34 = '$wr_34',
				wr_35 = '$wr_35',
				wr_36 = '$wr_36',
				wr_37 = '$wr_37',
				wr_38 = '$wr_38',
				wr_39 = '$wr_39',
				wr_40 = '$wr_40',
				wr_41 = '$wr_41',
				wr_42 = '$wr_42',
				wr_43 = '$wr_43',
				wr_44 = '$wr_44',
				wr_45 = '$wr_45',
				wr_46 = '$wr_46',
				wr_47 = '$wr_47',
				wr_48 = '$wr_48',
				wr_49 = '$wr_49',
				wr_50 = '$wr_50',
				wr_51 = '$wr_51',
				wr_52 = '$wr_52',
				wr_53 = '$wr_53',
				wr_54 = '$wr_54',
				wr_55 = '$wr_55',
				wr_56 = '$wr_56',
				wr_57 = '$wr_57',
				wr_58 = '$wr_58',
				wr_59 = '$wr_59',
				wr_60 = '$wr_60',
				wr_61 = '$wr_61',
				wr_62 = '$wr_62',
				wr_63 = '$wr_63',
				wr_64 = '$wr_64',
				wr_65 = '$wr_65',
				wr_66 = '$wr_66',
				wr_67 = '$wr_67',
				wr_68 = '$wr_68',
				wr_69 = '$wr_69',
				wr_70 = '$wr_70',
				wr_71 = '$wr_71',
				wr_72 = '$wr_72',
				wr_73 = '$wr_73'



			where wr_id = '$wr_id' 
";

sql_query($sql);

?>