const express = require("express");
const cors = require("cors");
const app = express();
const mysql = require("mysql");

require("dotenv").config();
app.use(cors());
app.use(express.json());

const PORT = process.env.PORT || 5000;

var con = mysql.createConnection({
  host: process.env.SERVER_HOST,
  user: process.env.SERVER_USERNAME,
  password: process.env.SERVER_PASSWORD,
  port: process.env.SERVER_PORT,
  database: process.env.DB_NAME,
});

con.connect(function (err) {
  if (err) throw err;
  console.log("Connected!");
});

// APIS
app.post("/api/ap/create", (req, res) => {
  var ap_name = req.body.ap_name;
  var ap_email = req.body.ap_email;
  var ap_date = req.body.ap_date;
  var ap_doctor = req.body.ap_doctor;
  var ap_msg = req.body.ap_msg;

  var ap_hospital_id = req.body.ap_hospital_id;
  var ap_district_id = req.body.ap_district_id;

  var sql = `INSERT INTO appointment (name, email, date, doctor,message,hid,did) VALUES ('${ap_name}','${ap_email}','${ap_date}','${ap_doctor}','${ap_msg}','${ap_hospital_id}','${ap_district_id}')`;
  //   console.log(sql);
  con.query(sql, function (err, result) {
    if (err) {
      res.status(400).json({ status: 400, data: err });
      throw err;
    }
    return res.status(201).json({ status: 201, data: result });
  });
});

app.post("/api/user/reg", (req, res) => {
  var sql = `INSERT INTO user VALUES (
    '${req.body.name}',
    '${req.body.email}',
    '${req.body.password}',
    '1',
    '${req.body.hospital_name}',
    '${req.body.address}',
    '${req.body.mobile}',
    '${req.body.district}'
    )`;
  //console.log(sql);

  con.query(sql, function (err, result) {
    if (err) {
      res.status(400).json({ status: 400, data: err });
      throw err;
    }
    return res.status(201).json({ status: 201, data: result });
  });
});

app.get("/api/user/login", (req, res) => {
  var sql = `SELECT * FROM user WHERE user.email='${req.query.email}' AND user.password='${req.query.password}' `;
  console.log(sql);

  con.query(sql, function (err, result) {
    if (err) {
      res.status(400).json({ status: 400, data: err });
      throw err;
    }
    // console.log(result);
    return res.status(200).json({ status: 200, data: result });
  });
});

app.get("/", (req, res) => {
  res.status(200).json({ msg: "Welcome to server" });
});

app.listen(PORT, () => {
  console.log("Server is running on port.." + PORT);
});
