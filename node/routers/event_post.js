const express = require("express");
const path = require("path");
const key = require("../function/key");

const app = express();

const dbname = require("../function/database");
const ho = dbname.ho + ".";
const pbh = dbname.pbh + ".";

const DATE_DIFF = require("date-diff-js");
const bodyParser = require("body-parser");
const moment = require("moment");
const cors = require("cors");
const con = require("../config/config");

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();

router.post("/adddata", async (req, res, next) => {
  // chk = req.chk;
  // diff = req.date_diff;
  var ward_id = req.body.ward_id; // ระดับสิทธิการเข้าถึง
  var level = req.body.level; // ระดับสิทธิการเข้าถึง
  var statusRoom;
  //เริ่มการจอง status == 0==รออนุมัติจากหัวหน้า  , 1 -> รออนุมัติ , 2== ไม่อนุมัติจากหัวหน้า ,3 == อนุมัติ ,4==ไม่อนุมัติ,5==ยกเลิก
  if (level >= 2) {
    statusRoom = "1";
  } else if (ward_id == "48" && level <= "2") {
    // ธุรการ
    statusRoom = "0";
  } else if (level < 2) {
    // ผู้ใช้
    statusRoom = "0";
  }
  var ev_title = req.body.title; //todo : req -> Form .... data -> body
  var ev_startdate = req.body.dateStart;
  var ev_enddate = req.body.dateEnd;
  var ev_starttime = req.body.timeStart;
  var ev_endtime = req.body.timeEnd;
  var ev_people = req.body.people;
  var to_id = req.body.to_id;
  var st_id = req.body.style; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_name; // id_rooms
  var toolmore = req.body.tool_request;
  var ward_id = req.body.ward_id;
  var faction_id = req.body.faction_id;
  var depart_id = req.body.depart_id;

  var date_ev_startdate = new Date(ev_startdate);
  var dateCheck =
    date_ev_startdate.getFullYear() +
    "-" +
    (date_ev_startdate.getMonth() + 1) +
    "-" +
    date_ev_startdate.getDate();

  if (
    !ev_title ||
    !ev_people ||
    !ro_id ||
    !st_id ||
    !id ||
    !ev_startdate ||
    !ev_enddate ||
    !ev_starttime ||
    !ev_endtime
  ) {
    return res.json({
      error: true,
      status: "0",
      message: "ไม่สามารถบันทึกได้",
    });
  } else {
    var chk = 0;
    var date_diff = DATE_DIFF(ev_startdate, ev_enddate, "D").output;
    if (date_diff >= 0) {
      // var dateStart = ev_startdate;

      for (var i = 0; i <= date_diff; i++) {
        var dateStart = new Date(ev_startdate);
        const dateCheck =
          dateStart.getFullYear() +
          "-" +
          (dateStart.getMonth() + 1) +
          "-" +
          dateStart.getDate();
        var date_end = new Date(ev_enddate);
        const dateCheckend =
          date_end.getFullYear() +
          "-" +
          (date_end.getMonth() + 1) +
          "-" +
          date_end.getDate();

        con.query(
          "SELECT IF (ev_starttime = '00:00:00', '', substr(ev_starttime, 1, 5)) as ev_starttime, " +
            "IF (ev_endtime = '00:00:00', '', substr(ev_endtime, 1, 5)) as ev_endtime " +
            // "FROM tbl_event where ev_startdate = ? and ro_id = ?  and ev_status = '3' ",
            "FROM tbl_event where ev_startdate BETWEEN ? AND ? and ro_id = ?  and ev_status = '3' ",
          [dateCheck, dateCheckend, ro_id],
          (error, results, field) => {
            if (error) throw error;
            var x = 0;
            // if (results != 0) {
            while (x < results.length) {
              var timestart = results[x].ev_starttime;
              var timeend = results[x].ev_endtime;

              if (timestart != "" && timeend != "") {
                if (ev_starttime >= timestart && ev_starttime <= timeend) {
                  chk++;
                } else if (
                  ev_starttime <= timestart &&
                  ev_starttime <= timestart &&
                  ev_endtime >= timeend
                ) {
                  chk++;
                } else if (
                  ev_starttime <= timestart &&
                  ev_endtime >= timestart &&
                  ev_endtime <= timeend
                ) {
                  chk++;
                } else {
                  if (ev_starttime == timestart) {
                    chk++;
                  }
                }
              }
              x++;
            }
            // }
            //for x

            if (chk > 0) {
              req.status = 0;

              return next();
            } else {
              req.statusRoom = statusRoom;
              req.date_diff = date_diff;
              req.dateStart = dateStart;
              return next();
            }
          }
        );

        var theDate1 = Date.parse(dateStart) + 3600 * 1000 * 24;
        const date = new Date(theDate1);
        dateStart = date
          .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
          .slice(0, 10);
      } //for i
    }
  }
});
router.post("/adddata", async (req, res) => {
  var date_diff = req.date_diff;
  var ev_title = req.body.title; //todo : req -> Form .... data -> body
  var ev_startdate = req.body.dateStart;
  var ev_enddate = req.body.dateEnd;
  var ev_starttime = req.body.timeStart;
  var ev_endtime = req.body.timeEnd;
  var ev_people = req.body.people;
  var to_id = req.body.to_id;
  var st_id = req.body.style; // id_style
  var id = req.body.id; // id_users
  var ro_id = req.body.ro_name; // id_rooms
  var toolmore = req.body.tool_request;
  var ward_id = req.body.ward_id;
  var faction_id = req.body.faction_id;
  var depart_id = req.body.depart_id;
  const date_now = new Date();

  const new_date = new Date();
  const dateChecknow = Date.parse(new_date);
  const theDate_start = Date.parse(ev_startdate) + 3600 * 1000 * 24;

  const theDate_end = Date.parse(ev_enddate) + 3600 * 1000 * 24;
  const date2 = new Date(theDate_end);

  if (theDate_start < dateChecknow || theDate_end < dateChecknow) {
    return res.json({
      error: true,
      status: "0",
      message: "เลือกวันจองย้อนหลังไม่ได้",
    });
   
  }else if(ev_endtime<=ev_starttime){
    return res.json({
      error: true,
      status: "0",
      message: "เลือกเวลาให้ถูกต้อง",
    });
  }
  // else {
  else if (req.status == 0) {
    return res.json({
      status: "0",
      message: "เวลาที่ท่านเลือกมีผู้อื่นจองแล้ว ไม่สามารถจองห้องได้",
    });
  } else {
    con.query(
      "select max(event_id) as maxid from tbl_event",
      (error, results, field) => {
        if (error) throw error;
        // console.log("event");
        //todo : Create Event_id
        for (var ix = 0; ix < results.length; ix++) {
          var d = new Date();
          var month = moment(d).format("MM");
          var year = d.getFullYear() + 543;
          var newmaxid = results[ix].maxid;
          var newdate = parseInt(newmaxid); // แปลงค่าเป็น newmaxid ตัวเลข

          if (newmaxid == "") {
            newdate = newdate + 1;
            var event_id = year + month + "0000" + newdate;
          } else {
            var year2 = year.toString().substring(2);
            var id_new = newmaxid.substring(0, 4);
            if (id_new == year2 + month) {
              newdate = newdate + 1;
              newdate = newdate.toString().substring(4);
              event_id = year + month + newdate;
            } else {
              event_id = year + month + "00001";
            }
          } //todo : Create Event_id

          if (date_diff >= 0) {
            var dateStart = ev_startdate;

            var theDateend = Date.parse(ev_enddate) + 3600 * 1000 * 24;
            const date2 = new Date(theDateend);

            var dateEnd = date2
              .toISOString("th-TH", { timeZone: "UTC" })
              .slice(0, 10);

            for (var xx = 0; xx <= date_diff; xx++) {
              var theDateStart = Date.parse(dateStart) + 3600 * 1000 * 24;
              var date = new Date(theDateStart);
              dateStart = date
                .toISOString("EN-AU", {
                  timeZone: "Australia/Melbourne",
                })
                .slice(0, 10);

              //todo : INSERT data
              con.query(
                "INSERT INTO tbl_event(ev_title,ev_people,ro_id,st_id,ev_startdate,ev_enddate," +
                  "ev_starttime,ev_endtime,ev_status,event_id,ward_id,faction_id,depart_id,ev_toolmore,id)" +
                  "VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?, AES_ENCRYPT(?, UNHEX(SHA2(?, 512))))",
                [
                  ev_title,
                  ev_people,
                  ro_id,
                  st_id,
                  dateStart,
                  dateEnd,
                  ev_starttime,
                  ev_endtime,
                  req.statusRoom,
                  event_id.substring(2),
                  ward_id,
                  faction_id,
                  depart_id,
                  toolmore,
                  id,
                  "" + key + "",
                ],
                (error, results, field) => {
                  if (error) throw error;
                  if (to_id != null) {
                    for (var x = 0; x <= to_id.length; x++) {
                      var toid = to_id[x];

                      if (toid != undefined) {
                        con.query(
                          "INSERT INTO tbl_acces(ev_id,to_id) VALUES(?,?) ",
                          [results.insertId, toid],
                          (error, results, field) => {
                            if (error) throw error;
                          }
                        );
                      }
                    }
                    // } //todo : INSERT tbl_acces
                  }
                }
              );

              //todo : INSERT tbl_event
            } // for i
          } // todo : ckeck diff
        }
      }
    );
  }
  return res.json({
    status: "200",
    message: "บันทึกข้อมูลสำเร็จ",
  });
});
router.put("/updatestatus", async (req, res) => {
  var ev_status = req.body.ev_status;
  var event_id = req.body.event_id;
  var ro_id = req.body.ro_id;
  var ev_startdate = req.body.dateStart;
  var ev_enddate = req.body.dateEnd;
  var ev_starttime = req.body.timeStart;
  var ev_endtime = req.body.timeEnd;
  var toolmore = req.body.modal_toolmore;
  var status_yes;
  var status_no;

  if (ev_status == "3") {
    status_yes = 3;
    status_no = 4;
  } else if (ev_status == "5") {
    status_yes = 5;
    status_no = 1;
  } else if (ev_status == "4") {
    status_yes = 4;
    status_no = 1;
  } else if (ev_status == "1") {
    status_yes = 1;
    status_no = 1;
  } else if (ev_status == "0") {
    status_yes = 0;
    status_no = 1;
  }

  if (!event_id || !ev_status) {
    return res.json({
      error: true,
      status: "0",
      message: "ไม่อนุมัติแบบฟอร์มได้",
    });
  } else {
    con.query(
      "UPDATE tbl_event SET ev_status = ? WHERE event_id = ?",
      [status_yes, event_id],
      (error, results, field) => {
        if (error) throw error;

        if (results) {
          var chk = 0;
          var datediff = DATE_DIFF(ev_startdate, ev_enddate, "D").output;
          if (datediff >= 0) {
            var dateStart = ev_startdate;
            var date_ev_startdate = new Date(ev_startdate);
            var dateCheck =
              date_ev_startdate.getFullYear() +
              "-" +
              (date_ev_startdate.getMonth() + 1) +
              "-" +
              date_ev_startdate.getDate();

            for (var i = 0; i <= datediff; i++) {
              con.query(
                "SELECT ev_id,event_id, substr(ev_starttime,1,5) AS ev_starttime," +
                  "substr(ev_endtime,1,5) AS ev_endtime " +
                  "FROM tbl_event WHERE event_id != ? AND ro_id = ? AND ev_startdate = ? AND ev_status != '3' ",
                [event_id, ro_id, dateCheck],
                (error, results_x, field) => {
                  for (var x = 0; x < results.length; x++) {
                    var theDateStart = Date.parse(dateStart) + 3600 * 1000 * 24;
                    const date = new Date(theDateStart);
                    dateStart = date
                      .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
                      .slice(0, 10);

                    if (results_x[x].ev_starttime == ev_starttime) {
                      con.query(
                        "UPDATE tbl_event SET ev_status = ? WHERE event_id = ? ",
                        [status_no, results_x[x].event_id],
                        (error, results, field) => {
                          if (error) throw error;
                        }
                      );
                    } else if (
                      results_x[x].ev_starttime >= ev_starttime &&
                      results_x[x].ev_starttime <= ev_enddate
                    ) {
                      con.query(
                        "UPDATE tbl_event SET ev_status = ? WHERE event_id = ? ",
                        [status_no, results_x[x].event_id],
                        (error, results, field) => {
                          if (error) throw error;
                        }
                      );
                    } else if (
                      results_x[x].ev_starttime <= ev_starttime &&
                      results_x[x].ev_starttime <= ev_starttime &&
                      results_x[x].ev_endtime >= ev_endtime
                    ) {
                      con.query(
                        "UPDATE tbl_event SET ev_status = ? WHERE event_id = ? ",
                        [status_no, results_x[x].event_id],
                        (error, results, field) => {
                          if (error) throw error;
                        }
                      );
                    } else if (
                      results_x[x].ev_starttime <= ev_starttime &&
                      results_x[x].ev_endtime >= ev_starttime &&
                      results_x[x].ev_endtime
                    ) {
                      con.query(
                        "UPDATE tbl_event SET ev_status = ? WHERE event_id = ? ",
                        [status_no, results_x[x].event_id],
                        (error, results, field) => {
                          if (error) throw error;
                        }
                      );
                    }
                  }
                }
              );
            } // for i
            res.json({
              status: "200",
              message: "อนุมัติแบบฟอร์มเรียบร้อย",
            });
          } //datediff
        } // results
      }
    );
  }
});
router.put("/updatestatus/staff", async (req, res) => {
  var id = req.body.id;
  var ev_status = req.body.ev_status;
  var event_id = req.body.event_id;
  var ev_title = req.body.title;
  var ro_id = req.body.ro_id;
  var ev_startdate = req.body.dateStart;
  var ev_enddate = req.body.dateEnd;
  var ev_starttime = req.body.timeStart;
  var ev_endtime = req.body.timeEnd;
  var ev_people = req.body.people;
  var st_id = req.body.st_id;
  var to_id = req.body.to_id;
  var toolmore = req.body.modal_toolmore;
  var ward_id = req.body.ward_id;
  var faction_id = req.body.faction_id;
  var depart_id = req.body.depart_id;

  if (!event_id || !ev_status) {
    return res.json({
      error: true,
      status: "0",
      message: "ไม่สามรถอนุมัติแบบฟอร์มได้",
    });
  } else {
    con.query(
      "SELECT ev_id FROM tbl_event WHERE event_id = ?",
      [event_id],
      (error, results_row, field) => {
        if (error) throw error;

        if (results_row) {
          var chk = 0;
          var datediff = DATE_DIFF(ev_startdate, ev_enddate, "D").output;

          if (datediff >= 0) {
            var dateStart = ev_startdate;

            var date_ev_startdate = new Date(ev_startdate);
            var dateCheck =
              date_ev_startdate.getFullYear() +
              "-" +
              (date_ev_startdate.getMonth() + 1) +
              "-" +
              date_ev_startdate.getDate();
            var date_end = new Date(ev_enddate);
            const dateCheckend =
              date_end.getFullYear() +
              "-" +
              (date_end.getMonth() + 1) +
              "-" +
              date_end.getDate();

            for (var i = 0; i <= datediff; i++) {
              con.query(
                "SELECT if (ev_starttime = '00:00:00','', substr(ev_starttime,1,5)) AS ev_starttime , " +
                  "IF (ev_endtime = '00:00:00','', substr(ev_endtime,1,5)) AS ev_endtime " +
                  "FROM tbl_event WHERE ev_startdate BETWEEN ? AND ? AND ro_id = ? AND ev_status = '3' ",
                [dateCheck, dateCheckend, ro_id],
                (error, results, field) => {
                  for (var rs = 0; rs < results.length; rs++) {
                    var timestart = results[rs].ev_starttime;
                    var timeend = results[rs].ev_endtime;

                    var theDateStart = Date.parse(dateStart) + 3600 * 1000 * 24;
                    const date = new Date(theDateStart);
                    dateStart = date
                      .toISOString("EN-AU", { timeZone: "Australia/Melbourne" })
                      .slice(0, 10);

                    if (timestart != "" && timeend != "") {
                      if (
                        ev_starttime >= timestart &&
                        ev_starttime <= timeend
                      ) {
                        chk++;
                      } else if (
                        ev_starttime <= timestart &&
                        ev_starttime <= timestart &&
                        ev_endtime >= timeend
                      ) {
                        chk++;
                      } else if (
                        ev_starttime <= timestart &&
                        ev_endtime >= timestart &&
                        ev_endtime <= timeend
                      ) {
                        chk++;
                      } else {
                        if (ev_starttime == timestart) {
                          chk++;
                        }
                      }
                    }
                  }
                }
              );
            } // for i
          } // datediff >=0

          if (chk > 0) {
            return res.json({
              status: "0",
              message: "ไม่สามารถจองห้องได้",
            });
          } else {
            if (datediff >= 0) {
              dateStart = ev_startdate;

              if (results_row.length >= 0) {
                con.query(
                  "DELETE FROM tbl_event where event_id = ? ",
                  [event_id],
                  (error, results_del, field) => {
                    if (error) throw error;

                    con.query(
                      "ALTER TABLE tbl_event AUTO_INCREMENT = 1",
                      (error, results, field) => {
                        if (error) throw error;

                        for (var x = 0; x <= datediff; x++) {
                          con.query(
                            "INSERT INTO tbl_event (ev_title,ev_people,ro_id,st_id,ev_startdate,ev_enddate,ev_starttime,ev_endtime,ev_status,event_id,ward_id,faction_id,depart_id,ev_toolmore,id)" +
                              "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?, AES_ENCRYPT(?, UNHEX(SHA2(?, 512))))",
                            [
                              ev_title,
                              ev_people,
                              ro_id,
                              st_id,
                              dateStart,
                              ev_enddate,
                              ev_starttime,
                              ev_endtime,
                              ev_status,
                              event_id,
                              ward_id,
                              faction_id,
                              depart_id,
                              toolmore,
                              id,
                              "" + key + "",
                            ],
                            (error, results_insert, field) => {
                              if (error) throw error;
                              if (to_id != undefined) {
                                for (var ii = 0; ii <= to_id.length; ii++) {
                                  var toid = to_id[ii];

                                  con.query(
                                    "INSERT INTO tbl_acces(ev_id,to_id) VALUES(?,?) ",
                                    [results.insertId, toid],
                                    (error, results, field) => {
                                      if (error) throw error;
                                    }
                                  );
                                }
                              }
                            }
                          );
                          var theDateStart =
                            Date.parse(dateStart) + 3600 * 1000 * 24;
                          const date = new Date(theDateStart);
                          dateStart = date
                            .toISOString("EN-AU", {
                              timeZone: "Australia/Melbourne",
                            })
                            .slice(0, 10);
                        } //for x
                      }
                    );
                  }
                );
              } //results_row >0
            } // datediff >=0

            res.json({
              status: "200",
              message: "อนุมัติแบบฟอร์มเรียบร้อย",
            });
          }
        } // results
      }
    );
  }
});
module.exports = router;
