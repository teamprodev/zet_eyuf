<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */

use BotMan\BotMan\Cache\RedisCache;
use yii\caching\ApcCache;
use yii\caching\ArrayCache;
use yii\caching\FileCache;
use yii\helpers\BaseArrayHelper;
use yii\redis\Cache;
use zetsoft\system\actives\ZConnection;
use zetsoft\system\helpers\ZArrayHelper;

$duration = 24 * 60 * 60;


$hostRedis = $boot->ipRedis();


$caches = [
    'components' => [
        'file' => [
            'class' => FileCache::class,
            'cacheFileSuffix' => 'AsrorZ',
            'cachePath' => $boot->folderCaching,
            'defaultDuration' => $duration,
            'dirMode' => 0755,
            'directoryLevel' => 2,
            'fileMode' => null,
            'gcProbability' => 100,
//            'serializer' => true,
            'keyPrefix' => 'AZ',
        ],

        'redis' => [
            'class' => 'yii\redis\Cache',
            'keyPrefix' => App . '_',
            'enableReplicas' => false,
            'defaultDuration' => $duration,
            'forceClusterMode' => false,
//            'serializer' => null,
            'redis' => [
                'hostname' => $hostRedis,
                'port' => 6379,
                'database' => 0,
            ],
        ],
        'array' => [
            'class' => ArrayCache::class,
            'keyPrefix' => App . '_',
            'defaultDuration' => $duration,
            'serializer' => false,
        ],

        'rediscon' => [
            'class' => 'yii\redis\Connection',
            'hostname' => $hostRedis,
            'password' => '',
            'port' => 6379,
            'database' => 1,
            'connectionTimeout' => 60,
            'dataTimeout' => 60,
            'redirectConnectionString' => null,
            'retries' => 2,
            'retryInterval' => 0,
            'socketClientFlags' => STREAM_CLIENT_CONNECT,
            'unixSocket' => null,
            'redisCommands' => [
                'APPEND', // Append a value to a key
                'AUTH', // Authenticate to the server
                'BGREWRITEAOF', // Asynchronously rewrite the append-only file
                'BGSAVE', // Asynchronously save the dataset to disk
                'BITCOUNT', // Count set bits in a string
                'BITFIELD', // Perform arbitrary bitfield integer operations on strings
                'BITOP', // Perform bitwise operations between strings
                'BITPOS', // Find first bit set or clear in a string
                'BLPOP', // Remove and get the first element in a list, or block until one is available
                'BRPOP', // Remove and get the last element in a list, or block until one is available
                'BRPOPLPUSH', // Pop a value from a list, push it to another list and return it; or block until one is available
                'CLIENT KILL', // Kill the connection of a client
                'CLIENT LIST', // Get the list of client connections
                'CLIENT GETNAME', // Get the current connection name
                'CLIENT PAUSE', // Stop processing commands from clients for some time
                'CLIENT REPLY', // Instruct the server whether to reply to commands
                'CLIENT SETNAME', // Set the current connection name
                'CLUSTER ADDSLOTS', // Assign new hash slots to receiving node
                'CLUSTER COUNTKEYSINSLOT', // Return the number of local keys in the specified hash slot
                'CLUSTER DELSLOTS', // Set hash slots as unbound in receiving node
                'CLUSTER FAILOVER', // Forces a slave to perform a manual failover of its master.
                'CLUSTER FORGET', // Remove a node from the nodes table
                'CLUSTER GETKEYSINSLOT', // Return local key nameOn in the specified hash slot
                'CLUSTER INFO', // Provides info about Redis Cluster node state
                'CLUSTER KEYSLOT', // Returns the hash slot of the specified key
                'CLUSTER MEET', // Force a node cluster to handshake with another node
                'CLUSTER NODES', // Get Cluster config for the node
                'CLUSTER REPLICATE', // Reconfigure a node as a slave of the specified master node
                'CLUSTER RESET', // Reset a Redis Cluster node
                'CLUSTER SAVECONFIG', // Forces the node to save cluster state on disk
                'CLUSTER SETSLOT', // Bind a hash slot to a specific node
                'CLUSTER SLAVES', // List slave nodes of the specified master node
                'CLUSTER SLOTS', // Get array of Cluster slot to node mappings
                'COMMAND', // Get array of Redis command details
                'COMMAND COUNT', // Get total number of Redis commands
                'COMMAND GETKEYS', // Extract keys given a full Redis command
                'COMMAND INFO', // Get array of specific Redis command details
                'CONFIG GET', // Get the value of a configuration parameter
                'CONFIG REWRITE', // Rewrite the configuration file with the in memory configuration
                'CONFIG SET', // Set a configuration parameter to the given value
                'CONFIG RESETSTAT', // Reset the stats returned by INFO
                'DBSIZE', // Return the number of keys in the selected database
                'DEBUG OBJECT', // Get debugging information about a key
                'DEBUG SEGFAULT', // Make the server crash
                'DECR', // Decrement the integer value of a key by one
                'DECRBY', // Decrement the integer value of a key by the given number
                'DEL', // Delete a key
                'DISCARD', // Discard all commands issued after MULTI
                'DUMP', // Return a serialized version of the value stored at the specified key.
                'ECHO', // Echo the given string
                'EVAL', // Execute a Lua script server side
                'EVALSHA', // Execute a Lua script server side
                'EXEC', // Execute all commands issued after MULTI
                'EXISTS', // Determine if a key exists
                'EXPIRE', // Set a key's time to live in seconds
                'EXPIREAT', // Set the expiration for a key as a UNIX timestamp
                'FLUSHALL', // Remove all keys from all databases
                'FLUSHDB', // Remove all keys from the current database
                'GEOADD', // Add one or more geospatial items in the geospatial index represented using a sorted set
                'GEOHASH', // Returns members of a geospatial index as standard geohash strings
                'GEOPOS', // Returns longitude and latitude of members of a geospatial index
                'GEODIST', // Returns the distance between two members of a geospatial index
                'GEORADIUS', // Query a sorted set representing a geospatial index to fetch members matching a given maximum distance from a point
                'GEORADIUSBYMEMBER', // Query a sorted set representing a geospatial index to fetch members matching a given maximum distance from a member
                'GET', // Get the value of a key
                'GETBIT', // Returns the bit value at offset in the string value stored at key
                'GETRANGE', // Get a substring of the string stored at a key
                'GETSET', // Set the string value of a key and return its old value
                'HDEL', // Delete one or more hash fields
                'HEXISTS', // Determine if a hash field exists
                'HGET', // Get the value of a hash field
                'HGETALL', // Get all the fields and values in a hash
                'HINCRBY', // Increment the integer value of a hash field by the given number
                'HINCRBYFLOAT', // Increment the float value of a hash field by the given amount
                'HKEYS', // Get all the fields in a hash
                'HLEN', // Get the number of fields in a hash
                'HMGET', // Get the values of all the given hash fields
                'HMSET', // Set multiple hash fields to multiple values
                'HSET', // Set the string value of a hash field
                'HSETNX', // Set the value of a hash field, only if the field does not exist
                'HSTRLEN', // Get the length of the value of a hash field
                'HVALS', // Get all the values in a hash
                'INCR', // Increment the integer value of a key by one
                'INCRBY', // Increment the integer value of a key by the given amount
                'INCRBYFLOAT', // Increment the float value of a key by the given amount
                'INFO', // Get information and statistics about the server
                'KEYS', // Find all keys matching the given pattern
                'LASTSAVE', // Get the UNIX time stamp of the last successful save to disk
                'LINDEX', // Get an element from a list by its index
                'LINSERT', // Insert an element before or after another element in a list
                'LLEN', // Get the length of a list
                'LPOP', // Remove and get the first element in a list
                'LPUSH', // Prepend one or multiple values to a list
                'LPUSHX', // Prepend a value to a list, only if the list exists
                'LRANGE', // Get a range of elements from a list
                'LREM', // Remove elements from a list
                'LSET', // Set the value of an element in a list by its index
                'LTRIM', // Trim a list to the specified range
                'MGET', // Get the values of all the given keys
                'MIGRATE', // Atomically transfer a key from a Redis instance to another one.
                'MONITOR', // Listen for all requests received by the server in real time
                'MOVE', // Move a key to another database
                'MSET', // Set multiple keys to multiple values
                'MSETNX', // Set multiple keys to multiple values, only if none of the keys exist
                'MULTI', // Mark the start of a transaction block
                'OBJECT', // Inspect the internals of Redis objects
                'PERSIST', // Remove the expiration from a key
                'PEXPIRE', // Set a key's time to live in milliseconds
                'PEXPIREAT', // Set the expiration for a key as a UNIX timestamp specified in milliseconds
                'PFADD', // Adds the specified elements to the specified HyperLogLog.
                'PFCOUNT', // Return the approximated cardinality of the set(s) observed by the HyperLogLog at key(s).
                'PFMERGE', // Merge N different HyperLogLogs into a single one.
                'PING', // Ping the server
                'PSETEX', // Set the value and expiration in milliseconds of a key
                'PSUBSCRIBE', // Listen for messages published to channels matching the given patterns
                'PUBSUB', // Inspect the state of the Pub/Sub subsystem
                'PTTL', // Get the time to live for a key in milliseconds
                'PUBLISH', // Post a message to a channel
                'PUNSUBSCRIBE', // Stop listening for messages posted to channels matching the given patterns
                'QUIT', // Close the connection
                'RANDOMKEY', // Return a random key from the keyspace
                'READONLY', // Enables read queries for a connection to a cluster slave node
                'READWRITE', // Disables read queries for a connection to a cluster slave node
                'RENAME', // Rename a key
                'RENAMENX', // Rename a key, only if the new key does not exist
                'RESTORE', // Create a key using the provided serialized value, previously obtained using DUMP.
                'ROLE', // Return the role of the instance in the context of replication
                'RPOP', // Remove and get the last element in a list
                'RPOPLPUSH', // Remove the last element in a list, prepend it to another list and return it
                'RPUSH', // Append one or multiple values to a list
                'RPUSHX', // Append a value to a list, only if the list exists
                'SADD', // Add one or more members to a set
                'SAVE', // Synchronously save the dataset to disk
                'SCARD', // Get the number of members in a set
                'SCRIPT DEBUG', // Set the debug mode for executed scripts.
                'SCRIPT EXISTS', // Check existence of scripts in the script cache.
                'SCRIPT FLUSH', // Remove all the scripts from the script cache.
                'SCRIPT KILL', // Kill the script currently in execution.
                'SCRIPT LOAD', // Load the specified Lua script into the script cache.
                'SDIFF', // Subtract multiple sets
                'SDIFFSTORE', // Subtract multiple sets and store the resulting set in a key
                'SELECT', // Change the selected database for the current connection
                'SET', // Set the string value of a key
                'SETBIT', // Sets or clears the bit at offset in the string value stored at key
                'SETEX', // Set the value and expiration of a key
                'SETNX', // Set the value of a key, only if the key does not exist
                'SETRANGE', // Overwrite part of a string at key starting at the specified offset
                'SHUTDOWN', // Synchronously save the dataset to disk and then shut down the server
                'SINTER', // Intersect multiple sets
                'SINTERSTORE', // Intersect multiple sets and store the resulting set in a key
                'SISMEMBER', // Determine if a given value is a member of a set
                'SLAVEOF', // Make the server a slave of another instance, or promote it as master
                'SLOWLOG', // Manages the Redis slow queries log
                'SMEMBERS', // Get all the members in a set
                'SMOVE', // Move a member from one set to another
                'SORT', // Sort the elements in a list, set or sorted set
                'SPOP', // Remove and return one or multiple random members from a set
                'SRANDMEMBER', // Get one or multiple random members from a set
                'SREM', // Remove one or more members from a set
                'STRLEN', // Get the length of the value stored in a key
                'SUBSCRIBE', // Listen for messages published to the given channels
                'SUNION', // Add multiple sets
                'SUNIONSTORE', // Add multiple sets and store the resulting set in a key
                'SWAPDB', // Swaps two Redis databases
                'SYNC', // Internal command used for replication
                'TIME', // Return the current server time
                'TOUCH', // Alters the last access time of a key(s). Returns the number of existing keys specified.
                'TTL', // Get the time to live for a key
                'TYPE', // Determine the type stored at key
                'UNSUBSCRIBE', // Stop listening for messages posted to the given channels
                'UNLINK', // Delete a key asynchronously in another thread. Otherwise it is just as DEL, but non blocking.
                'UNWATCH', // Forget about all watched keys
                'WAIT', // Wait for the synchronous replication of all the write commands sent in the context of the current connection
                'WATCH', // Watch the given keys to determine execution of the MULTI/EXEC block
                'ZADD', // Add one or more members to a sorted set, or update its score if it already exists
                'ZCARD', // Get the number of members in a sorted set
                'ZCOUNT', // Count the members in a sorted set with scores within the given values
                'ZINCRBY', // Increment the score of a member in a sorted set
                'ZINTERSTORE', // Intersect multiple sorted sets and store the resulting sorted set in a new key
                'ZLEXCOUNT', // Count the number of members in a sorted set between a given lexicographical range
                'ZRANGE', // Return a range of members in a sorted set, by index
                'ZRANGEBYLEX', // Return a range of members in a sorted set, by lexicographical range
                'ZREVRANGEBYLEX', // Return a range of members in a sorted set, by lexicographical range, ordered from higher to lower strings.
                'ZRANGEBYSCORE', // Return a range of members in a sorted set, by score
                'ZRANK', // Determine the index of a member in a sorted set
                'ZREM', // Remove one or more members from a sorted set
                'ZREMRANGEBYLEX', // Remove all members in a sorted set between the given lexicographical range
                'ZREMRANGEBYRANK', // Remove all members in a sorted set within the given indexes
                'ZREMRANGEBYSCORE', // Remove all members in a sorted set within the given scores
                'ZREVRANGE', // Return a range of members in a sorted set, by index, with scores ordered from high to low
                'ZREVRANGEBYSCORE', // Return a range of members in a sorted set, by score, with scores ordered from high to low
                'ZREVRANK', // Determine the index of a member in a sorted set, with scores ordered from high to low
                'ZSCORE', // Get the score associated with the given member in a sorted set
                'ZUNIONSTORE', // Add multiple sorted sets and store the resulting sorted set in a new key
                'SCAN', // Incrementally iterate the keys space
                'SSCAN', // Incrementally iterate Set elements
                'HSCAN', // Incrementally iterate hash fields and associated values
                'ZSCAN', // Incrementally iterate sorted sets elements and associated scores
            ],
        ],


    ]
];


return BaseArrayHelper::merge($caches, [
    'components' => [
        'cache' => $caches['components'][$boot->env('defaultCache')]
    ]
]);
