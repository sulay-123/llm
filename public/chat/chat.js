var app = require("express")();
var http = require("http").Server(app);
var io = require("socket.io")(http);
var axios = require("axios");

var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "miami@123",
  database: "miami_mix_kings",
});

connection.connect();

// connection.query('SELECT * from chat_data', function (error, results) {
//     if (error) throw error;
//     console.log('The result is: ', results);
// });

app.get("/", function (req, res) {
  res.sendFile(__dirname + "/index.html");
});

app.get("/room2", function (req, res) {
  res.sendFile(__dirname + "/room2.html");
});

app.get("/room1", function (req, res) {
  res.sendFile(__dirname + "/room2.html");
});

io.on("connection", function (socket) {
  console.log("new connection =>");
  socket.on("room", (room) => {
    console.log("new room =>");
    socket.join(room);
    console.log("join room =>");
    socket.on("chat message", function (msg) {
      console.log("send message", msg);
      var data = {
        name: msg.name,
        message: msg.message,
        date_time: msg.date_time,
      };

      connection.query("INSERT INTO chat SET ?", data, function (
        err,
        result
      ) {
        //msg.msg_id = result.insertId;
        // io.emit("chat message", msg);
        io.to(msg.room).emit("chat message", {
          data: data,
        });
      });
    });

    //for live commnet
    socket.on("comment", function (msg) {
      console.log("comment logs", msg);
      var data = {
        user_id: msg.user_id,
        name: msg.name,
        comment: msg.comment,
        live_id: msg.live_id,
      };

      connection.query("INSERT INTO live_comments SET ?", data, function (
        err,
        result
      ) {
        //msg.msg_id = result.insertId;
        // io.emit("chat message", msg);
        io.to(msg.room).emit("comment", {
          data: data,
        });
      });
    });

    socket.on("typing", function (data) {
      io.emit("typing", data);
    });

    socket.on("stop typing", function (data1) {
      io.emit("stop typing", data1);
    });
  });

  socket.on("add user", function (data2) {
    io.emit("add user", data2);
  });

  socket.on("add user", function (data2) {
    io.emit("add user", data2);
  });
});
http.listen(8002, function () {
  console.log("listening on *:8002");
});
