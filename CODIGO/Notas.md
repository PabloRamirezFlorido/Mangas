Login loginShow, loginLogin, loginLogout
    Actions
        - show (display the login form)
        - login (process the login form)
        - logout (logout the user)
    Fields
        - email
        - password
    Validation
        - email (required, email)
        - password (required)
    Messages
        - login (success, error)
        - logout (success)
    Views
        - login (form)
        - logout (message)

    Image(logo)
    name field and label
    password field and label
    Enter button
        Register link
        Forgotten password link


Register
    Actions
        - show (display the register form)
        - register (process the register form)
    Fields
        - name
        - email
        - password
        - repeat password
        - terms and conditions
    Validation
        - name (required)
        - email (required, email)
        - password (required, min: 8)
        - repeat password (required, equals: password)
        - terms and conditions (accepted)
    Messages
        - register (success, error)
    Views
        - register (form)


Forgotten password (recover password)
    Actions
        - show (display the recover password form)
        - recover (process the recover password form)
    Fields
        - email
    Validation
        - email (required, email)
    Messages
        - recover (success, error)
    Views
        - recover (form)


Reset password (shown when following link from email)
    Actions
        - show (display the reset password form)
        - reset (process the reset password form)
    Fields
        - password
        - repeat password
    Validation
        - password (required, min: 8)
        - repeat password (required, equals: password)
    Messages
        - reset (success, error)
    Views
        - reset (form)


Recover password email notification (technically, a view displayed in an email)
    Fields
        - reset link
    Views
        - reset link (entire email, actually)


Menubar
    Actions
        - show (display the menubar)
    Fields
        - user
    Views
        - user
        - login
        - register
        - logout
    Links
        - Home
        - Mylibrary
        - Profile


Homepage
    Actions
        - show (display the homepage)
    Fields
        - welcome message
        - latest books
    Views
        - welcome message
        - latest books


Profile page
    Actions
        - show (display the profile page)
        - update (process the update profile form)
    Fields
        - name
        - email
    Validation
        - name (required)
        - email (required, email)
    Messages
        - update (success, error)
    Views
        - update (form)

Book List page(libreria)
    Actions
        - show (display the book list page)
    Fields
        - books
    Views
        - books

Book Details page
    Actions
        - show (display the book details page)
        - like (process the like button)
    Fields
        - image
        - description
        - title
        - isbn
        - other details
        - like button
    Views
        - image
        - description
        - title
        - isbn
        - other details
        - like button



Mylibrary (liked books)
    Actions
        - show (display the mylibrary page)
        - unlike (process the unlike button)
    Fields
        - books
    Views
        - books

