# API Documentation

## Authentication

### Register
- **URL:** `/api/register`
- **Method:** `POST`
- **Description:** Register a new user
- **Body Parameters:**
  - `name` (string, required): User's full name
  - `email` (string, required): User's email address
  - `password` (string, required): User's password
  - `password_confirmation` (string, required): Confirm password
- **Success Response:**
  - **Code:** 201
  - **Content:** `{ "message": "User registered successfully", "user": {...}, "token": "..." }`

### Login
- **URL:** `/api/login`
- **Method:** `POST`
- **Description:** Authenticate a user and receive a token
- **Body Parameters:**
  - `email` (string, required): User's email address
  - `password` (string, required): User's password
- **Success Response:**
  - **Code:** 200
  - **Content:** `{ "message": "Login successful", "user": {...}, "token": "..." }`

### Logout
- **URL:** `/api/logout`
- **Method:** `POST`
- **Description:** Logout the authenticated user
- **Headers:**
  - `Authorization: Bearer {token}`
- **Success Response:**
  - **Code:** 200
  - **Content:** `{ "message": "Logged out successfully" }`

### Get Authenticated User
- **URL:** `/api/user`
- **Method:** `GET`
- **Description:** Get the currently authenticated user's details
- **Headers:**
  - `Authorization: Bearer {token}`
- **Success Response:**
  - **Code:** 200
  - **Content:** `{ "id": 1, "name": "John Doe", "email": "john@example.com", ... }`

## User Management

### List Users
- **URL:** `/api/users`
- **Method:** `GET`
- **Description:** Get a list of all users
- **Headers:**
  - `Authorization: Bearer {token}`
- **Success Response:**
  - **Code:** 200
  - **Content:** `[ { "id": 1, "name": "John Doe", "email": "john@example.com", ... }, ... ]`

### Get User
- **URL:** `/api/users/{id}`
- **Method:** `GET`
- **Description:** Get details of a specific user
- **Headers:**
  - `Authorization: Bearer {token}`
- **Success Response:**
  - **Code:** 200
  - **Content:** `{ "id": 1, "name": "John Doe", "email": "john@example.com", ... }`

### Create User
- **URL:** `/api/users`
- **Method:** `POST`
- **Description:** Create a new user
- **Headers:**
  - `Authorization: Bearer {token}`
- **Body Parameters:**
  - `name` (string, required): User's full name
  - `email` (string, required): User's email address
  - `password` (string, required): User's password
- **Success Response:**
  - **Code:** 201
  - **Content:** `{ "message": "User created successfully", "user": {...} }`

### Update User
- **URL:** `/api/users/{id}`
- **Method:** `PUT/PATCH`
- **Description:** Update an existing user
- **Headers:**
  - `Authorization: Bearer {token}`
- **Body Parameters:**
  - `name` (string, optional): User's full name
  - `email` (string, optional): User's email address
  - `password` (string, optional): User's new password
- **Success Response:**
  - **Code:** 200
  - **Content:** `{ "message": "User updated successfully", "user": {...} }`

### Delete User
- **URL:** `/api/users/{id}`
- **Method:** `DELETE`
- **Description:** Delete a user
- **Headers:**
  - `Authorization: Bearer {token}`
- **Success Response:**
  - **Code:** 200
  - **Content:** `{ "message": "User deleted successfully" }`

## Notes
- All protected routes require authentication using a bearer token.
- Proper error responses will be returned for invalid requests or unauthorized access.
- Pagination may be implemented for list endpoints in the future.
