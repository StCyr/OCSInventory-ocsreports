<?php
print_item_header('sd_printers');
	if (!isset($protectedPost['SHOW']))
		$protectedPost['SHOW'] = 'NOSHOW';
	$form_name="sd_printers";
	$table_name=$form_name;
	echo "<form name='".$form_name."' id='".$form_name."' method='POST' action=''>";
	$list_fields=array('SNMP_ID' => 'SNMP_ID',
					   'PRINTER_NAME' => 'NAME',
					   'SERIALNUMBER'=>'SERIALNUMBER',
					   'COUNTER'=>'COUNTER');
	//$list_fields['SUP']= 'ID';
	$list_col_cant_del=$list_fields;
	$default_fields= $list_fields;
	$sql=prepare_sql_tab($list_fields);
	$sql['SQL']  = $sql['SQL']." FROM %s WHERE (snmp_id=%s)";
	$sql['ARG'][]='snmp_printers';
	$sql['ARG'][]=$systemid;
	$tab_options['ARG_SQL']=$sql['ARG'];
	tab_req($table_name,$list_fields,$default_fields,$list_col_cant_del,$sql['SQL'],$form_name,80,$tab_options);
	echo "</form>";


?>