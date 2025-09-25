## About MallHub

Your ultimate mall companion. Browse products, discover sales, and connect with stores—all from your phone. For shoppers, it’s a smarter way to find what you love. For stores, it’s a new way to get noticed.

## Features

-   **Admin Panel**: Admin can manage mall and store data

## API Usage

-   **api/products**: Display paginated product catalog eager loaded with store and product images data

    Required Query:
    None

    Acceptable Query:

    1. store_id: Filter product based on the store
    2. sub_category_id: Filter product based on the subcategory
    3. name: Filter product based on the name

-   **api/stores**: Display paginated store catalog eager loaded with floor data

    Required Query:
    None

    Acceptable Query:

    1. floor_id: Filter store based on the floor
    2. name: Filter store based on the name

-   **api/floors**: Display all floors

    Required Query:
    None

    Acceptable Query:
    None

-   **api/categories**: Display all product categories

    Required Query:
    None

    Acceptable Query:
    None

-   **api/subcategories**: Display all product subcategories

    Required Query:

    1.  category_id

    Acceptable Query: None
