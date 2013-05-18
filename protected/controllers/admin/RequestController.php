<?php
class RequestController extends Controller
{
	/**
	 * @return array actions
	 */
	public function actions()
	{
		return array(
			'uploadFile'=>array(
				'class'=>'ext.actions.XHEditorUpload',
			),
		);
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(

		);
	}
}