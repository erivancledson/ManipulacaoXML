<?php
//transformando o array em xml
//recede data que é o nosso array, xml que é um objeto simple xml
function array_to_xml( $data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = 'item'.$key;
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
        	if( is_numeric($key) ){
                $key = 'item'.$key;
            }
            $xml_data->addChild($key, htmlspecialchars($value));
        }
     }
}

$data = array(
	"nome" => "Bonieky",
	"sobrenome" => "Lacerda",
	"idade" => 90,
	"caracteristicas" => array(
		"amigo",
		"fiel",
		"companheiro",
		"legal"
	)
);

$xml_data = new SimpleXMLElement('<data/>');

array_to_xml($data, $xml_data);

$result = $xml_data->asXML();
echo $result;
?>