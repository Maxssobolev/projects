const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 8000;
const table = 'main_posts';
const pool = mysql.createPool({
  host: '127.0.0.1',
  user: 'root',
  database: '0384_group',
  password: 'root',
});
app.use(express.json());

app.listen(port, () => {
  console.log(`App server now listening to port ${port}`);
});

app.get('/api/home', (req, res) => {
  pool.query(`SELECT id, title,content, date, author from news ORDER BY id DESC`, (err, rows) => {
    if (err) {
      res.send(err);
    } else {
      res.send(rows);
    }
  });
});

app.post('/main_post/new', function (req, res) {
  msql_query = `INSERT INTO news (title, content, author, date) VALUES ('${req.body.title}', '${req.body.content}', '${req.body.author}', '${req.body.date}')`;

  pool.query(msql_query, function (error, results, fields) {
    if (error) throw error;
    res.send(JSON.stringify(results));
  });
});

app.get('/api/news', (req, res) => {
  pool.query(
    `select id,category, title,content, DATE_FORMAT(date, '%d.%m.%Y') as date, author from ${table} ORDER BY date DESC`,
    (err, rows) => {
      if (err) {
        res.send(err);
      } else {
        res.send(rows);
      }
    },
  );
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

/*
app.get('/api/subjectlinks/:id', (req, res) => {
  pool.query(`select * from subjects_links WHERE subject_id = :id`, (err, rows) => {
    if (err) {
      res.send(err);
    } else {
      res.send(rows);
    }
  });
});
*/

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
    `SELECT subjects_homework.content as content, subjects_homework.deadline as deadline , subjects_homework.title as title, subjects_homework.date as date, subjects.title as subjtitle FROM subjects_homework INNER JOIN subjects ON subjects.id = subjects_homework.subject_id ORDER BY deadline `,
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
  pool.query(`select * from timetable WHERE weekday = '${req.query.day}'`, (err, rows) => {
    if (err) {
      res.send(err);
    } else {
      res.send(rows);
    }
  });
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
