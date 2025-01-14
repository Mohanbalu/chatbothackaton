<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
            padding: 35px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .input-field {
            margin-bottom: 20px;
        }
        .input-field label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .input-field input[type="text"], 
        .input-field input[type="password"], 
        .input-field input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .input-field input[type="text"]:focus, 
        .input-field input[type="password"]:focus, 
        .input-field input[type="email"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            outline: none;
        }
        .reset-btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        .reset-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form method="post" action="process_forgot_password.php">
            <div class="input-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-field">
                <label for="current_password">Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="input-field">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="input-field">
                <label for="confirm_new_password">Confirm New Password:</label>
                <input type="password" id="confirm_new_password" name="confirm_new_password" required>
            </div>
            <button class="reset-btn" type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
