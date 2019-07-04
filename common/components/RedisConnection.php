<?php

namespace common\components;


use yii\base\Component;

/**
 * The redis connection class is used to establish a connection to a [redis](http://redis.io/) server.
 *
 * By default it assumes there is a redis server running on localhost at port 6379 and uses the database number 0.
 *
 * It is possible to connect to a redis server using [[hostname]] and [[port]] or using a [[unixSocket]].
 *
 * It also supports [the AUTH command](http://redis.io/commands/auth) of redis.
 * When the server needs authentication, you can set the [[password]] property to
 * authenticate with the server after connect.
 * @property \Redis() $_rredis
 * @property \Redis() $_wredis
 * */
class RedisConnection extends Component
{
    /**
     * @var string the hostname or ip address to use for connecting to the redis server. Defaults to 'localhost'.
     * If [[unixSocket]] is specified, hostname and port will be ignored.
     */
    public $hostname;
    /**
     * @var integer the port to use for connecting to the redis server. Default port is 6379.
     * If [[unixSocket]] is specified, hostname and port will be ignored.
     */
    public $port;
    /**
     * @var string the unix socket path (e.g. `/var/run/redis/redis.sock`) to use for connecting to the redis server.
     * This can be used instead of [[hostname]] and [[port]] to connect to the server using a unix socket.
     * If a unix socket path is specified, [[hostname]] and [[port]] will be ignored.
     */
    public $unixSocket;
    /**
     * @var string the password for establishing DB connection. Defaults to null meaning no AUTH command is send.
     * See http://redis.io/commands/auth
     */
    public $password;
    /**
     * @var integer the redis database to use. This is an integer value starting from 0. Defaults to 0.
     */
    public $database = 0;
    /**
     * @var float value in seconds (optional, default is 0.0 meaning unlimited)
     */
    public $connectionTimeout = 0.0;

    /**
     * @var string Prefix key Redis
     * Multiple project in server
     */
    public $keyPrefix;

    /**
     * @var array IP:Port read server
     */
    public $readServers = [
        [
            'ip' => '127.0.0.1',
            'port' => 6379,
            'password' => ''
        ],
    ];

    /**
     * @var array IP:Port  server ghi
     */
    public $writeServer = [
        'ip' => '127.0.0.1',
        'port' => 6379,
        'password' => ''
    ];

    /**
     * @var array IP:Port  server backup
     */
    public $backupServer = [
        'ip' => '127.0.0.1',
        'port' => 6379
    ];

    //Read redis-instance
    protected $_rredis;

    //Write redis-instance
    protected $_wredis;

    public function init()
    {
        $this->_rredis = new \Redis();
        //Set Data
        $this->readServers = [
            [
                'ip' => $this->hostname,
                'port' => $this->port,
                'password' => $this->password
            ],
        ];
        $this->writeServer =
            [
                'ip' => $this->hostname,
                'port' => $this->port,
                'password' => $this->password
            ];

        // Retry conect
        $this->_rredis = new \Redis();
        if (!$this->_rredis->pconnect($this->readServers[0]['ip'], $this->readServers[0]['port'])) {
            if (!$this->_rredis->pconnect($this->readServers[0]['ip'], $this->readServers[0]['port'])) {
                if (!$this->_rredis->pconnect($this->readServers[1]['ip'], $this->readServers[1]['port'])) {
                    $this->_rredis->pconnect($this->readServers[2]['ip'], $this->readServers[2]['port']);
                    if ($this->readServers[2]['password'] != '') {
                        $this->_rredis->auth($this->readServers[2]['password']);
                    }
                } else {
                    if ($this->readServers[1]['password'] != '') {
                        $this->_rredis->auth($this->readServers[1]['password']);
                    }
                }
            } else {
                if ($this->readServers[0]['password'] != '') {
                    $this->_rredis->auth($this->readServers[0]['password']);
                }
            }
        } else {
            if ($this->readServers[0]['password'] != '') {
                $this->_rredis->auth($this->readServers[0]['password']);
            }
        }
        $this->_wredis = new \Redis();
        if (!$this->_wredis->pconnect($this->writeServer['ip'], $this->writeServer['port'])) {
            $this->_wredis->pconnect($this->backupServer['ip'], $this->backupServer['port']);
            if ($this->backupServer['password'] != '') {
                $this->_wredis->auth($this->backupServer['password']);
            }
        } else {
            if ($this->writeServer['password'] != '') {
                $this->_wredis->auth($this->writeServer['password']);
            }
        }
    }

