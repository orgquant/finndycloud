<?php
namespace app\admin\model;
use think\Model;


class Users extends  Model
{
    /**获取用户信息
     * @param array $where 条件
     * @return array|bool|false|\PDOStatement|string|Model
     */
    public function getUserinfo(array $where){
        if(!is_array($where)) return false;
        return  $this->where($where)->find();
    }

    /**更新用户的某一个字段$$
     * @param array $where
     * @param $key
     * @param $value
     * @return int
     */
    public function setUserValue(array $where,$key,$value){
        return  $this->where($where)->setField($key,$value);
    }

    /** 添加用户信息
     * @param array $data
     * @return int|string
     */
    public function insertUserinfo(array $data){
        $data['create_time'] = time();
        return $this->insert($data);
    }

    /**更新用户信息的多个字段
     * @param array $where
     * @param array $data
     * @return $this
     */
    public function setUserValues(array $where,array $data){
        return  $this->where($where)->update($data);
    }

    /**获取用户列表
     * @param array $where
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getUsers(array $where=[]){
        return $this->where($where)->select();

    }
}