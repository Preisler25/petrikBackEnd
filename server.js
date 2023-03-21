const express = require("express");
const app = express();
const port = 3000;
const request = require('request');
const cheerio = require('cheerio');
const path = require('path');
const ejs = require('ejs');


app.get("/api/posts", (req, res) => {

request('https://petrik.hu/', (error, response, html) => {
  if (!error && response.statusCode == 200) {
    const $ = cheerio.load(html);
    const divs = $('.et_pb_salvattore_content div');

    console.log(`Found ${divs.length} divs with class 'et_pb_salvattore_content':`);
    divs.each((i, div) => {
      console.log('====================================');
      console.log(`Div ${i}:`);
      console.log('====================================');
      console.log($(div).html());
    });
  }
});
});

app.get('/', (req, res) => {
    res.render(path.join(__dirname, 'views', 'login.ejs'));
});

app.post("/api/iksz", (req, res) => {
    console.log(req.body);
});

app.get("/api/iksz", (req, res) => {
  res.json({
    posts: [
        { id: 1, title: "Post 1", description: "Content 1" },
        { id: 2, title: "Post 2", description: "Content 2" },
        { id: 3, title: "Post 3", description: "Content 3" },
        { id: 4, title: "Post 4", description: "Content 4" },
        { id: 5, title: "Post 5", description: "Content 5" },
    ],
  });
});

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`);
});