    /**
     * Get the value of key
     * @param string $key
     */
    public function get($key)
    {
        return $this->_rredis->get($this->keyPrefix . $key);
    }

    /**
     * Set key to hold the string value
     * @param string $key
     */
    public function set($key, $value, $preserve = false)
    {
        if ($preserve) {
            return $this->_wredis->setnx($this->keyPrefix . $key, $value);
        } else {
            return $this->_wredis->set($this->keyPrefix . $key, $value);
        }
    }

    public function setExp($key, $value, $duration)
    {
        return $this->_wredis->set($this->keyPrefix . $key, $value, $duration);
    }

    public function expire($key, $seconds)
    {
        return $this->_wredis->expire($this->keyPrefix . $key, $seconds);
    }

    public function expireAt($key, $seconds)
    {
        return $this->_wredis->expireAt($this->keyPrefix . $key, $seconds);
    }

    public function ttl($key)
    {
        return $this->_rredis->ttl($this->keyPrefix . $key);
    }

    public function setex($key, $time, $value)
    {
        return $this->_wredis->setex($key, $time, $value);
    }

    public function setBit($key, $offset, $value)
    {
        return $this->_wredis->setBit($key, $offset, $value);
    }

    public function bitcount($key)
    {
        return $this->_wredis->bitcount($key);
    }

    public function rename($key, $newkey)
    {
        return $this->_wredis->rename($key, $newkey);
    }

    public function exist($data)
    {
        return $this->_rredis->exists($data);
    }

    public function incr($data, $amount = 1)
    {
        return $this->_wredis->incr($data, $amount);
    }

    public function mset($data, $preserve = false)
    {
        return $this->_wredis->mset($data);
    }

    public function sadd($set, $member)
    {
        return $this->_wredis->sAdd($set, $member);
    }

    public function sismember($set, $member)
    {
        return $this->_rredis->sContains($set, $member);
    }

    public function srem($set, $member)
    {
        return $this->_wredis->sRemove($set, $member);
    }

    public function append($key, $value)
    {
        return $this->_wredis->append($key, $value);
    }

    public function lpush($key, $string)
    {
        return $this->_wredis->lPush($this->keyPrefix . $key, $string);
    }

    public function rpush($key, $string)
    {
        return $this->_wredis->rPush($this->keyPrefix . $key, $string);
    }

    public function lpop($key)
    {
        return $this->_wredis->lPop($this->keyPrefix . $key);
    }

    public function lrem($key, $count, $value)
    {
        return $this->_wredis->lRemove($this->keyPrefix . $key, $value, $count);
    }

    public function del($key)
    {
        return $this->_wredis->delete($this->keyPrefix . $key);
    }

    public function mget($data, $preserve = false)
    {
        return $this->_rredis->getMultiple($data);
    }

    public function lrange($name, $start, $end)
    {
        return $this->_rredis->lGetRange($this->keyPrefix . $name, $start, $end);
    }

    public function llen($name)
    {
        return $this->_rredis->lSize($this->keyPrefix . $name);
    }

    public function scard($key)
    {
        return $this->_rredis->sSize($this->keyPrefix . $key);
    }

    public function srandmember($key)
    {
        return $this->_rredis->sRandMember($this->keyPrefix . $key);
    }

    public function spop($key)
    {
        return $this->_wredis->sPop($this->keyPrefix . $key);
    }

    public function keys($pattern)
    {
        return $this->_rredis->getKeys($pattern);
    }

    public function smembers($key)
    {
        return $this->_rredis->sMembers($this->keyPrefix . $key);
    }

    public function lset($key, $index, $value)
    {
        return $this->_wredis->lSet($this->keyPrefix . $key, $index, $value);
    }

    public function lindex($key, $index)
    {
        return $this->_rredis->lIndex($this->keyPrefix . $key, $index);
    }

    public function zadd($key, $score, $value)
    {
        return $this->_wredis->zAdd($this->keyPrefix . $key, $score, $value);
    }

