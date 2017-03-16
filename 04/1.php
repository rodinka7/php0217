<?php
header('Content-Type: text/html; charset=utf-8');

$xmlPath = './data.xml';
$xml = simplexml_load_file($xmlPath);
$attr = $xml->attributes();

$dom = new DOMDocument('1.0', 'UTF-8');
$purchase = $dom->createElement('div', 'PurchaseOrderNumber: '.$attr['PurchaseOrderNumber']);
$purchaseDate = $dom->createElement('div', 'OrderDate: '.$attr['OrderDate']);
$purchase->appendChild($purchaseDate);

foreach ($xml as $key=>$value) {
	
	if ($value->attributes()) {
		$attrs = $value->attributes();
		$deliveryType = $dom->createElement('div', 'Delivery type: '.$attrs);
		$purchase->appendChild($deliveryType);
	}

	switch ($key) {
	case 'Address':
		$address = $dom->createElement('div', 'Address: ');
		$name = $dom->createElement('div', 'Name: '.$value->Name);
		$street = $dom->createElement('div', 'Street: '.$value->Street);
		$city = $dom->createElement('div', 'City: '.$value->City);
		$state = $dom->createElement('div', 'State: '.$value->State);
		$zip = $dom->createElement('div', 'Zip: '.$value->Zip);
		$country = $dom->createElement('div', 'Country: '.$value->Country);

		$address->appendChild($name);
		$address->appendChild($street);
		$address->appendChild($city);
		$address->appendChild($state);
		$address->appendChild($zip);
		$address->appendChild($country);
		
		$purchase->appendChild($address);

	case 'DeliveryNotes':
		$notes = $dom->createElement('div', 'DeliveryNotes: '.$value);

		$purchase->appendChild($notes);

	case 'Items':
		
		foreach ($value->Item as $data) {
			$attr = $data->attributes();

			$good = $dom->createElement('div', 'PartNumber: '.$attr);
			$product = $dom->createElement('div', 'ProductName: '.$data->ProductName);
			$quantity = $dom->createElement('div', 'Quantity: '.$data->Quantity);
			$price = $dom->createElement('div', 'USPrice: '.$data->USPrice);
			
			$good->appendChild($product);
			$good->appendChild($quantity);
			$good->appendChild($price);

			if (!empty($data->Comment)) {
				$comment = $dom->createElement('div', 'Comment: '.$data->Comment);
				$good->appendChild($comment);
			} elseif (!empty($data->ShipDate)) {
				$date = $dom->createElement('div', 'ShipDate: '.$data->ShipDate);
				$good->appendChild($date);
			}

			$purchase->appendChild($good);			
		}	
	}
}

$dom->appendChild($purchase);

echo '<pre>';
echo $dom->saveHTML();

?>