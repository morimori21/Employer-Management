from flask import Flask, render_template,request,session,redirect,url_for,flash

import mysql.connector

connection = mysql.connector.connect(host='localhost',port='3306',
                                        database='crud',
                                        user='root',
                                        password='')

cursor = connection.cursor()

app = Flask(__name__)
app.secret_key = "super secret key"

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/login',methods=['GET','POST'])
def login():
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        username = request.form['username']
        password = request.form['password']

        cursor.execute("SELECT * FROM accounts WHERE username = %s AND password = %s",
                       (username, password))
        user = cursor.fetchone()

        if user:
            session['loggedin'] = True
            session['id'] = user[0]
            session['username'] = user[1]
            return redirect(url_for('home'))
        else:
            flash('Incorrect username/password!', 'error')
    return render_template('login.html')

@app.route('/register',methods=['GET','POST'])
def register():
    if request.method == 'POST' and 'username' in request.form and 'email' in request.form:
        username = request.form['username']
        email = request.form['email']
        password = request.form['password']
        fullname = request.form['fullname']
        address = request.form['address']
        contact = request.form['contact']

        cursor.execute("SELECT * FROM accounts WHERE username = %s OR email = %s", (username,email))
        accounts = cursor.fetchall()

        if accounts:
            flash("Account already exists", 'error')
        else:
            cursor.execute("INSERT INTO accounts VALUES (NULL,%s,%s,%s,%s,%s,%s)", (fullname,username,email,password,address,contact))
            connection.commit()
            flash("Account successfully created!", 'success')
    elif request.method == 'POST':
        flash("Fill in the forms", 'error')
    return render_template('register.html')

@app.route('/update',methods=['GET','POST'])
def update():
    if request.method == 'POST':
        pid = request.form['pid']
        username = request.form['username']
        email = request.form['email']
        password = request.form['password']
        fullname = request.form['fullname']
        address = request.form['address']
        contact = request.form['contact']

        cursor.execute("UPDATE accounts SET fullname=%s, username =%s, email=%s, password=%s,address=%s,contact =%s WHERE id = %s", (fullname,username,email,password, address, contact,pid))
        connection.commit()
        flash('Account successfully Updated', 'success')

    return redirect(url_for('home'))

@app.route('/logout')
def logout():
    session.pop('loggedin',None)
    session.pop('id', None)
    session.pop('username', None)
    return render_template('index.html')

@app.route('/person')
def person():
    sid = session['id']
    cursor.execute("SELECT * FROM accounts WHERE id = %s", (sid,))
    person_info = cursor.fetchone()
    return render_template('person.html', data=person_info)

@app.route('/home')
def home():
    cursor.execute("SELECT * FROM accounts")
    value = cursor.fetchall()
    return render_template('home.html',data=value,name=session['username'])

@app.route('/meyn')
def meyn():
    sid = session['id']
    cursor.execute("SELECT * FROM accounts WHERE id = %s", (sid,))
    person_info = cursor.fetchone()
    return render_template('meyn.html')

