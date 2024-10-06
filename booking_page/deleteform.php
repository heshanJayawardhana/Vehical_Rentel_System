<html>
    <head>
        <title>Delete booking </title>

        <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }


        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        </style>

    </head>

    <body>
    <div class="form-container">
    <h2>Delete Booking</h2>
        <form action="delete.php" method="POST" >
            ID:
            <input type="text" name="bId" placeholder="Enter booking ID" required><br><br>
            <input type="submit" value="Delete">
        </form>
    </div>
    </body>
</html>