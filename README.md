# Chatbot Project

This project is a chatbot platform designed to interact with users dynamically. It supports user authentication, feedback submission, and chat history storage. The application is built using web technologies, including HTML, CSS, JavaScript, PHP, and Python.

## Features

### 1. Chatbot Functionality
- **Dynamic Interaction**: User-friendly chatbot capable of understanding intents via machine learning models.
- **Chat History Storage**: Maintain user interaction history for future reference.

### 2. User Feedback
- **Feedback Collection**:
  - Users can provide feedback through a dedicated form.
  - Feedback is processed and stored in the backend.

### 3. Authentication System
- **User Registration and Login**:
  - Secure login and registration.
  - Password recovery and reset functionality.
- **Forgot Password**: Allows users to retrieve and reset forgotten passwords securely.

### 4. Additional Features
- **Contact Us Form**:
  - Users can reach the support team via the "Reach Us" page.
- **Responsive Design**:
  - Ensures smooth usage across devices.

## Technology Stack

### Frontend
- **HTML, CSS, JavaScript**:
  - Interactive user interface.
  - Styling via `feedbackcss.css` and `styles.css`.
  - `chatbot.html`, `landing.html`, and `register.html` for content rendering.

### Backend
- **PHP**:
  - Handles feedback submission (`submit_feedback.php`), password recovery (`process_forgot_password.php`), and chat storage (`store_chat_history.php`).
- **Python**:
  - Server interactions and chatbot logic using `server.py`.

### Machine Learning
- **Model**:
  - Intent matching with the help of `intents.json`.
  - Model architecture reference available in `chatmodel.png`.

### Dependencies
- **Node.js**:
  - Server and package management using `server.js`, `package.json`, and `package-lock.json`.

## Folder Structure
```plaintext
project-root/
├── frontend/
│   ├── chatbot.html
│   ├── feedback.html
│   ├── register.html
│   ├── reachus.html
│   ├── forgot_password.html
│   ├── index.html
│   ├── landing.html
│   └── css/
│       ├── feedbackcss.css
│       ├── styles.css
│       └── landing.css
├── backend/
│   ├── config.php
│   ├── submit_feedback.php
│   ├── process_forgot_password.php
│   ├── store_chat_history.php
│   ├── reset_password.php
│   └── process_reset_password.php
├── assets/
│   ├── fb.png
│   ├── linkedin.png
│   └── chatmodel.png
├── server/
│   ├── server.js
│   ├── server.py
│   └── intents.json
├── dependencies/
│   ├── package.json
│   ├── package-lock.json
├── authentication/
│   ├── login.php
│   ├── register.php
│   └── submit_resolution.php
└── README.md  # Project documentation
```

## Installation Instructions
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Mohanbalu/ChatBot
   ```

2. **Install Node.js Dependencies**:
   ```bash
   cd server
   npm install
   ```

3. **Set Up Database**:
   - Import the provided SQL file into your MySQL database via phpMyAdmin.
   - Update the `config.php` file with the database credentials.

4. **Launch Application**:
   - Use Node.js to start the server:
     ```bash
     node server.js
     ```
   - Start the Python server for chatbot interactions:
     ```bash
     python server.py
     ```
   - Open the application in the browser via `http://localhost/ChatBot`.

## Future Enhancements
1. **Multi-language Support**: Extending chatbot interaction to multiple languages.
2. **Enhanced AI Model**: Improve intent matching and learning via NLP.
3. **Mobile Application**: Integrate the platform with mobile apps.
4. **Admin Panel**: Dashboard to manage user data and analyze interaction logs.

## License
This project is licensed under the [MIT License](LICENSE).

---
Let me know if you have questions or need further assistance!
