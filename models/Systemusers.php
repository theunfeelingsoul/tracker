<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "system_users".
 *
 * @property int $id
 * @property string $full_name
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $email
 * @property string $hash
 * @property string $group
 */
class Systemusers extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'username', 'password', 'auth_key', 'email', 'hash','group'], 'string', 'max' => 255],
            [['full_name', 'username', 'password', 'email'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'hash' => 'Hash',
            'group' => 'Group',
        ];
    }


    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return static::findOne(['access_token' => $token]);
        throw new \yii\base\NotSupportedException();
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        throw new \yii\base\NotSupportedException();
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
         throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }

    public static function findByUserId($id){
        return self::findOne(['id'=>$id]);
    }

    public function validatePassword($password,$hash){
        // return $this->password ===$password;
        // check the hased password to the provided password
        if (Yii::$app->getSecurity()->validatePassword($password, $hash)) {
            // all good, logging user in
            return true;
        } else {
            // wrong password
            return false;
        }
    }


} // end class
