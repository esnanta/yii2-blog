<?php

namespace common\models;

use Yii;
use \common\models\base\SocialAccount as BaseSocialAccount;

/**
 * This is the model class for table "tx_social_account".
 */
class SocialAccount extends BaseSocialAccount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'created_at'], 'integer'],
            [['provider', 'client_id'], 'required'],
            [['data'], 'string'],
            [['provider', 'client_id', 'email', 'username'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 32],
            [['provider', 'client_id'], 'unique', 'targetAttribute' => ['provider', 'client_id'], 'message' => 'The combination of Provider and Client ID has already been taken.'],
            [['code'], 'unique'],
            [['verlock'], 'default', 'value' => '0'],
            [['verlock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
