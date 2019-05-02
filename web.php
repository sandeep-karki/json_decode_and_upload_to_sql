<?php



Route::get('/', function () {
	$path = public_path() . "/resturants.json";
	//get json data
	$json = file_get_contents($path);
	if ($json != null) {
		$decoded=json_decode($json,true);
		if (is_array($decoded["vendors"])) {
			foreach ($decoded["vendors"] as $vendor) {
				$resturant = new Resturant();
				$resturant->id = $vendor['Id'];
				$resturant->image = $vendor['Image'];
				$resturant->logo = $vendor['Logo'];
				$resturant->tag = $vendor['Tags'];
				$resturant->name = $vendor['Name'];
				$resturant->latitude = $vendor['LocationLat'];
				$resturant->longitude = $vendor['LocationLng'];

				$resturant -> save();

			}
		}
	}
});