@app.route('/add', methods=['GET', 'POST'])
def add():
    text = ''
    success_message = ''

    if request.method == 'POST' and 'firstname' in request.form and 'lastname' in request.form:
        firstName = request.form['firstname']
        lastName = request.form['lastname']
        email = request.form['email']
        birthday = request.form['birthday']
        gender = request.form['gender']
        contact = request.form['contact']
        address = request.form['address']
        dept = request.form['dept']
        degree = request.form['degree']
        position = request.form['position']

        cursor.execute("SELECT * FROM employee WHERE firstname = %s AND lastname = %s", (firstName, lastName))
        existing_employee = cursor.fetchall()

        if existing_employee:
            flash("Employee already exists", 'error')
        else:
            cursor.execute("INSERT INTO employee (firstname, lastname, email, birthday, gender, contact, address, dept, degree, position) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                           (firstName, lastName, email, birthday, gender, contact, address, dept, degree, position))
            connection.commit()
            flash("Employee record successfully added!", 'success')

    elif request.method == 'POST':
        flash("Fill in the forms", 'error')

    return render_template('add.html')

@app.route('/view', methods=['GET'])
def view():
    try:
        cursor.execute("SELECT * FROM employee")
        employees = cursor.fetchall()
        return render_template('view.html', employees=employees)
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return "Error fetching employee data"

@app.route('/edit_employee/<int:empid>', methods=['GET'])
def render_edit_page(empid):
    try:
        # Fetch the details of the employee with the given ID
        cursor.execute("SELECT * FROM employee WHERE id=%s", (empid,))
        employee = cursor.fetchone()

        if employee:
            # Render the edit page with the employee details
            return render_template('edit_employee.html', employee=employee)
        else:
            flash("Employee not found", "error")
            return redirect(url_for('view'))

    except mysql.connector.Error as err:
        print(f"Error: {err}")
        flash("Error fetching employee details", "error")
        return redirect(url_for('view'))

# Lipat another html page
@app.route('/save_changes/<int:empid>', methods=['POST'])
def save_changes(empid):
    # Extract form data
    new_firstname = request.form.get('new_firstname', "")
    new_lastname = request.form.get('new_lastname', "")
    new_email = request.form.get('new_email', "")
    new_birthday = request.form.get('new_birthday', "")
    new_gender = request.form.get('new_gender', "")
    new_contact = request.form.get('new_contact', "")
    new_address = request.form.get('new_address', "")
    new_dept = request.form.get('new_dept', "")
    new_degree = request.form.get('new_degree', "")
    new_position = request.form.get('new_position', "")
    # mga kukunin sa html page

    try:
        # update syntax sa sql naku pooo need pa mag add ulet dami alam

        cursor.execute("UPDATE employee SET firstname=%s, lastname=%s, email=%s, birthday=%s, gender=%s, contact=%s, address=%s, dept=%s, degree=%s,position=%s WHERE id=%s",
                       (new_firstname, new_lastname, new_email, new_birthday,new_gender,new_contact,new_address,new_dept,new_degree,new_position,empid))
        connection.commit()

        flash("Employee details successfully updated", "success")
        return redirect(url_for('view'))

    except mysql.connector.Error as err:
        print(f"Error: {err}")
        flash("Error updating employee details", "error")
        return redirect(url_for('view'))

@app.route('/delete_employee/<int:id>', methods=['POST'])
def delete_employee(id):

    try:
        # Delete the employee from the database
        cursor.execute("DELETE FROM employee WHERE id=%s", (id,))
        connection.commit()


        return redirect(url_for('view'))
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return "Error deleting employee"

@app.route('/view_salary/<int:employee_id>')
def view_salary(employee_id):
    try:
        cursor.execute("SELECT * FROM salary WHERE employee_id = %s", (employee_id,))
        salaries = cursor.fetchall()

        return render_template('view_salary.html', employee_id=employee_id, salaries=salaries)
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return "Error fetching salary data"

@app.route('/add_salary/<int:employee_id>', methods=['POST'])
def add_salary(employee_id):
    if request.method == 'POST':
        # Extract form data
        amount = float(request.form.get('amount'))
        payment_date = request.form.get('payment_date')

        # Calculate deductions (assuming rates are 5% each)
        sss_contribution = round(0.05 * amount, 2)
        philhealth_contribution = round(0.05 * amount, 2)

        # Compute net salary
        net_amount = round(amount - sss_contribution - philhealth_contribution, 2)

        try:
            # Insert salary details into database
            cursor.execute(
                """
                INSERT INTO salary (employee_id, amount, payment_date, 
                                    sss_deduction, philhealth_deduction, net_amount) 
                VALUES (%s, %s, %s, %s, %s, %s)
                """,
                (employee_id, amount, payment_date, sss_contribution, philhealth_contribution, net_amount)
            )
            connection.commit()

            flash("Salary added successfully", "success")
        except mysql.connector.Error as err:
            print(f"Error: {err}")
            flash("Error adding salary", "error")

    return redirect(url_for('view_salary', employee_id=employee_id))


if __name__ == '__main__':
    app.run(debug=True)
