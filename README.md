
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
    "access_token": "23|gZEr5n04ye8pjWyRizoxagSzijjJ1HnjDcg3MdXh4454cc0b",
    "token_type": "Bearer"
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
    "access_token": "24|g0M5eY9S8JZ96vnDNS7xfkPXCnfYxK0plcWEySFEb8b04c13",
    "token_type": "Bearer"
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
    "id": 1,
    "name": "MD Risfat Amin",
    "email": "risfat.bd@gmail.com",
    "email_verified_at": "2025-03-09T08:09:29.000000Z",
    "created_at": "2025-03-09T08:09:29.000000Z",
    "updated_at": "2025-03-11T04:16:56.000000Z",
    "first_name": "MD Risfat",
    "last_name": "Amin",
    "phone": "01737757944",
    "address": "7633 Parisian Plains\r\nSouth Jaketon, VA 19910",
    "city": "Dedricchester",
    "state": "Ohio",
    "country": "Brunei Darussalam",
    "zip_code": "86526-0797",
    "date_of_birth": "1983-07-17T00:00:00.000000Z",
    "gender": "male",
    "bio": "Et totam quibusdam voluptates placeat. Vel placeat qui pariatur et vero optio. Voluptatem enim maiores ut earum aut.",
    "status": true,
    "profile_photo_path": null,
    "two_factor_confirmed_at": null,
    "profile_photo_url": "https://ui-avatars.com/api/?name=M+R+A&color=7F9CF5&background=EBF4FF",

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
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "MD Risfat Amin",
            "email": "risfat.bd@gmail.com",
            "email_verified_at": "2025-03-09T08:09:29.000000Z",
            "created_at": "2025-03-09T08:09:29.000000Z",
            "updated_at": "2025-03-11T04:16:56.000000Z",
            "first_name": "MD Risfat",
            "last_name": "Amin",
            "phone": "01737757944",
            "address": "7633 Parisian Plains\r\nSouth Jaketon, VA 19910",
            "city": "Dedricchester",
            "state": "Ohio",
            "country": "Brunei Darussalam",
            "zip_code": "86526-0797",
            "date_of_birth": "1983-07-17T00:00:00.000000Z",
            "gender": "male",
            "bio": "Et totam quibusdam voluptates placeat. Vel placeat qui pariatur et vero optio. Voluptatem enim maiores ut earum aut.",
            "status": true,
            "profile_photo_path": null,
            "two_factor_confirmed_at": null,
            "profile_photo_url": "https://ui-avatars.com/api/?name=M+R+A&color=7F9CF5&background=EBF4FF",
        
            "roles": [
                {
                    "id": 2,
                    "name": "ReadOnly",
                    "guard_name": "web",
                    "created_at": "2025-03-09T08:09:29.000000Z",
                    "updated_at": "2025-03-09T08:09:29.000000Z",
                    "pivot": {
                        "model_type": "App\\Models\\User",
                        "model_id": 1,
                        "role_id": 2
                    }
                }
            ]
        },
        {
            "id": 11,
            "name": "Darlene Pfannerstill Jr.",
            "email": "julius63@example.net",
            "email_verified_at": "2024-12-22T20:30:17.000000Z",
            "created_at": "2025-03-09T08:09:29.000000Z",
            "updated_at": "2025-03-09T08:09:29.000000Z",
            "first_name": "Bethany",
            "last_name": "Weber",
            "phone": "435.975.5732",
            "address": "863 Mitchell Squares\nNorth Alaina, NE 14548-8543",
            "city": "Waelchichester",
            "state": "Colorado",
            "country": "Panama",
            "zip_code": "78607-3045",
            "date_of_birth": "1979-07-21T00:00:00.000000Z",
            "gender": "male",
            "bio": "Doloremque ex labore pariatur ullam placeat. Deserunt est consequatur aperiam aspernatur. At nobis qui minima aut.",
            "status": true,
            "profile_photo_path": null,
            "two_factor_confirmed_at": null,
            "profile_photo_url": "https://ui-avatars.com/api/?name=D+P+J&color=7F9CF5&background=EBF4FF",
        
            "roles": [
                {
                    "id": 5,
                    "name": "Administrator",
                    "guard_name": "web",
                    "created_at": "2025-03-09T08:09:29.000000Z",
                    "updated_at": "2025-03-09T08:09:29.000000Z",
                    "pivot": {
                        "model_type": "App\\Models\\User",
                        "model_id": 11,
                        "role_id": 5
                    }
                }
            ]
        }
    ],
    "first_page_url": "http://localhost:8000/api/users?page=1",
    "from": 1,
    "last_page": 4,
    "last_page_url": "http://localhost:8000/api/users?page=4",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/users?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": "http://localhost:8000/api/users?page=2",
            "label": "2",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/users?page=3",
            "label": "3",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/users?page=4",
            "label": "4",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/users?page=2",
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": "http://localhost:8000/api/users?page=2",
    "path": "http://localhost:8000/api/users",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 34
}
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
    "id": 1,
    "name": "MD Risfat Amin",
    "email": "risfat.bd@gmail.com",
    "email_verified_at": "2025-03-09T08:09:29.000000Z",
    "created_at": "2025-03-09T08:09:29.000000Z",
    "updated_at": "2025-03-11T04:16:56.000000Z",
    "first_name": "MD Risfat",
    "last_name": "Amin",
    "phone": "01737757944",
    "address": "7633 Parisian Plains\r\nSouth Jaketon, VA 19910",
    "city": "Dedricchester",
    "state": "Ohio",
    "country": "Brunei Darussalam",
    "zip_code": "86526-0797",
    "date_of_birth": "1983-07-17T00:00:00.000000Z",
    "gender": "male",
    "bio": "Et totam quibusdam voluptates placeat. Vel placeat qui pariatur et vero optio. Voluptatem enim maiores ut earum aut.",
    "status": true,
    "profile_photo_path": null,
    "two_factor_confirmed_at": null,
    "profile_photo_url": "https://ui-avatars.com/api/?name=M+R+A&color=7F9CF5&background=EBF4FF",
    "roles": [
        {
            "id": 2,
            "name": "ReadOnly",
            "guard_name": "web",
            "created_at": "2025-03-09T08:09:29.000000Z",
            "updated_at": "2025-03-09T08:09:29.000000Z",
            "pivot": {
                "model_type": "App\\Models\\User",
                "model_id": 1,
                "role_id": 2
            }
        }
    ]
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
    "id": 1,
    "name": "New User",
    "email": "risfat.new@gmail.com",
    "email_verified_at": "2025-03-09T08:09:29.000000Z",
    "created_at": "2025-03-09T08:09:29.000000Z",
    "updated_at": "2025-03-11T04:16:56.000000Z",
    "first_name": "New",
    "last_name": "User",
    "phone": "01737757944",
    "address": "7633 Parisian Plains\r\nSouth Jaketon, VA 19910",
    "city": "Dedricchester",
    "state": "Ohio",
    "country": "Brunei Darussalam",
    "zip_code": "86526-0797",
    "date_of_birth": "1983-07-17T00:00:00.000000Z",
    "gender": "male",
    "bio": "Et totam quibusdam voluptates placeat. Vel placeat qui pariatur et vero optio. Voluptatem enim maiores ut earum aut.",
    "status": true,
    "profile_photo_path": null,
    "two_factor_confirmed_at": null,
    "profile_photo_url": "https://ui-avatars.com/api/?name=M+R+A&color=7F9CF5&background=EBF4FF",
    "roles": [
        {
            "id": 2,
            "name": "ReadOnly",
            "guard_name": "web",
            "created_at": "2025-03-09T08:09:29.000000Z",
            "updated_at": "2025-03-09T08:09:29.000000Z",
            "pivot": {
                "model_type": "App\\Models\\User",
                "model_id": 1,
                "role_id": 2
            }
        }
    ]
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
    "id": 1,
    "name": "Updated User",
    "email": "updatedusesr@example.com",
    "email_verified_at": "2025-03-09T08:09:29.000000Z",
    "created_at": "2025-03-09T08:09:29.000000Z",
    "updated_at": "2025-03-11T05:09:51.000000Z",
    "first_name": "Updated",
    "last_name": "User",
    "phone": "01737757944",
    "address": "7633 Parisian Plains\r\nSouth Jaketon, VA 19910",
    "city": "Dedricchester",
    "state": "Ohio",
    "country": "Brunei Darussalam",
    "zip_code": "86526-0797",
    "date_of_birth": "1983-07-17T00:00:00.000000Z",
    "gender": "male",
    "bio": "Et totam quibusdam voluptates placeat. Vel placeat qui pariatur et vero optio. Voluptatem enim maiores ut earum aut.",
    "status": true,
    "profile_photo_path": null,
    "two_factor_confirmed_at": null,
    "profile_photo_url": "https://ui-avatars.com/api/?name=U+U&color=7F9CF5&background=EBF4FF",

    "roles": [
        {
            "id": 2,
            "name": "ReadOnly",
            "guard_name": "web",
            "created_at": "2025-03-09T08:09:29.000000Z",
            "updated_at": "2025-03-09T08:09:29.000000Z",
            "pivot": {
                "model_type": "App\\Models\\User",
                "model_id": 1,
                "role_id": 2
            }
        }
    ]
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
    "monthlyUsers": {
        "months": [
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
            "Jan",
            "Feb",
            "Mar"
        ],
        "counts": [
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            35
        ]
    },
    "weeklyActivity": {
        "days": [
            "Wed",
            "Thu",
            "Fri",
            "Sat",
            "Sun",
            "Mon",
            "Tue"
        ],
        "logins": [
            32,
            67,
            63,
            49,
            64,
            58,
            42
        ],
        "registrations": [
            0,
            0,
            0,
            0,
            20,
            10,
            5
        ]
    },
    "stats": {
        "total": 35,
        "verified": 20,
        "unverified": 15,
        "thisMonth": 35,
        "lastMonth": 0,
        "growth": 100
    },
    "userName": "Md Risfat Amin"
}

```

