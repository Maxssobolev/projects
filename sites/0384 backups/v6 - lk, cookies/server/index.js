const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3555;
const table = 'main_posts';
const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  database: '0384_group',
  password: 'root',
});
app.use(express.json());

app.listen(port, () => {
  console.log(`App server now listening to port ${port}`);
});

const moment = require('moment');

app.get('/api/home', (req, res) => {
  pool.query(
    `SELECT id, title,content, date, author, label, actual from news ORDER BY actual `,
    (err, rows) => {
      if (err) {
        res.send(err);
      } else {
        let correct_data = [];

        if (req.query.whole == 'yes') {
          for (let i = 0; i < rows.length; i++) {
            if (moment(rows[i].actual).isBefore(moment())) {
              correct_data.push(rows[i]);
            }
          }

          res.send(correct_data.reverse());
        } else {
          for (let i = 0; i < rows.length; i++) {
            if (moment(rows[i].actual).isAfter(moment())) {
              correct_data.push(rows[i]);
            }
          }

          res.send(correct_data);
        }
      }
    },
  );
});

app.post('/main_post/new', function (req, res) {
  msql_query = `INSERT INTO news (title, content, author, date, label, actual) VALUES ('${
    req.body.title
  }', '${req.body.content ? req.body.content : ` `}', 'Максим', '${req.body.date}', '${
    req.body.select
  }','${req.body.actual}')`;

  pool.query(msql_query, function (error, results, fields) {
    if (error) throw error;
    res.send(JSON.stringify(results));
  });
});
app.post('/homework/new', function (req, res) {
  msql_query = `INSERT INTO subjects_homework (subject_id, title, content, date, deadline) VALUES ('${req.body.subject}', '${req.body.title}', '${req.body.content}', '${req.body.date}', '${req.body.deadline}')`;

  pool.query(msql_query, function (error, results, fields) {
    if (error) throw error;
    res.send(JSON.stringify(results));
  });
});

app.post('/delete', function (req, res) {
  msql_query = `DELETE FROM ${req.body.table} WHERE id = ${req.body.id_toDelete}`;

  pool.query(msql_query, function (error, results, fields) {
    if (error) throw error;
    res.send(JSON.stringify(results));
  });
});

app.get('/api/subjects', (req, res) => {
  pool.query(`select * from subjects`, (err, rows) => {
    if (err) {
      res.send(err);
    } else {
      res.send(rows);
    }
  });
});

const fs = require('fs');
app.get('/uploads', (req, res) => {
  /*let fileContent = fs.readFileSync(req.query.path, 'utf8');
  res.send(fileContent);*/

  res.sendFile(`/home/maxim/public_html/my-app/uploads/${req.query.filename}`);
});

app.get('/api/subjectlinks/', function (req, res) {
  pool.query(`select * from subjects_links WHERE subject_id = ${req.query.id}`, (err, rows) => {
    if (err) {
      res.send(err);
    } else {
      res.send(rows);
    }
  });
});

app.get('/api/subjecthomework/', function (req, res) {
  pool.query(
    `select * from subjects_homework WHERE subject_id = ${req.query.id} ORDER BY date DESC`,
    (err, rows) => {
      if (err) {
        res.send(err);
      } else {
        res.send(rows);
      }
    },
  );
});

app.get('/api/homework', function (req, res) {
  pool.query(
    `SELECT subjects_homework.id as id, subjects_homework.content as content, subjects_homework.deadline as deadline , subjects_homework.title as title, subjects_homework.date as date, subjects.title as subjtitle FROM subjects_homework INNER JOIN subjects ON subjects.id = subjects_homework.subject_id ORDER BY deadline `,
    (err, rows) => {
      if (err) {
        res.send(err);
      } else {
        res.send(rows);
      }
    },
  );
});

app.get('/api/subjectlectories/', function (req, res) {
  pool.query(
    `select * from subjects_lectories WHERE subject_id = ${req.query.id} ORDER BY date DESC`,
    (err, rows) => {
      if (err) {
        res.send(err);
      } else {
        res.send(rows);
      }
    },
  );
});

app.get('/api/timetable/', function (req, res) {
  if (req.query.day == 'whole') {
    pool.query(`select * from timetable ORDER BY daypos, start `, (err, rows) => {
      if (err) {
        res.send(err);
      } else {
        res.send(rows.reverse());
      }
    });
  } else {
    pool.query(
      `select * from timetable WHERE weekday = '${req.query.day}' ORDER BY start`,
      (err, rows) => {
        if (err) {
          res.send(err);
        } else {
          res.send(rows);
        }
      },
    );
  }
});

app.get('/api/teachers/', function (req, res) {
  pool.query(`select * from teachers WHERE subject_id = ${req.query.id}`, (err, rows) => {
    if (err) {
      res.send(err);
    } else {
      res.send(rows);
    }
  });
});

app.get('/users/login', function (req, res) {
  pool.query(`select * from users WHERE vk_id = ${req.query.id}`, (err, rows) => {
    if (rows.length > 0) {
      res.send(rows[0]);
    } else {
      pool.query(`INSERT INTO users (vk_id) VALUES (${req.query.id})`, (err, rows) => {
        res.send(rows);
      });
    }
  });
});
