const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');

const app = express();
const port = 3000;

app.use(bodyParser.json());
app.use(express.static('public'));

// Load intents from JSON file
const intents = JSON.parse(fs.readFileSync('intents.json', 'utf8'));

// Function to get a response based on user input
function getBotResponse(userInput) {
    let response = 'Sorry, I didn\'t understand that.';
    intents.intents.forEach(intent => {
        intent.patterns.forEach(pattern => {
            const regex = new RegExp(`\\b${pattern}\\b`, 'i');
            if (regex.test(userInput)) {
                response = intent.responses[Math.floor(Math.random() * intent.responses.length)];
            }
        });
    });
    return response;
}

// Handle chat endpoint
app.post('/chat', (req, res) => {
    const userInput = req.body.user_input;
    const botResponse = getBotResponse(userInput);
    res.json({ response: botResponse });
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
