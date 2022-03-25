const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const cors = require("cors");
const con = require("../config/config");


app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

const router = express.Router();
router.get("/detail", async (req, res) => {
  var query01 = require("url").parse(req.url, true).query;
  let ev_id = query01.ev_id;
  con.query(
    "SELECT ev.ev_id, ev.event_id, ev.ev_title, ev.ev_startdate, ev.ev_enddate," +
      "ev.ev_starttime, ev.ev_endtime, ev.ev_status, ev.ev_people, ev.ev_createdate, " +
      "ro.ro_id, ro.ro_name, " +
      "st.st_id, st.st_name," +
      "users.id, users.firstname,users.lastname, users.position," +
      "dept.de_id, dept.de_name, dept.de_phone " +
      "FROM tbl_event AS ev " +
      " " +
      "INNER JOIN  tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
      "INNER JOIN  tbl_style AS st ON (ev.st_id = st.st_id)" +
      "INNER JOIN  tbl_user AS users ON (ev.id = users.id)" +
      "INNER JOIN  tbl_department AS dept ON (users.de_id = dept.de_id) WHERE ev.ev_id = ? ;",
    [ev_id],
    (error, results, fields) => {
      if (error) throw error;
      // console.log(error);
      res.json(results);
    }
  );
});
//?  SELECT Request Tool
router.get("/requesttool", async (req, res) => {
  // let id = req.body.ev_id;
  // console.log(id)
  con.query(
    " SELECT * FROM tbl_tools AS tools INNER JOIN tbl_acces AS acc ON (acc.to_id=tools.to_id) ",
    (error, results, fields) => {
      if (error) throw error;

      // console.log(results);
      res.json(results);
    }
  );
});
router.get("/", async (req, res, next) => {
  var query01 = require("url").parse(req.url, true).query;
  let id = query01.id;
  let de_id = query01.de_id;
  const arr = [];
  if (!id) {
    return res
      .status(400)
      .send({ error: true, status: "0", message: "เกิดข้อผิดพลาด" });
  } else {
    con.query(
      "SELECT ev.ev_id , ev.ev_createdate, ev.ev_title ,ev.ev_startdate,ev.ev_enddate, ev.ev_starttime ,ev.ev_endtime, ev.ev_status ,ev.ev_people," +
        "ass.to_id, ass.ev_id as acid," +
        "ro.ro_name , tool.to_name, st.st_name," +
        "users.id, users.firstname,users.lastname, users.position," +
        "dept.de_id, dept.de_name, dept.de_phone " +
        " FROM tbl_acces AS ass  " +
        "INNER JOIN tbl_event AS ev ON (ev.ev_id = ass.ev_id) " +
        "INNER JOIN tbl_user AS users ON (ev.id = users.id ) " +
        "INNER JOIN tbl_department AS dept ON (users.de_id = dept.de_id) " +
        "INNER JOIN tbl_rooms AS ro ON (ev.ro_id = ro.ro_id) " +
        "INNER JOIN tbl_style AS st ON (ev.st_id = st.st_id) " +
        "INNER JOIN tbl_tools AS tool ON (tool.to_id = ass.to_id) " +
        "WHERE ev.ev_status = '3'  AND tool.de_id = ? AND tool.to_id = ass.to_id " +
        "GROUP BY ev.event_id",
      [de_id],
      (error, results, fields) => {
        if (error) throw error;

        if (results) {
          for (var x = 0; x < results.length; x++) {
            //  evid = ;
            evstatus = results[x].ev_status;

            arr[x] = results[x].ev_id;

            for (var x = 0; x < results.length; x++) {
              const evid = arr[x];
              con.query(
                "SELECT ev_id ,id,dv_status FROM tbl_setdevice WHERE ev_id = ? AND id = ? AND dv_status = ?",
                [evid, id, evstatus],
                (error, total, fields) => {
                  if (error) throw error;
                  if (evid != undefined) {
                    if (total.length == 0) {
                      con.query(
                        "INSERT INTO tbl_setdevice(id,ev_id,dv_status)VALUES(?,?,?)",
                        [id, evid, evstatus],
                        (error, results, fields) => {
                          if (error) throw error;
                        }
                      );
                    }
                  }
                }
              );
            }
          }
          res.json(results);
          // req.arr = arr;
          // req.ev_status = evstatus;
          // req.res = results.length;
          // req.results = results;
          // return next();
        }
      }
    );
  }
}),
  (module.exports = router);