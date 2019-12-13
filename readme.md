## Testing Simple CRUD (Create, Read, Update, Delete)

This projects / repository used for Testing Code Interview with KLY (KapanLagi Youniverse)
For using this repo / projects, you must following by step.

### Demo

This is link demo from [Heroku](http://kly-simple-crud.herokuapp.com/public)

### Installation

#### Step 1

You must clone this repository first for using this projects

```bash
    #if you using HTTPS
    git clone https://github.com/pandudpn/kly-testing-simple-crud.git

    #if you using SSH
    git@github.com:pandudpn/kly-testing-simple-crud.git
```

#### Step 2

After cloning the repository, next u must install all package / composer for this project

```bash
    composer install
```

#### Step 3

Finish installing package for this projects, setup your environment within copy first file **.env.example** into your projects and rename it with **_.env_**. Success rename, setup your configuration database on line 9 - 14. Change it with your connection database you have. for Example, my username on database is `root` and password `root`.

#### Step 4

Before you start server, you must migrate db and make seed. to run migration database, using this command `php artisan migrate` then `php artisan db:seed`.

#### Step 5

After setup your environment, you can start server with `php artisan serve`, and you can access this projects on `http://127.0.0.1:8000`

### Workflow for this projects

#### Step 1

Login in with email `admin@admin.com` and password `adminadmin` if success, you will redirect to home / dashboard, if not, message will appear.

#### Step 2

Go to menu _CRUD Simple_ on Master Menu to testing the projects. And All Data will show. You can add the data within click New Data, and the projects will redirectly to form data.

#### Step 3

Input all mandatory, and click save to submit the data. if success you will redirect to Menu _CRUD Simple_ and showing the data after you submit. If not, specific message error will appear. This data will be automatically saved with extension `.txt` and filename `name-datenow.txt` on folder (path) `http://127.0.0.1/public/data/name-datenow.txt`

#### Step 4

Edit data, on menu _CRUD Simple_, you can click button **Edit** in the right table. And you will redirect to form again and form will autofill. Click button save to submit change data. And you will redirect to menu _CRUD Simple_ again.

#### Step 5

Delete data, if you want delete, just click button **Delete** and data will automatically delete, and file will be disappear on folder.

That's the steps for using this Projects.

**_[My Website](http://www.pandudpn.id)_**
