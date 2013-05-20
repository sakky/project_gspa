<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
		'name'=>'วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา',
                'language' =>'th',
                'homeUrl'=>array('/site'),
                    	'components'=>array(
			#...
                        # More setting http://www.yiiframework.com/doc/guide/1.1/en/topics.url
                        'urlManager'=>array(
                            'class'=>'ext.yii-multilanguage.MLUrlManager',
                            'urlFormat'=>'path',
                            'languages'=>array(
                                #...
                                'th',
                                'en',

                                #...
                            ),
                            'rules'=>array(
                                # ... more user rules

                                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

                                '<module:\w+>/<controller:\w+>/<id:\d+>/<action:\w+>'=>'<module>/<controller>/<action>',
                                '<module:\w+>/<controller:\w+>/<id:\d+>'=>'<module>/<controller>/view',
                                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                                '<module:\w+>/<controller:\w+>'=>'<module>/<controller>',
                                '<module:\w+>'=>'<module>',

                                # ...
                            ),
                        ),
                        #...
			

		),
        )
);


?>