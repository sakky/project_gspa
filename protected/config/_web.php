<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
		'name'=>'วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา',
                'homeUrl'=>array('/site'),
        )
);


?>