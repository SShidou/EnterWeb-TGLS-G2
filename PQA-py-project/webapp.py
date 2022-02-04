from flask import Flask, render_template, request, flash, get_flashed_messages, redirect, url_for
from flask_sqlalchemy import SQLAlchemy
from flask_wtf import FlaskForm, form 
from flask_bcrypt import Bcrypt
from wtforms import StringField, PasswordField, SubmitField, ValidationError
from wtforms.validators import Length, EqualTo, DataRequired
from flask_login import LoginManager, login_user, UserMixin, logout_user, login_required

import sqlalchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///TGLS-G2-Enterweb.db'
app.config['SECRET_KEY'] = '6f595648d8e040644de43bed'
db = SQLAlchemy(app)
bcrypt = Bcrypt(app) 
login_manager = LoginManager(app)
login_manager.login_view = 'login_page'
login_manager.login_message_category = 'info'

@login_manager.user_loader
def load_user(user_id):
   return User.query.get(int(user_id))

class User(db.Model, UserMixin):
   id = db.Column(db.Integer(), primary_key=True)
   uname = db.Column(db.String(length=30), nullable = False, unique = True)
   password_hash = db.Column(db.String(length=30), nullable= False)
   """items = db.relationship('Item', backref='owned_user', lazy=True)"""

   @property
   def password(self):
      return self.password
   @password.setter
   def password(self, plain_text_password):
      self.password_hash = bcrypt.generate_password_hash(plain_text_password).decode('utf-8')

   def check_password_correction(self, attempted_password):
      return bcrypt.check_password_hash(self.password_hash, attempted_password)

class RegisterForm(FlaskForm):
   def validate_uname(self, uname_to_check):
      user = User.query.filter_by(uname=uname_to_check.data).first()
      if user:
         raise ValidationError('Warning: Username already existed, please try another.')

   uname = StringField(label="User name", validators=[Length(min=6, max=25), DataRequired()])
   password1 = PasswordField(label="Password", validators=[Length(min=6), DataRequired()])
   password2 = PasswordField(label="Confirm password", validators=[EqualTo('password1'), DataRequired()])
   submit = SubmitField(label="Register")

class LoginForm(FlaskForm):
   uname = StringField(label="User name", validators=[DataRequired()])
   password = PasswordField(label="Password", validators=[DataRequired()])
   submit = SubmitField(label="Login")

class Item(db.Model):
   id = db.Column(db.Integer, primary_key=True)
   name = db.Column(db.String())
   age = db.Column(db.Integer())
   hometown = db.Column(db.String())
   email = db.Column(db.String())
   datejoin = db.Column(db.String())
   """   owner = db.Column(db.Integer(), db.ForeignKey('user.id'))

   def __repr__(self):
      return f'Item {self.name}'"""
   def __init__(self, name, age, hometown, email, datejoin):
      self.name = name
      self.age = age
      self.hometown = hometown
      self.email = email
      self.datejoin = datejoin

@app.route('/')
@app.route('/index')
def index_page():
   return render_template('index.html')

@app.route('/new', methods = ['GET', 'POST'])
@login_required
def new():
   if request.method == 'POST':
      Items = Item(request.form['name'], 
      request.form['age'],
      request.form['hometown'], 
      request.form['email'],
      request.form['datejoin'])
      
      db.session.add(Items)
      db.session.commit()

      return redirect(url_for('manage_page'))
   return render_template('new.html')


@app.route('/manage')
@login_required
def manage_page():
   items = Item.query.all()
   return render_template('manage.html', items= items)

@app.route('/edit/<int:id>', methods = ['GET', 'POST'])
def edit(id):
   items = Item.query.filter_by(id = id).first()

   if request.method == 'POST':
      items.name = request.form['name']
      items.age = request.form['age']
      items.hometown = request.form['hometown']
      items.email = request.form['email']
      items.datejoin = request.form['datejoin']

      db.session.commit()

      return redirect(url_for('manage_page'))
   return render_template('edit.html', items=items)

@app.route('/delete/<int:id>', methods = ['GET', 'POST'])
def delete(id):
   items = Item.query.filter_by(id = id).first()
   db.session.delete(items)
   db.session.commit()
   return redirect(url_for('manage_page'))

@app.route('/register', methods = ['GET', 'POST'])
def register_page():
   form = RegisterForm()
   if form.validate_on_submit():
      user_register = User(uname=form.uname.data, 
                           password=form.password1.data)
      db.session.add(user_register)
      db.session.commit()
      login_user(user_register)
      flash(f'Register successful, you are login as {user_register.uname}', category='success')
      return redirect(url_for('manage_page'))
   if form.errors != {}: #if there are not errors from the validations
      for err_msg in form.errors.values():
         flash(f'There was an error with creating account: {err_msg}', category='danger')
   return render_template('register.html', form =form)

@app.route('/login', methods=['GET', 'POST'])
def login_page():
   form = LoginForm()
   if form.validate_on_submit():
      attempted_user = User.query.filter_by(uname = form.uname.data).first()
      if attempted_user and attempted_user.check_password_correction(
      attempted_password = form.password.data):
         login_user(attempted_user)
         flash(f'Login successful, welcome {attempted_user.uname}', category='success')
         return redirect(url_for('manage_page'))
      else:
         flash(f'Login failed', category='danger')

   return render_template('login.html', form = form)

@app.route('/logout')
def logout_page():
   logout_user()
   flash(f'You have logged out', category='info')
   return redirect(url_for('index_page'))

if __name__ == '__main__':
   db.create_all()
   app.run()
