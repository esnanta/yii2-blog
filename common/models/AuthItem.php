<?php

namespace common\models;

use Yii;
use \common\models\base\AuthItem as BaseAuthItem;

/**
 * This is the model class for table "tx_auth_item".
 */
class AuthItem extends BaseAuthItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64]
        ]);
    }
	
}
