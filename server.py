from flask import Flask, request, jsonify, send_from_directory
import json
import random
import re
import os
import mysql.connector
from mysql.connector import Error
import threading

app = Flask(__name__)

# Load intents data with error handling
def load_intents(filename='intents.json'):
    if not os.path.isfile(filename):
        raise FileNotFoundError(f"{filename} not found.")
    with open(filename) as file:
        return json.load(file)

try:
    intents = load_intents()
    print("Intents loaded successfully.")
except FileNotFoundError as e:
    print(e)
    intents = {'intents': []}

# Database configuration
def get_db_connection():
    try:
        connection = mysql.connector.connect(
            host='localhost',
            user='root',
            password='',
            database='user_registration'
        )
        if connection.is_connected():
            return connection
    except Error as e:
        print(f"Error: {e}")
        return None

def get_intent(user_input):
    """
    Match user input with the patterns in intents and return the corresponding tag.
    """
    user_input = user_input.lower()
    for intent in intents.get('intents', []):
        for pattern in intent.get('patterns', []):
            if re.search(re.escape(pattern.lower()), user_input):
                return intent['tag']
    return "noanswer"

def get_response(intent_tag):
    """
    Get a random response for the given intent tag.
    """
    for intent in intents.get('intents', []):
        if intent['tag'] == intent_tag:
            return random.choice(intent.get('responses', []))
    return "Sorry, I don't understand."

def store_chat_history(user_id, user_input, bot_response):
    """
    Store chat history in the MySQL database.
    """
    connection = get_db_connection()
    if connection:
        try:
            cursor = connection.cursor()
            sql = "INSERT INTO chat_history (user_id, user_input, bot_response) VALUES (%s, %s, %s)"
            cursor.execute(sql, (user_id, user_input, bot_response))
            connection.commit()
        except Error as e:
            print(f"Error: {e}")
        finally:
            cursor.close()
            connection.close()

@app.route('/chat', methods=['POST'])
def chat():
    """
    Handle POST requests for chat interactions.
    """
    data = request.get_json()
    user_input = data.get('user_input', '')
    user_id = data.get('user_id', None)  # Get the user ID from the request
    print(f"User ID: {user_id}, User Input: {user_input}")
    intent_tag = get_intent(user_input)
    print(f"Identified Intent: {intent_tag}")
    response = get_response(intent_tag)
    print(f"Response: {response}")
    store_chat_history(user_id, user_input, response)
    return jsonify({'response': response})

@app.route('/')
def index():
    """
    Serve the chatbot HTML file.
    """
    return send_from_directory('.', 'chatbot.html')

@app.route('/<path:filename>')
def serve_static(filename):
    """
    Serve static files from the current directory.
    """
    return send_from_directory('.', filename)

@app.route('/submit_feedback', methods=['POST'])
def submit_feedback():
    """
    Handle feedback submission and shut down the server.
    """
    feedback = request.form.get('feedback', '')
    user_id = request.form.get('user_id', '')

    # Process feedback and store in the database if needed
    # ...

    # Shutdown server
    threading.Thread(target=shutdown_server).start()
    return jsonify({'status': 'Feedback received, server shutting down...'})

def shutdown_server():
    """
    Shutdown the Flask server.
    """
    func = request.environ.get('werkzeug.server.shutdown')
    if func:
        func()

if __name__ == '__main__':
    app.run(port=5000)
