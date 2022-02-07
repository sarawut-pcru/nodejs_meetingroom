const express = require("express");
// const fn = require('../function/function');
const key = require("../function/key");
const con = require("../config/config");

const app = express();
const router = express.Router();

router.get("/", async (req, res) => {
  res.send({ status: "1", message: "ยินดีต้อนรับเข้าสู่ระบบ" });
});

router.post("/login", async (req, res) => {
  const q = req.body;

  //  const sql= "SELECT * FROM hr_personal WHERE person_username=? AND person_password=? ";
  const sql =
    "SELECT ps.person_username, " +
    //  +"AES_DECRYPT(ps.person_id, UNHEX(SHA2(?, 512))) AS person_id, "
    "ps.person_id," +
    "ps.person_firstname, " +
    "ps.person_lastname, " +
    "ps.person_right, " +
    "ps.person_page, " +
    "ps.person_token " +
    // "po.position_id, " +
    // "po.position_name, " +
    // "s.sign_id, " +
    // "s.sign_pic, " +
    // "a.ac_id, " +
    // "a.ac_name " +
    "FROM hr_personal AS ps  " +
    // "LEFT JOIN hr_position AS po " +
    // "ON (ps.position_id = po.position_id) " +
    // "LEFT JOIN hr_sign AS s " +
    // "ON (ps.person_id = s.sign_cid AND s.sign_active = '1')" +
    // "LEFT JOIN hr_academic AS a " +
    // "ON (ps.ac_id = a.ac_id) " +
    // "JOIN hr_state_work AS sw " +
    // "ON (ps.person_state = sw.person_state) " +
    "WHERE ps.person_username = ? " +
    "AND ps.person_password = ? " ;
    // "AND sw.sw_action = 'Y' " +
    // "ORDER BY s.sign_id DESC LIMIT 1 ";
  const params = [q.inputUsername, q.inputPassword];
  con.query(sql, params, (err, rows) => {
    if (err) {
      console.log(err);
      return res.json({
        status: "0",
        message: "ไม่สามารถเชื่อมต่อฐานข้อมูลบุคลากรได้",
      });
    } else {
      //console.log(rows[0].person_id.toString('utf8'));
      if (rows.length > 0) {
        console.log(rows);
        // fn.dataLog('LOGIN', '', sql, q.inputUsername);
        //console.log(ip.getClientIp(req));
        return res.json({
          person_username: rows[0].person_username,
          person_id: rows[0].person_id.toString("utf8"),
          person_firstname: rows[0].person_firstname,
          person_lastname: rows[0].person_lastname,
          person_right: rows[0].person_right,
          person_page: rows[0].person_page,
          person_token: rows[0].person_token,
          position_id: rows[0].position_id,
          position_name: rows[0].position_name,
          sign_id: rows[0].sign_id,
          sign_pic: rows[0].sign_pic,
          ac_id: rows[0].ac_id,
          ac_name: rows[0].ac_name,
        });
      } else {
        return res.json({
          status: "0",
          message:
            "Username หรือ Password ไม่ถูกต้อง<br>หรือคุณไม่มีสิทธิ์เข้าใช้งาน!",
        });
      }
    }
  });
});

router.post("/level", async (req, res) => {
  const q = req.body;
  const sql =
    "SELECT l.level_id, " +
    "IF (d.duty_lv IS NULL, 0, d.duty_lv) AS duty_id, " +
    "IF (d.duty_name IS NULL, '', d.duty_name) AS duty_name, " +
    "IF (f.faction_id IS NULL, 0, f.faction_id) AS faction_id, " +
    "IF (f.faction_name IS NULL, '', f.faction_name) AS faction_name, " +
    "IF (p.depart_id IS NULL, 0, p.depart_id) AS depart_id, " +
    "IF (p.depart_name IS NULL, '', p.depart_name) AS depart_name, " +
    "IF (w.ward_id IS NULL, 0, w.ward_id) AS ward_id, " +
    "IF (w.ward_name IS NULL, '', w.ward_name) AS ward_name " +
    "FROM hr_level AS l " +
    "LEFT JOIN hr_duty AS d " +
    "ON (l.duty_id = d.duty_id) " +
    "LEFT JOIN hr_faction AS f " +
    "ON (l.faction_id = f.faction_id) " +
    "LEFT JOIN hr_depart AS p " +
    "ON (l.depart_id = p.depart_id) " +
    "LEFT JOIN hr_ward AS w " +
    "ON (l.ward_id = w.ward_id) " +
    "WHERE l.person_id =  ?";//AES_ENCRYPT(?, UNHEX(SHA2(?, 512)))
  const params = [q.id];
  con.query(sql, params, (err, rows) => {
    if (err) {
      //console.log(err);
      return res.json({
        status: "0",
        message: "ไม่สามารถเชื่อมต่อฐานข้อมูลระดับปฏิบัติงานได้",
      });
    } else {
      if (rows.length > 0) {
        //console.log(rows);
        return res.json(rows);
      } else {
        return res.json({
          status: "0",
          message: "ไม่พบข้อมูลหน่วยงานที่สังกัด",
        });
      }
    }
  });
});

router.post("/right", async (req, res) => {
  const q = req.body;
  const sql =
    "SELECT r.right_id " +
    "FROM hr_right AS r  " +
    "WHERE r.right_id = ? " +
    "AND r." +
    q.page +
    " = '1' ";
  const params = [q.level];
  con.query(sql, params, (err, rows) => {
    if (err) {
      //console.log(err);
      return res.json({
        status: "0",
        message: "ไม่สามารถเชื่อมต่อฐานข้อมูลสิทธิ์การใช้งานได้",
      });
    } else {
      if (rows.length > 0) {
        //console.log(rows);
        //fn.dataLog('RIGHT', '', sql, q.user);
        return res.json({ status: "1", message: "คุณมีสิทธิ์เข้าใช้งาน" });
      } else {
        return res.json({ status: "0", message: "คุณไม่มีสิทธิ์เข้าใช้งาน!" });
      }
    }
  });
});

router.post("/signature", async (req, res) => {
  const q = req.body;
  const sql =
    "SELECT s.sign_id, " +
    "s.sign_pic " +
    "FROM hr_sign AS s " +
    "WHERE s.sign_cid = AES_ENCRYPT(?, UNHEX(SHA2(?, 512))) " +
    "AND s.sign_active = '1' " +
    "ORDER BY s.sign_id DESC LIMIT 1 ";
  const params = [q.txtID, key];
  con.query(sql, params, (err, rows) => {
    if (err) throw err;
    //console.log(rows);
    return res.json(rows);
  });
});

module.exports = router;
