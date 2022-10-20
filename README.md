# PHP Assignment

## Description

We use MVC model to build this project. So we have route and controller and model.

## Data

import the sql file in the root of project to your mysql database.

## How to run

1. Clone this project to your local machine
2. assign the `{project_root}/public` to your web server as the root directory
3. access the project by web url like: `http://localhost:8080`

## Routes

### Product

- `GET /product/` - list all products
- `GET /product/{id}` - show product detail
- `POST /product/` - create a new product
- `PUT /product/{id}` - update a product
- `DELETE /product/{id}` - delete a product


## Test

1. install rest client plugin in vscode
2. open `tests/*test*.http` file
3. run the test