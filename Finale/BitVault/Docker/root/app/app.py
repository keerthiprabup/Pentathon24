from flask import Flask, request, jsonify
import mysql.connector

app = Flask(__name__)

# Update the MySQL connection details
MYSQL_HOST = 'localhost'
MYSQL_PORT = 3306
MYSQL_USER = 'user'
MYSQL_PASSWORD = 'user'
MYSQL_DB = 'api'

@app.route('/register', methods=['POST'])
def register_user():
    data = request.json
    email = data.get('email')
    invite_code = data.get('invite_code')

    if email is None or invite_code is None:
        return jsonify({'message': 'Email and invite code are required'}), 400

    try:
        # Establish MySQL connection
        conn = mysql.connector.connect(
            host=MYSQL_HOST,
            port=MYSQL_PORT,
            user=MYSQL_USER,
            password=MYSQL_PASSWORD,
            database=MYSQL_DB
        )
        cursor = conn.cursor()

        # Modify the query to use MySQL syntax
        query = f"SELECT email,invite_code FROM User WHERE email = '{email}' AND invite_code = '{invite_code}'"
        cursor.execute(query)

        user = cursor.fetchone()

        conn.close()
    except Exception as e:
        return jsonify({'message': str(e)}), 500

    if ((user is not None) and (user[0] == email) and (user[1] == invite_code)):
        # Return data retrieved from the database
        return jsonify({'message': 'ok', 'data': user}), 200
    else:
        return jsonify({'message': 'Invalid email or invite code'}), 401

if __name__ == '__main__':
    app.run(debug=False, host='0.0.0.0')
