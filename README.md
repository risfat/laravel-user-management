
# API Documentation

## Base URL
`http://127.0.0.1:8000/api`

## Authentication
This API uses Laravel Sanctum for authentication. After logging in, include the token in the `Authorization` header of your requests:

```
Authorization: Bearer <your_token_here>
```

## Endpoints

### 1. Register User
- **URL**: `/register`
- **Method**: POST
- **Description**: Register a new user
- **Request Body**:
  ```json
  {
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }
  ```
- **Success Response**:
  - **Code**: 201
  - **Content**:
    ```json
    {
      "message": "User registered successfully",
      "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "created_at": "2023-03-09T15:30:00.000000Z",
        "updated_at": "2023-03-09T15:30:00.000000Z"
      },
      "token": "1|abcdefghijklmnopqrstuvwxyz123456"
    }
    ```

### 2. Login
- **URL**: `/login`
- **Method**: POST
- **Description**: Authenticate a user and receive a token
- **Request Body**:
  ```json
  {
    "email": "john@example.com",
    "password": "password123"
  }
  ```
- **Success Response**:
  - **Code**: 200
  - **Content**:
    ```json
    {
      "message": "Login successful",
      "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "created_at": "2023-03-09T15:30:00.000000Z",
        "updated_at": "2023-03-09T15:30:00.000000Z"
      },
      "token": "2|abcdefghijklmnopqrstuvwxyz123456"
    }
    ```

### 3. Get Authenticated User
- **URL**: `/user`
- **Method**: GET
- **Description**: Get the currently authenticated user's information
- **Authentication**: Required
- **Success Response**:
  - **Code**: 200
  - **Content**:
    ```json
    {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "created_at": "2023-03-09T15:30:00.000000Z",
      "updated_at": "2023-03-09T15:30:00.000000Z"
    }
    ```

### 4. Logout
- **URL**: `/logout`
- **Method**: POST
- **Description**: Invalidate the user's token
- **Authentication**: Required
- **Success Response**:
  - **Code**: 200
  - **Content**:
    ```json
    {
      "message": "Logged out successfully"
    }
    ```

### 5. User Management

#### 5.1 List Users
- **URL**: `/users`
- **Method**: GET
- **Description**: Get a list of all users
- **Authentication**: Required
- **Success Response**:
  - **Code**: 200
  - **Content**:
    ```json
    {
      "data": [
        {
          "id": 1,
          "name": "John Doe",
          "email": "john@example.com",
          "created_at": "2023-03-09T15:30:00.000000Z",
          "updated_at": "2023-03-09T15:30:00.000000Z"
        },
        {
          "id": 2,
          "name": "Jane Smith",
          "email": "jane@example.com",
          "created_at": "2023-03-09T15:35:00.000000Z",
          "updated_at": "2023-03-09T15:35:00.000000Z"
        }
      ]
    }
    ```

#### 5.2 Get User
- **URL**: `/users/{id}`
- **Method**: GET
- **Description**: Get a specific user's information
- **Authentication**: Required
- **Success Response**:
  - **Code**: 200
  - **Content**:
    ```json
    {
      "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "created_at": "2023-03-09T15:30:00.000000Z",
        "updated_at": "2023-03-09T15:30:00.000000Z"
      }
    }
    ```

#### 5.3 Create User
- **URL**: `/users`
- **Method**: POST
- **Description**: Create a new user
- **Authentication**: Required
- **Request Body**:
  ```json
  {
    "name": "Alice Johnson",
    "email": "alice@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }
  ```
- **Success Response**:
  - **Code**: 201
  - **Content**:
    ```json
    {
      "message": "User created successfully",
      "data": {
        "id": 3,
        "name": "Alice Johnson",
        "email": "alice@example.com",
        "created_at": "2023-03-09T15:40:00.000000Z",
        "updated_at": "2023-03-09T15:40:00.000000Z"
      }
    }
    ```

#### 5.4 Update User
- **URL**: `/users/{id}`
- **Method**: PUT/PATCH
- **Description**: Update a user's information
- **Authentication**: Required
- **Request Body**:
  ```json
  {
    "name": "Alice Johnson Updated",
    "email": "alice.updated@example.com"
  }
  ```
- **Success Response**:
  - **Code**: 200
  - **Content**:
    ```json
    {
      "message": "User updated successfully",
      "data": {
        "id": 3,
        "name": "Alice Johnson Updated",
        "email": "alice.updated@example.com",
        "created_at": "2023-03-09T15:40:00.000000Z",
        "updated_at": "2023-03-09T15:45:00.000000Z"
      }
    }
    ```

#### 5.5 Delete User
- **URL**: `/users/{id}`
- **Method**: DELETE
- **Description**: Delete a user
- **Authentication**: Required
- **Success Response**:
  - **Code**: 200
  - **Content**:
    ```json
    {
      "message": "User deleted successfully"
    }
    ```

## Error Responses

All endpoints may return the following error responses:

- **401 Unauthorized**:
  ```json
  {
    "message": "Unauthenticated."
  }
  ```

- **403 Forbidden**:
  ```json
  {
    "message": "You do not have permission to perform this action."
  }
  ```

- **404 Not Found**:
  ```json
  {
    "message": "Resource not found."
  }
  ```

- **422 Unprocessable Entity**:
  ```json
  {
    "message": "The given data was invalid.",
    "errors": {
      "field_name": [
        "Error message for the field"
      ]
    }
  }
  ```
