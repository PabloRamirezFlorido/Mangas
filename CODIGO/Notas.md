Login loginShow, loginLogin, loginLogout
    Actions
        - show (enseña el login form)
        - login (procesa el login form)
        - logout (logout el user)
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
    Poner button
        Register link
        Forgotten password link


Register
    Actions
        - show (enseña el register form)
        - register (procesa el register form)
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
        - show (enseña el recover password form)
        - recover (procesa el recover password form)
    Fields
        - email
    Validation
        - email (required, email)
    Messages
        - recover (success, error)
    Views
        - recover (form)


Reset password (se enseña despues del link del email)
    Actions
        - show (enseña el reset password form)
        - reset (procesa el reset password form)
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


Recover password email notification (tecnicamente, una view que aparece en un email)
    Fields
        - reset link
    Views
        - reset link (entire email, actually)


Menubar
    Actions
        - show (enseña el menubar)
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
        - show (enseña el homepage)
    Fields
        - welcome message
        - latest books
    Views
        - welcome message
        - latest books


Profile page
    Actions
        - show (enseña el profile page)
        - update (procesa el update profile form)
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
        - show (enseña el book list page)
    Fields
        - books
    Views
        - books

Book Details page
    Actions
        - show (enseña el book details page)
        - like (procesa el like button)
    Fields
        - image
        - description
        - title
        - isbn
        - otros detalles
        - like button
    Views
        - image
        - description
        - title
        - isbn
        - otros detalles
        - like button



Mylibrary (liked books)
    Actions
        - show (enseña el mylibrary page)
        - unlike (procesa el unlike button)
    Fields
        - books
    Views
        - books