    public function zcard($key)
    {
        return $this->_rredis->zSize($this->keyPrefix . $key);
    }

    public function zcount($key, $start, $stop)
    {
        return $this->_rredis->zCount($this->keyPrefix . $key, $start, $stop);
    }

    public function zrange($key, $start, $stop)
    {
        return $this->_rredis->zRange($this->keyPrefix . $key, $start, $stop);
    }

    public function zrevrange($key, $start, $stop, $withscores = false)
    {
        return $this->_rredis->zRevRange($this->keyPrefix . $key, $start, $stop, $withscores);
    }

    public function zrem($key, $value)
    {
        return $this->_wredis->zDelete($this->keyPrefix . $key, $value);
    }

    public function zremrangebyrank($key, $start, $stop)
    {
        return $this->_wredis->zRemRangeByRank($this->keyPrefix . $key, $start, $stop);
    }

    public function zremrangebyscore($key, $min, $max)
    {
        return $this->_wredis->zRemRangeByScore($this->keyPrefix . $key, $min, $max);
    }

    public function zscore($key, $value)
    {
        return $this->_rredis->zScore($this->keyPrefix . $key, $value);
    }

    public function sunionstore($destination, $keys)
    {
        $arr_key = array_merge(( array )$destination, $keys);

        return call_user_func_array(array($this->_wredis, "sUnionStore"), $arr_key);
    }

    public function sunion($keys)
    {
        return call_user_func_array(array($this->_rredis, "sUnion"), $keys);
    }

    public function sinter($keys)
    {
        return call_user_func_array(array($this->_rredis, "sInter"), $keys);
    }

    public function sinterstore($destination, $keys)
    {
        $arr_key = array_merge(( array )$destination, $keys);

        return call_user_func_array(array($this->_wredis, "sInterStore"), $arr_key);
    }

    public function ltrim($key, $start, $stop)
    {
        return $this->_wredis->lTrim($this->keyPrefix . $key, $start, $stop);
    }

    public function zrangebyscore($key, $min, $max, $offset, $count, $withscore = false)
    {
        return $this->_rredis->zRangeByScore($this->keyPrefix . $key, $min, $max, array('withscores' => $withscore, 'limit' => array($offset, $count)));
    }

    public function zrevrangebyscore($key, $max, $min, $offset, $count, $withscore = false)
    {
        return $this->_rredis->zRevRangeByScore($this->keyPrefix . $key, $max, $min, array('withscores' => $withscore, 'limit' => array($offset, $count)));
    }

    public function info()
    {
        return $this->_rredis->info();
    }

    public function zrevrank($key, $value)
    {
        return $this->_rredis->zRevRank($this->keyPrefix . $key, $value);
    }

    public function zrank($key, $value)
    {
        return $this->_rredis->zRank($this->keyPrefix . $key, $value);
    }

    public function hkeys($key)
    {
        return $this->_rredis->hKeys($this->keyPrefix . $key);
    }

    public function hset($key, $field, $value)
    {
        return $this->_wredis->hSet($this->keyPrefix . $key, $field, $value);
    }

    public function hget($key, $field)
    {
        return $this->_rredis->hGet($this->keyPrefix . $key, $field);
    }

    public function hexists($key, $field)
    {
        return $this->_rredis->hExists($this->keyPrefix . $key, $field);
    }

    public function hdel($key, $field)
    {
        return $this->_wredis->hDel($this->keyPrefix . $key, $field);
    }

    public function hgetall($key)
    {
        return $this->_rredis->hGetAll($this->keyPrefix . $key);
    }

    public function hvals($key)
    {
        return $this->_rredis->hVals($this->keyPrefix . $key);
    }

    public function hlen($key)
    {
        return $this->_rredis->hLen($this->keyPrefix . $key);
    }

    public function flushAll()
    {
        return $this->_wredis->flushAll();
    }

    public function flushDb()
    {
        return $this->_wredis->flushDb();
    }

    //Transations
    public function watch($key)
    {
        return $this->_wredis->watch($this->keyPrefix . $key);
    }

    public function unwatch($key)
    {
        return $this->_wredis->unWatch($this->keyPrefix . $key);
    }

    public function multi()
    {
        return $this->_wredis->multi();
    }

    public function exec()
    {
        return $this->_wredis->exec();
    }
}
