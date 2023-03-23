const express = require("express");
const app = express();
const port = 3000;
const request = require('request');
const cheerio = require('cheerio');
const path = require('path');

app.use(express.urlencoded({ extended: true }));
app.use(express.static(__dirname + '/views'));

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
    res.render('index.ejs');
});

app.post('/api/iksz', (req, res) => {
    req.body.id = parseInt(req.body.id);
    posts.posts.push(req.body);
    res.redirect('/');
});

let posts = {
  posts: [
    { id: 1, title: "Post 1", description: "Content 1", image: "https://4.bp.blogspot.com/-ylpuMYeVtBc/Wbzk09w0III/AAAAAAAACqQ/U434PhWezEcAmbQDTIVHttjL1YBECeKHwCLcBGAs/s1600/bagoly_Wikipedia_2017.jpg"},
    { id: 2, title: "Post 2", description: "Content 2", image: "https://4.bp.blogspot.com/-ylpuMYeVtBc/Wbzk09w0III/AAAAAAAACqQ/U434PhWezEcAmbQDTIVHttjL1YBECeKHwCLcBGAs/s1600/bagoly_Wikipedia_2017.jpg"},
    { id: 3, title: "Post 3", description: "Content 3", image: "https://4.bp.blogspot.com/-ylpuMYeVtBc/Wbzk09w0III/AAAAAAAACqQ/U434PhWezEcAmbQDTIVHttjL1YBECeKHwCLcBGAs/s1600/bagoly_Wikipedia_2017.jpg" },
    { id: 4, title: "Post 4", description: "Content 4", image: "https://4.bp.blogspot.com/-ylpuMYeVtBc/Wbzk09w0III/AAAAAAAACqQ/U434PhWezEcAmbQDTIVHttjL1YBECeKHwCLcBGAs/s1600/bagoly_Wikipedia_2017.jpg" },
    { id: 5, title: "Post 5", description: "Content 5", image: "https://4.bp.blogspot.com/-ylpuMYeVtBc/Wbzk09w0III/AAAAAAAACqQ/U434PhWezEcAmbQDTIVHttjL1YBECeKHwCLcBGAs/s1600/bagoly_Wikipedia_2017.jpg" },
]};
app.get("/api/iksz", (req, res) => {
  res.json(posts);
});

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`);
});
