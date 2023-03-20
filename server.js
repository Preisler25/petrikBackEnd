const { json } = require('express')
const express = require('express')
const app = express()
const port = 3000

app.get('/api/posts', (req, res) => {
    res.json(
        {
            posts: [{id: 1,title: 'Post 1',description: 'Content 1'}, {id: 2,title: 'Post 2',description: 'Content 2'}, {id: 3,title: 'Post 3',description: 'Content 3'},]
        }
    )
})

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})