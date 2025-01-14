<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 40px auto;
            padding: 35px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .input-field {
            margin-bottom: 20px;
        }
        .input-field input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .reset-btn {
            background-color: #337ab7;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .reset-btn:hover {
            background-color: #23527c;
        }
    </style>
</head>
<body style="background-color: whitesmoke;">
    <div class="container">
        <h2>Reset Password</h2>
        <form method="post" action="process_reset_password.php">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            <div class="input-field">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="input-field">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button class="reset-btn" type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
