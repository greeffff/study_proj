var http = require('http').Server();
var IO = require('socket.io')(http);
var Redis = require('ioredis');

var redis = new Redis();
redis.subscribe('chart-channel');
redis.on('message', function (channel, message) {
    console.log('Message recieved: ' + message);
    console.log('Channel '+ channel);
    message = JSON.parse(message);
    IO.emit(channel + ':' + message.event, message.data);
});
http.listen(3000,function () {
    console.log('server run on 3000 port')
});
