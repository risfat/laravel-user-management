
# API Documentation

## Authentication

### Register

Register a new user.

- **URL:** `/api/register`
- **Method:** `POST`
- **Auth required:** No

#### Request Body

```json
{
  "name": "string",
  "email": "string",
  "password": "string",
  "password_confirmation": "string"
}
```

#### Success Response

- **Code:** 201 Created
- **Content:**

```json
{
  "user": {
    "id": "integer",
    "name": "string",
    "email": "string",
    "created_at": "timestamp",
    "updated_at": "timestamp"
  },
  "token": "string"
}
```

### Login

Authenticate a user and receive a token.

- **URL:** `/api/login`
- **Method:** `POST`
- **Auth required:** No

#### Request Body

```json
{
  "email": "string",
  "password": "string"
}
```

#### Success Response

- **Code:** 200 OK
- **Content:**

```json
{
  "user": {
    "id": "integer",
    "name": "string",
    "email": "string",
    "created_at": "timestamp",
    "updated_at": "timestamp"
  },
  "token": "string"
}
```

### Logout

Log out the authenticated user.

- **URL:** `/api/logout`
- **Method:** `POST`
- **Auth required:** Yes

#### Success Response

- **Code:** 200 OK
- **Content:**

```json
{
  "message": "Logged out successfully"
}
```

## User

### Get Current User

Retrieve the authenticated user's information.

- **URL:** `/api/user`
- **Method:** `GET`
- **Auth required:** Yes

#### Success Response

- **Code:** 200 OK
- **Content:**

```json
{
  "id": "integer",
  "name": "string",
  "email": "string",
  "created_at": "timestamp",
  "updated_at": "timestamp"
}
```

## User Management

### List Users

Retrieve a list of all users.

- **URL:** `/api/users`
- **Method:** `GET`
- **Auth required:** Yes

#### Success Response

- **Code:** 200 OK
- **Content:**

```json
[
  {
    "id": "integer",
    "name": "string",
    "email": "string",
    "created_at": "timestamp",
    "updated_at": "timestamp"
  },
  ...
]
```

### Get User

Retrieve a specific user's information.

- **URL:** `/api/users/{id}`
- **Method:** `GET`
- **Auth required:** Yes

#### Success Response

- **Code:** 200 OK
- **Content:**

```json
{
  "id": "integer",
  "name": "string",
  "email": "string",
  "created_at": "timestamp",
  "updated_at": "timestamp"
}
```

### Create User

Create a new user.

- **URL:** `/api/users`
- **Method:** `POST`
- **Auth required:** Yes

#### Request Body

```json
{
  "name": "string",
  "email": "string",
  "password": "string",
  "password_confirmation": "string"
}
```

#### Success Response

- **Code:** 201 Created
- **Content:**

```json
{
  "id": "integer",
  "name": "string",
  "email": "string",
  "created_at": "timestamp",
  "updated_at": "timestamp"
}
```

### Update User

Update an existing user's information.

- **URL:** `/api/users/{id}`
- **Method:** `PUT`
- **Auth required:** Yes

#### Request Body

```json
{
  "name": "string",
  "email": "string",
  "password": "string",
  "password_confirmation": "string"
}
```

#### Success Response

- **Code:** 200 OK
- **Content:**

```json
{
  "id": "integer",
  "name": "string",
  "email": "string",
  "created_at": "timestamp",
  "updated_at": "timestamp"
}
```

### Delete User

Delete a user.

- **URL:** `/api/users/{id}`
- **Method:** `DELETE`
- **Auth required:** Yes

#### Success Response

- **Code:** 204 No Content


## Dashboard

### Get Dashboard Data

Retrieve dashboard information including monthly user registrations, weekly user activity, and user statistics.

- **URL:** `/api/dashboard`
- **Method:** `GET`
- **Auth required:** Yes

#### Success Response

- **Code:** 200 OK
- **Content:**

```json
{
  "monthlyUsers": [
    {
      "month": "YYYY-MM",
      "count": "integer"
    },
    ...
  ],
  "weeklyActivity": {
    "logins": ["integer", "integer", "integer", "integer", "integer", "integer", "integer"],
    "actions": ["integer", "integer", "integer", "integer", "integer", "integer", "integer"]
  },
  "stats": {
    "totalUsers": "integer",
    "activeUsers": "integer",
    "newUsersThisMonth": "integer",
    "growthRate": "float"
  }
}

```

