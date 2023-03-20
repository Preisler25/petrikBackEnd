const { json } = require('express')
const express = require('express')
const app = express()
const port = 3000

app.get('/api/posts', (req, res) => {
    res.json(
        {
            id: 1,
            title: 'Post 1',
            description: 'Content 1'
        },
    )
})

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})