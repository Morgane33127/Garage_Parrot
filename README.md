
# Garage_Parrot

This project was created as part of the ECF to obtain the Web and Mobile Web Developer diploma provided by the Studi online school.


![Logo](https://github.com/Morgane33127/Garage_Parrot/blob/main/public/assets/img/gvplogo.svg)


## Authors

- [@Morgane33127](https://github.com/Morgane33127)


## Informations

Ce fichier README a été généré le [2023-12-03].

Dernière mise-à-jour le : [2024-02-10].
## Documentation

[Documentation](https://github.com/Morgane33127/Garage_Parrot/tree/main/doc)


## Features

- Manage users accounts from the professional space using only the administrator role
- Manage the various garage services from the professional area
- Manage the notices from the professional area
- Manage vehicles for sale from the professional area
- Update garage schedules from the professional area
- Facilitate the search for a vehicle thanks to asynchronous system


## Run Locally

Clone the project

```bash
  git clone https://github.com/Morgane33127/Garage_Parrot.git
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

The dependency ramsey/uuid is installed with the project but if you have a problem you can install with :

```bash
  composer require ramsey/uuid
```

Start the server

```bash
  npm run start
```


## Start

- Go to the the virtual host
- If the server is not configured by default ("root", "") go to the config/env.php file to change the connection information: "host", "username" and "password".
- Add to URL : "config/create_database.php" to create the database.
- You can start!

## Site administration

Mr parrot is the default administrator of the web application.
To change this:
Go to the config/insert_data.php file and modify the information on line 25.
OR
Log in with Mr Parrot's credentials and create a new administrator via the dedicated form.